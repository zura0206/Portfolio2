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
        Schema::create('ivet_summaries', function (Blueprint $table) {
            $table->id();
            $table->text('professional_skills');
            $table->text('networking');
            $table->text('trend_awareness');
            $table->text('personal_growth');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ivet_summaries');
    }
};
