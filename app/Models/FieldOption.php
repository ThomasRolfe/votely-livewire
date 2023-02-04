<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOption extends Model
{
    use HasFactory;

    public function meta()
    {
        return $this->hasOne(FieldOptionMeta::class);
    }
}
