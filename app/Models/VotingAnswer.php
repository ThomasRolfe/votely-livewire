<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingAnswer extends Model
{
    use HasFactory;

    // The contest entry this relates to
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function votingSubmission()
    {
        return $this->belongsTo(VotingSubmission::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
