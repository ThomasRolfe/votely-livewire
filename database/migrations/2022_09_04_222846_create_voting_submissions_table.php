<?php

use App\Enums\VotingSubmissionStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voting_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->string('status')->nullable()->default(VotingSubmissionStatus::Draft->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voting_submissions');
    }
};
