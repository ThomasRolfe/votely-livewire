<?php

namespace App\Services;

use Illuminate\Support\Str;

class UniqueKeyGeneratorService
{
    public static function generateShortKey(string $model, string $keyField): string
    {
        $key = self::randomString();
        $model = new $model();

        while ($model->where($keyField, $key)->exists()) {
            $key = self::randomString();
        }

        return $key;
    }

    private static function randomString(): string
    {
        return strtoupper(Str::random(8));
    }
}
