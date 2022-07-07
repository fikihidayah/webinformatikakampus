<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slide = DB::table('home_slide_setting');
        $selDa = DB::table('home_selamatdatang_setting');
        $testi = DB::table('home_testimoni_setting');

        $slide->insert([
            ['image' => '1.jpeg'],
            ['image' => '2.jpeg'],
            ['image' => '3.jpeg'],
        ]);

        $selDa->insert([
            'id_embed' => 'pWXIt2yXF-I',
            'isi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum mollitia a eum corrupti veniam exercitationem reiciendis voluptates vero incidunt, molestiae ullam tenetur laborum eius et, adipisci dolor quis non numquam molestias voluptas aliquam quasi. Sapiente eaque fugiat, nesciunt, voluptatibus perferendis modi porro'
        ]);

        $testi->insert(
            [
                [
                    'nama' => 'Fulan',
                    'isi_testi' => 'dipisci dolor quis non numquam molestias voluptas aliquam quasi. Sapiente eaque fugiat, nesciunt',
                    'kerja' => 'Web Programmer',
                    'image' => 'man.png'
                ],
                [
                    'nama' => 'Fulana',
                    'isi_testi' => 'dipisci dolor quis non numquam molestias voluptas aliquam quasi. Sapiente eaque, nesciunt',
                    'kerja' => 'SEO PT Impian',
                    'image' => 'man2.png'
                ],
                [
                    'nama' => 'Fulani',
                    'isi_testi' => 'dipisci dolor quis non numquam molestias voluptas aliquam quasi. Sapiente eaque fugiat',
                    'kerja' => 'SEO PT Impian',
                    'image' => 'woman.png'
                ],
            ]
        );
    }
}
