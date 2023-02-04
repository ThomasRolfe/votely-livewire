<?php

use App\Models\Submission;
use App\Models\SubmissionSchema;
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
        Schema::create('submitted_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Submission::class);
            $table->foreignIdFor(SubmissionSchema::class);
            $table->string('submission_schema_label'); // Kept in case label of schema changes after submission
            $table->text('value');
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
        Schema::dropIfExists('submitted_fields');
    }
};
