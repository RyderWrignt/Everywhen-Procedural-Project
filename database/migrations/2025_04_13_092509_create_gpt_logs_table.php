<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gpt_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('session_id')->nullable();
            $table->string('purpose');
            $table->integer('prompt_tokens');
            $table->integer('completion_tokens');
            $table->integer('total_tokens');
            $table->json('input_snapshot');
            $table->json('output_snapshot');
            $table->string('model'); // e.g., "gpt-4", "gpt-3.5"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gpt_logs');
    }
};
