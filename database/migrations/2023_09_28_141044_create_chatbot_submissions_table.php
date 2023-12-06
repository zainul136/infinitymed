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
        Schema::create('chatbot_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('help');
            $table->text('medical_conditions')->nullable();
            $table->string('contact_preference');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('call_time')->nullable();
            $table->boolean('urgent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatbot_submissions');
    }
};
