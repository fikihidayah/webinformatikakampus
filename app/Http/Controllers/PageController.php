<?php

namespace App\Http\Controllers;

use App\Models\CategoryNews;
use App\Models\News;
use App\Models\OtherSetting;
use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index()
    {

        $categoryNews = CategoryNews::with(['news' => function ($query) {
            $query->orderBy('created_at', 'asc');
        }])->where('id', '!=', 1)->limit(3)->get();

        $apiIg = $this->api_ig_generate();

        return view('web.index', [
            'title' => 'Home',
            'slide' => Setting::getHomeSlide(),
            'selamat' => Setting::getHomeSelamat(),
            'berita_pilihan' => News::getBeritaPilihan(),
            'testimonies' => Setting::getHomeTestimoni(),
            'categories_news' => $categoryNews,
            'api_ig' => $apiIg->collect()
        ]);
    }

    private function api_ig_generate()
    {
        $apiKey = setting('api_ig_key'); // yang lama

        $apiIg = Http::get("https://graph.instagram.com/me/media?fields=id,username,media_type,media_url,permalink&access_token=" . $apiKey);
        // dd($apiIg->clientError());

        if ($apiIg->clientError()) {
            // jika token invalid maka refresh tokennya
            $apiIgRefresh = Http::get("https://graph.instagram.com/refresh_access_token", [
                'grant_type' => 'ig_refresh_token',
                'access_token' => $apiKey
            ]);
            Setting::find(1)->update(['api_ig_key' => $apiIgRefresh['access_token']]);
            $apiIg = Http::get("https://graph.instagram.com/me/media?fields=id,username,media_type,media_url,permalink&access_token=" . setting('api_ig_key')); // generte key baru dari db
        }
        return $apiIg;
    }

    public function news(News $news)
    {
        // dd(News::getBlain($news->slug));
        if (!$news->is_published) abort(403, 'Berita belum dipublikasikan');
        return view('web.detail_news', [
            'title' => $news->title,
            'news' => $news,
            'categories' => CategoryNews::all(),
            'blain' => News::getBlain($news->slug),
            'prev_news' => News::getPrev($news->id),
            'next_news' => News::getNext($news->id),
        ]);
    }

    public function other(OtherSetting $othersetting)
    {
        // dd(strcasecmp($othersetting->modul, $othersetting->halaman));
        // return $othersetting;
        return view('web.other', [
            'title' => $othersetting->halaman,
            'data' => $othersetting
        ]);
    }

    public function kontak()
    {
        return view('web.kontak', [
            'title' => 'Kontak',
            'setting' => setting()
        ]);
    }

    public function category(CategoryNews $news)
    {
        $category = CategoryNews::where('slug', $news->slug)->first();
        $newsa = $category->news()->orderBy('id', 'asc')->paginate(2);

        return view('web.category', [
            'title' => $news->name,
            'data' => compact('category', 'newsa'),
            'blain' => News::getBlainWithCategory($news->slug),
            // 'paging' => $page,
            'categories' => CategoryNews::all()
        ]);
    }

    public function upCountNews(Request $request)
    {
        $slug = htmlspecialchars($request->slug);
        DB::beginTransaction();
        try {
            $up = News::upCount($slug);
            DB::commit();
            return $request->json(['is_success' => $up]);
        } catch (QueryException $e) {
            DB::rollBack();
        }
    }
}
