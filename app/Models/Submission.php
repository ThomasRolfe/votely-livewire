<?php

namespace App\Models;

use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    use HasTags;

    protected $fillable = [
        'contest_id',
        'ip_address',
    ];
    protected $with = [
        'submittedFields',
    ];

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }

    public function submittedFields()
    {
        return $this->hasMany(SubmittedField::class);
    }
}
