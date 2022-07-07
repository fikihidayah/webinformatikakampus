<?php

use App\Models\Setting;
use Illuminate\Support\Carbon;


function to_indo(string $date)
{
  // Carbon::setLocale('id');
  return Carbon::parse($date)->isoFormat("D MMMM Y");
}

function to_human(string $date)
{
  return Carbon::parse($date)->diffForHumans();
}

function setting(string $data = null)
{
  $result = Setting::where('id', 1)->first();
  if (!isset($data)) return $result;
  return $result->{$data};
}

/**
 * Not set massage
 * @param string $message pesan tiada
 */
function nsm($message = 'not set'): string
{
  return '<div class="badge bg-info text-white">' . $message . '</div>';
}

function del_file(string $filePath)
{
  if (file_exists($filePath)) unlink($filePath);
}
