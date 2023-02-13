<?php

namespace App\Services;

use Illuminate\Support\Str;

class UniqueKeyGeneratorService
{
    public static function generateShortKey(string $model, string $keyField, int $stringLength = 8): string
    {
        $key = self::randomString($stringLength);
        $model = new $model;

        while ($model->where($keyField, $key)->exists()) {
            $key = self::randomString($stringLength);
        }

        return $key;
    }

    private static function randomString(int $stringLength): string
    {
        return strtoupper(Str::random($stringLength));
    }
}
