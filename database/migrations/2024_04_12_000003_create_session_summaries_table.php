<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('session_summaries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('session_code')->unique();
            $table->string('title')->nullable();
            $table->date('date');
            $table->string('setting');
            $table->string('goal');
            $table->string('noun');
            $table->text('summary')->nullable();
            $table->json('notable_npcs')->nullable();
            $table->text('plot_hooks')->nullable();
            $table->string('google_doc_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('session_summaries');
    }
};
