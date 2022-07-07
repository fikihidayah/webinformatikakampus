<?php

namespace App\Http\Controllers;

use App\Models\CategoryNews;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class AdminController extends Controller
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'count' => [
				'category' => CategoryNews::all()->count(),
				'news'		 => News::all()->count(),
				'users' 	 => User::all()->count()
			]
		];
		return view('admin.dashboard', $data);
	}
}
