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
        Schema::create('poster', function (Blueprint $table) {
            $table->id('id_poster');
            $table->unsignedBigInteger('id_user')->index();
            $table->text('path');
            $table->enum('status',['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('status_active',['active', 'nonactive'])->default('active');
            $table->date('date');

            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poster');
    }
};
