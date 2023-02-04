<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmittedField extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'submission_schema_id',
        'submission_schema_label',
        'value',
    ];

    protected $with = [
        'file',
        'submissionSchema',
    ];

    public function submissionSchema()
    {
        return $this->belongsTo(SubmissionSchema::class);
    }

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
