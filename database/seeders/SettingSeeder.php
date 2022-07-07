<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Setting::create([
			'icon' 			=> 'ti-uis.png',
			'favicon' 	=> 'favicon.ico',
			'nama_web' 	=> 'Jurusan Informatika Universitas Ibnu Sina Batam',
			'latitude' 	=> '1.1453036',
			'longitude' 	=> '104.0150299',
			'alamat' 		=> 'Alamat: Jl. Teuku Umar, Lubuk Baja Kota, Kec. Lubuk Baja, Kota Batam, Kepulauan Riau 29444',
			'telpon' 		=> '(0778) 7058741',
			'ig'				=> '@uis.batam',
			'link_ig'		=> 'https://www.instagram.com/uis.batam/',
			'bg_login'	=> '#00A859',
			'email'			=> 'info@uis.ac.id'
		]);
	}
}

// <iframe src="https://www.google.com/maps?q=1.1453036,104.0150299&z=15&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
