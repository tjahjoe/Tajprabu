<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tag_article', function (Blueprint $table) {
            $table->id('id_tag_article');
            $table->unsignedBigInteger('id_article')->index();
            $table->unsignedBigInteger('id_tag')->index();
            $table->timestamps();

            $table->foreign('id_article')->references('id_article')->on('article')->onDelete('cascade');
            $table->foreign('id_tag')->references('id_tag')->on('tag')->onDelete('cascade');
            $table->unique(['id_article', 'id_tag']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_article');
    }
};
