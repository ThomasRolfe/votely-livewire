<?php

use App\Enums\ContestStatuses;
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
        Schema::create('contests', function (Blueprint $table) {
            $table->id();
            $table->uuid()->index();
            $table->string('public_key')->index();
            $table->foreignIdFor(\App\Models\User::class);
            $table->string('name');
            $table->text('description');
            $table->string('cover_image')->nullable();
            $table->string('status')->nullable(ContestStatuses::Draft->value);
            $table->timestamp('submission_start_date')->nullable();
            $table->timestamp('submission_end_date')->nullable();
            $table->timestamp('vote_start_date')->nullable();
            $table->timestamp('vote_end_date')->nullable();
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
        Schema::dropIfExists('contests');
    }
};
