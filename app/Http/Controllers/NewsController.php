<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\CategoryNews;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index', [
            'title' => 'Berita',
            'subtitle' => 'List Berita',
            'news' => News::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create', [
            'title' => 'Berita',
            'subtitle' => 'Buat Berita',
            'categories' => CategoryNews::all()
        ]);
    }

    /**
     * Create a thumbnail of specified size
     *
     * @param string $path path of thumbnail
     * @param int $width
     * @param int $height
     */
    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        if ($validate = $request->validated()) {
            if ($file = $request->file('image')) {

                // store image original
                $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $time = Str::substr(time(), -5, 5);
                $extension = $file->getClientOriginalExtension();
                $originalFile = $fileName . $time . '.' . $extension;
                $image = $file->storeAs('', $originalFile, 'berita_post');
                $validate['image'] = '/image-posted/' . $image;

                //small thumbnail
                $smallthumbnail = $fileName . '_small_' . $time . '.' . $extension;
                $image_thumb = $file->storeAs('/thumb', $smallthumbnail, 'berita_post');
                $validate['image_thumb'] = '/image-posted/' . $image_thumb;
                $smallthumbnailpath = public_path('/image-posted/thumb/' . $smallthumbnail);
                $this->createThumbnail($smallthumbnailpath, 320, 145);

                //square thumbnail
                $squarethumb = $fileName . '_square_' . $time . '.' . $extension;
                $image_thumb_square = $file->storeAs('/square-thumb', $squarethumb, 'berita_post');
                $validate['image_thumb_square'] = '/image-posted/' . $image_thumb_square;
                $squarethumbpath = public_path('/image-posted/square-thumb/' . $squarethumb);
                $this->createThumbnail($squarethumbpath, 80, 80);
            }

            $validate['user_id'] = auth()->user()->id;
            $validate['is_published'] = (bool) $request->is_published;
            if ($request->is_published) $validate['publised_at'] = Carbon::now();

            News::create($validate);
            $id = News::where('slug', $request->slug)->first()->id;

            foreach ($request->category as $cat) {
                News::saveToNewsCategory(['news_id' => $id, 'category_id' => $cat]);
            }

            return redirect('/news')->with('success', 'Berhasil menambahkan berita');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show', [
            'title' => 'Berita',
            'subtitle' => 'Detail',
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {

        return view('news.edit', [
            'title' => 'Berita',
            'subtitle' => 'Edit',
            'news' => $news,
            'categories' => CategoryNews::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        if ($validate = $request->validated()) {
            if ($file = $request->file('image')) {

                // store and replace image original
                del_file(public_path($news->image));
                $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $time = Str::substr(time(), -5, 5);
                $extension = $file->getClientOriginalExtension();
                $originalFile = $fileName . $time . '.' . $extension;
                $image = $file->storeAs('', $originalFile, 'berita_post');
                $validate['image'] = '/image-posted/' . $image;

                //small thumbnail
                del_file(public_path($news->image_thumb));
                $smallthumbnail = $fileName . '_small_' . $time . '.' . $extension;
                $image_thumb = $file->storeAs('/thumb', $smallthumbnail, 'berita_post');
                $validate['image_thumb'] = '/image-posted/' . $image_thumb;
                $smallthumbnailpath = public_path('/image-posted/thumb/' . $smallthumbnail);
                $this->createThumbnail($smallthumbnailpath, 400, 170);

                //square thumbnail
                del_file(public_path($news->image_thumb_square));
                $squarethumb = $fileName . '_square_' . $time . '.' . $extension;
                $image_thumb_square = $file->storeAs('/square-thumb', $squarethumb, 'berita_post');
                $validate['image_thumb_square'] = '/image-posted/' . $image_thumb_square;
                $squarethumbpath = public_path('/image-posted/square-thumb/' . $squarethumb);
                $this->createThumbnail($squarethumbpath, 80, 80);
            }
            $validate['is_published'] = (bool) $request->is_published;

            // jika di publikasi dan berita ini belum di publikasi maka set tanggal publikasinya
            if ($validate['is_published'] && !$news->is_published) $validate['publised_at'] = Carbon::now();

            News::find($news->id)->update($validate);
            $id = News::where('slug', $request->slug)->first()->id;

            // delete dlu categorynya baru di buat lagi
            News::deleteNewsCategory($id);
            foreach ($request->category as $cat) {
                News::saveToNewsCategory(['news_id' => $id, 'category_id' => $cat]);
            }

            return back()->with('success', 'Berhasil mengubah berita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        del_file(public_path($news->image));
        del_file(public_path($news->image_thumb));
        del_file(public_path($news->image_thumb_square));

        News::deleteNewsCategory($news->id);
        News::destroy($news->id);

        return back()->with('success', 'Berhasil menghapus berita');
    }

    // public function makeSlug($title)
    // {
    //     return response()->json(['title' => Str::slug($title)]);
    // }
}
