<?php

namespace Database\Seeders;

use App\Models\CategoryNews;
use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryNews::create([
            'name' => 'Berita Pilihan',
            'slug' => 'berita-pilihan',
            'bg_color' => 'bg-warning text-white'
        ]);

        CategoryNews::create([
            'name' => 'Berita',
            'slug' => 'berita',
            'bg_color' => 'bg-primary text-white'
        ]);

        CategoryNews::create([
            'name' => 'Artikel',
            'slug' => 'artikel',
            'bg_color' => 'bg-danger text-white'
        ]);

        CategoryNews::create([
            'name' => 'Lowongan',
            'slug' => 'lowongan',
            'bg_color' => 'bg-success text-white'
        ]);

        News::factory(10)->create();

        $j = 1;
        for ($i = 1; $i <= 10; $i++) {
            DB::table('news_category')->insert([
                'news_id' => $i,
                'category_id' => $j++
            ]);

            if ($j > 4) $j = 1;
        }
    }
}
