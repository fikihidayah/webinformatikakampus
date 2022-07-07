<?php

namespace App\Http\Controllers;

use App\Models\CategoryNews;
use App\Http\Requests\StoreCategoryNewsRequest;
use App\Http\Requests\UpdateCategoryNewsRequest;

class CategoryNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.category.index', [
            'title' => 'Berita',
            'subtitle' => 'List Kategori',
            'categorynews' => CategoryNews::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.category.create', [
            'title' => 'Kategori Berita',
            'subtitle' => 'Tambah',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryNewsRequest $request)
    {
        if ($validated = $request->validated()) {
            $validated['description'] = htmlspecialchars($request->description);
            CategoryNews::create($validated);

            return redirect('/news/categories')->with('success', 'Berhasil menambahkan kategori berita');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryNews  $categoryNews
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryNews $categoryNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryNews  $categoryNews
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryNews $category)
    {
        return view('news.category.edit', [
            'title' => 'Kategori Berita',
            'subtitle' => 'Edit',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryNewsRequest  $request
     * @param  \App\Models\CategoryNews  $categoryNews
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryNewsRequest $request, CategoryNews $category)
    {
        if ($validated = $request->validated()) {

            $validated['description'] = htmlspecialchars($request->description);
            CategoryNews::find($category->id)->update($validated);

            return back()->with('success', 'Berhasil mengubah kategori berita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryNews  $categoryNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryNews $category)
    {
        try {
            CategoryNews::destroy($category->id);
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Kategori sudah digunakan berita');
        }
        return back()->with('success', 'Berhasil menghapus kategoru berita');
    }
}
