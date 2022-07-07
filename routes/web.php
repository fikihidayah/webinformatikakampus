<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\OtherSettingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*        Page          */

Route::get('/', [PageController::class, 'index']);
Route::get('/view/{news:slug}', [PageController::class, 'news']);
Route::get('/filter/{news:slug}', [PageController::class, 'category']);


/*        Endpage          */

/*        Dashboard          */
Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');

// middleware untuk authentikasi lewat method
// gate memagari tampilan atau method juga
// Gate
Route::get('/gate/auth', [GateController::class, 'login'])->name('login')->middleware('guest');
Route::get('/gate/logout', [GateController::class, 'logout']);
Route::post('/gate/auth', [GateController::class, 'authenticate']);

// User
Route::get('/user/profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('/user/reset-image/{user}', [UserController::class, 'reset_image'])->middleware('auth');
Route::post('/user/update-profile', [UserController::class, 'update_profile'])->middleware('auth');
Route::controller(UserController::class)->middleware(['admin', 'auth'])
  ->group(function () {
    Route::get('/user/manage', 'manage');
    Route::get('/user/create', 'create');
    Route::post('/user/store', 'store');
    Route::put('/user/{user}', 'update');
    Route::delete('/user/{user}', 'destroy');
    Route::get('/user/{user}/edit', 'edit');
  });

// Settings
Route::controller(SettingController::class)->middleware(['admin', 'auth'])->group(function () {
  Route::get('/setting/informasi', 'informasi');
  Route::get('/setting/getMaps/{lat}/{lng}', 'getMaps');
  Route::put('/setting/informasi/{settings}', 'update')->name('setting.update');
  Route::get('/setting/home', 'home');
  Route::post('setting/add-home-slide', 'create_slide');
  Route::get('/setting/slide/edit/{id}', 'edit_slide');
  Route::put('/setting/slide/update/{id}', 'update_slide')->name('setting.update.slide');
  Route::delete('/setting/home/slide/{id}', 'delete_slide');
  Route::post('/setting/home/testi', 'create_testi');
  Route::get('/setting/testi/edit/{id}', 'edit_testi');
  Route::put('/setting/testi/update/{id}', 'update_testi')->name('setting.update.testi');
  Route::delete('/setting/home/testi/{id}', 'delete_testi');
  Route::put('/setting/home/selamat/{id}', 'update_slm')->name('setting.update.slm');
});

// other setting
Route::resource('/othersettings', OtherSettingController::class)->only('show', 'update')->middleware(['admin', 'auth']);

// news category
Route::resource('/news/categories', CategoryNewsController::class)->middleware(['admin', 'auth']);

// news
Route::resource('/news', NewsController::class)->scoped(['news' => 'slug'])->middleware('auth');
// Route::get('/news/create_slug/{title}', [NewsController::class, 'makeSlug'])->middleware('auth');

// filemanager integration
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
  \UniSharp\LaravelFilemanager\Lfm::routes();
});

/*        End Dashboard          */

Route::get('/kontak', [PageController::class, 'kontak']);
Route::post('/upcountnews', [PageController::class, 'upCountNews']);

Route::get('/coba//', function () {
  $dt = DB::table('users')->paginate(1);

  return view('web.coba', ['data' => $dt]);
});
Route::get('/{othersetting:slug}', [PageController::class, 'other']);
