<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryNews extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $guarded = ['id'];


    public function news()
    {
        return $this->belongsToMany(News::class, 'news_category', 'category_id', 'news_id');
    }

    // public static function getNews()
    // {
    //     return DB::table('category as c')
    //         ->join('news_category as nc', 'nc.category_id', '=', 'c.id')
    //         ->join('news as n', 'n.id', '=', 'nc.news_id')
    //         ->join('users as u', 'u.id', '=', 'n.user_id')
    //         ->select('n.*', 'u.name')
    //         ->orderBy('created_at', 'asc')
    //         ->where('c.id', '!=', 1)
    //         ->get();
    // }
}
