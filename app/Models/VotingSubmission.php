<?php

namespace App\Models;

use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// This class represents a single persons votes across all submissions and questions
class VotingSubmission extends Model
{
    use HasFactory;
    use HasTags;

    protected $fillable = [
        'contest_id',
        'ip_address',
    ];

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }

    public function answers()
    {
        return $this->hasMany(VotingAnswer::class);
    }
}
