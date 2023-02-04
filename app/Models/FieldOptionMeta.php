<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Store field option scores here when part of question answers (not as part of submission criteria)
class FieldOptionMeta extends Model
{
    use HasFactory;

    public function fieldOption()
    {
        return $this->belongsTo(FieldOption::class);
    }
}
