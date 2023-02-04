<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionSchemaMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    public function submissionSchema()
    {
        return $this->belongsTo(SubmissionSchema::class);
    }
}
