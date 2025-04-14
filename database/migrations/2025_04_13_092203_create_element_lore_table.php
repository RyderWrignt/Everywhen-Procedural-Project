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
        Schema::create('element_lore', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('element_id');
            $table->string('pending_element_name')->nullable();
            $table->string('title')->nullable(); // Optional label like “Miralda’s Secret”
            $table->text('content');
            $table->boolean('is_player_visible')->default(false);
            $table->uuid('revealed_in_session')->nullable();
            $table->string('created_by')->nullable();
            $table->json('tags')->nullable(); // e.g., ["origin", "secret"]
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('element_lore');
    }
};
