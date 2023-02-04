<?php

namespace App\Models;

use App\Enums\ContestStatuses;
use App\Services\UniqueKeyGeneratorService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'public_key',
        'submission_start_date',
        'submission_end_date',
        'vote_start_date',
        'vote_end_date',
    ];

    protected $dates = [
        'submission_start_date',
        'submission_end_date',
        'vote_start_date',
        'vote_end_date',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => ContestStatuses::class,
    ];

    protected $with = [
        'coverImage',
        'submissionSchemas',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
            $model->public_key = UniqueKeyGeneratorService::generateShortKey(self::class, 'public_key');
        });
    }

    public function submissionSchemas()
    {
        return $this->hasMany(SubmissionSchema::class)->orderBy('order', 'ASC');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function coverImage()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    //public function getTimeRemainingAttribute()
    //{
    //    if (!$this->end_date || !$this->start_date) {
    //        return 'N/A';
    //    }
    //
    //    return $this->end_date->diffAsCarbonInterval($this->start_date)->forHumans(['join' => true, 'parts' => 2]);
    //}
}
