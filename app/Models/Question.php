<?php

namespace App\Models;

use App\Enums\AnswerTypes;
use App\Services\UniqueKeyGeneratorService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'uuid',
        'text',
        'answer_type',
        'order'
    ];

    protected $casts = [
        'answer_type' => AnswerTypes::class
    ];

    protected $appends = [
        'scoreable'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getScoreableAttribute()
    {
        return $this->answer_type->canBeScored();
    }
}
