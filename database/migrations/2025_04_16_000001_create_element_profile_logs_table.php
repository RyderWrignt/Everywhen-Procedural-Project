<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('element_profile_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('element_id');
            $table->uuid('session_id');
            $table->text('summary');
            $table->string('created_by'); // DM or user who ran the profile
            $table->json('tags')->nullable(); // e.g., "prep", "reveal", "version 2"
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();


        });
    }

    public function down(): void
    {
        Schema::dropIfExists('element_profile_logs');
    }
};
