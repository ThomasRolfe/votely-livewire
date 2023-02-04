<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionSchema extends Model
{
    use HasFactory;

    protected $fillable = [
        'contest_id',
        'field_type_id',
        'label',
        'required',
        'order',
        'show_in_preview',
        'visible_to_voters',
    ];

    protected $with = [
        'fieldType',
        'options',
        'meta',
    ];

    protected $appends = [
        'showInPreview',
    ];

    protected $casts = [
        'show_in_preview' => 'boolean',
        'visible_to_voters' => 'boolean',
        'required' => 'boolean',
    ];

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }

    public function fieldType()
    {
        return $this->belongsTo(FieldType::class);
    }

    public function options()
    {
        return $this->hasMany(SubmissionSchemaOption::class);
    }

    public function meta()
    {
        return $this->hasMany(SubmissionSchemaMeta::class);
    }
}
