<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('model_specs');
        Schema::create('model_specs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->foreignId("type_model_id")->constrained("type_models")->cascadeOnDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_specs');
    }
};
