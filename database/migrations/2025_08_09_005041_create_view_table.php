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
        Schema::create('view', function (Blueprint $table) {
            $table->id('id_view');
            $table->unsignedBigInteger('id_article')->index();
            $table->unsignedBigInteger('id_user')->index();
            $table->timestamps();

            $table->foreign('id_article')->references('id_article')->on('article')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view');
    }
};
