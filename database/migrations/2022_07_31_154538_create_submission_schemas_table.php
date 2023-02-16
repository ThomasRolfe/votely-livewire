<?php

use App\Models\Contest;
use App\Models\FieldType;
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
        Schema::create('submission_schemas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Contest::class);
            $table->foreignIdFor(FieldType::class);
            $table->string('label');
            $table->boolean('required');
            $table->boolean('visible_to_voters')->default(false);
            $table->boolean('show_in_preview')->default(false);
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('submission_schemas');
    }
};
