<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Setting extends Model
{
    use HasFactory;

    private const slide = 'home_slide_setting';
    private const selamat = 'home_selamatdatang_setting';
    private const testi = 'home_testimoni_setting';

    protected $fillable = ['api_ig_key'];

    public static function getHomeSlide(int $id = null)
    {
        $result = DB::table(self::slide)->get();
        if ($id) {
            $result = $result->where('id', $id)->first();
        }
        return $result;
    }

    public static function getHomeSelamat()
    {
        return DB::table(self::selamat)->first();
    }

    public static function getHomeTestimoni(int $id = null)
    {
        $result = DB::table(self::testi)->get();
        if ($id) {
            $result = $result->where('id', $id)->first();
        }
        return $result;
    }

    public static function updateHomeSelamat(int $id, array $data)
    {
        DB::table(self::selamat)
            ->where('id', $id)
            ->update($data);
    }

    public static function updateHomeSlide(int $id, array $data)
    {
        DB::table(self::slide)
            ->where('id', $id)
            ->update($data);
    }

    public static function updateHomeTesti(int $id, array $data)
    {
        DB::table(self::testi)
            ->where('id', $id)
            ->update($data);
    }

    public static function deleteHomeSlide(int $id)
    {
        DB::table(self::slide)
            ->delete($id);
    }

    public static function deleteHomeTesti(int $id)
    {
        DB::table(self::testi)
            ->delete($id);
    }

    public static function createHomeSlide(array $data)
    {
        DB::table(self::slide)
            ->insert($data);
    }

    public static function createHomeSelamat(array $data)
    {
        DB::table(self::selamat)
            ->insert($data);
    }

    public static function createHomeTesti(array $data)
    {
        DB::table(self::testi)
            ->insert($data);
    }
}
