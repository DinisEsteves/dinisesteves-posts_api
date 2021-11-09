<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService
{
    public static function cache(bool $enabled = false, LengthAwarePaginator $posts)
    {
        if ($enabled and !Cache::has('posts')) {
            Cache::put('posts', $posts, now()->addSeconds(5));
        }

        return Cache::pull('posts') ?? $posts;
    }
}
