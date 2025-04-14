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
        Schema::create('elements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('story_id');
            $table->string('element_code')->nullable();
            $table->string('name');
            $table->string('type'); // NPC, town, artifact, etc.
            $table->string('status');
            $table->text('hook');
            $table->json('known_aliases')->nullable();
            $table->integer('priority_score')->default(0);
            $table->uuid('introduced_in_session')->nullable();
            $table->string('created_by');
            $table->timestamps(); // ✅ This adds both created_at and updated_at properly for Laravel

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elements');
    }
};
