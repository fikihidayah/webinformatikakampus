<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    private const NEWS_CATEGORY = 'news_category';
    protected $with = ['category', 'user'];

    public static function allPublished(): Collection
    {
        return self::where('is_published', 1)->get();
    }

    public function category()
    {
        return $this->belongsToMany(CategoryNews::class, 'news_category', 'news_id', 'category_id');
    }


    public static function getBeritaPilihan(): Collection
    {
        $result = self::whereHas('category', function ($query) {
            $query->where(['category_id' => 1])->limit(3);
        })->where('is_published', 1)->get();
        return $result;
    }

    public static function getBlain(string $slug): Collection
    {
        return self::where([
            ['slug', '!=', $slug],
            ['is_published', '=', 1]
        ])->orderBy('created_at', 'asc')
            ->limit(10)->get();
    }

    public static function getBlainWithCategory(string $slug): Collection
    {
        $result = self::whereHas('category', function ($query) use ($slug) {
            $query->where('slug', '!=', $slug);
        })->where('is_published', 1)->get();
        return $result;
    }

    public static function upCount($slug): void
    {
        DB::update("update news set views = views + 1 WHERE slug = ?", [$slug]);
    }

    public static function getPrev(int $id)
    {
        return self::where('id', '<', $id)->where('is_published', 1)->orderBy('id', 'desc')->first();
    }

    public static function getNext(int $id)
    {
        return self::where('id', '>', $id)->where('is_published', 1)->first();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function saveToNewsCategory(array $data): void
    {
        DB::table(self::NEWS_CATEGORY)->insert($data);
    }


    public static function deleteNewsCategory(int $id): void
    {
        DB::table(self::NEWS_CATEGORY)->where('news_id', $id)->delete();
    }
}
