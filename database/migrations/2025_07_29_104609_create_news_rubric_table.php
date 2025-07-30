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
            Schema::create('news_rubric', function (Blueprint $table) {
                $table->foreignId('news_id')->constrained('news')->onDelete('cascade');
                $table->foreignId('rubric_id')->constrained('rubrics')->onDelete('cascade');
                $table->primary(['news_id', 'rubric_id']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_rubric');
    }
};
