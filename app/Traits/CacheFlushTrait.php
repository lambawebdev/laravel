<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait CacheFlushTrait
{
    public static function bootCacheFlushTrait()
    {
        self::created(function ($model) {
            Cache::tags([self::$tag])->flush();
        });

        self::updated(function ($model) {
            Cache::tags([self::$tag])->flush();
        });

        self::deleted(function ($model) {
            Cache::tags([self::$tag])->flush();
        });
    }
}
