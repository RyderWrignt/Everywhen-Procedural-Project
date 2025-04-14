<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('session_history', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('story_id');
            $table->string('session_title')->nullable();
            $table->date('date');
            $table->string('type');
            $table->text('session_setting')->nullable();
            $table->string('goal');
            $table->string('noun');
            $table->text('complications')->nullable();
            $table->text('descriptors')->nullable();
            $table->text('consequences')->nullable();
            $table->text('briefing')->nullable();
            $table->text('summary')->nullable();
            $table->text('gpt_summary')->nullable();
            $table->text('transcript')->nullable();
            $table->text('gpt_transcript')->nullable();
            $table->text('gpt_transcript_tagged')->nullable();
            $table->json('notable_npcs')->nullable();
            $table->text('plot_hooks')->nullable();
            $table->string('google_doc_link')->nullable();
            $table->timestamps();
            $table->string('multitrack_recording')->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('session_history');
    }
};
