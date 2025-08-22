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
        Schema::create('topic_article', function (Blueprint $table) {
            $table->id('id_topic_article');
            $table->unsignedBigInteger('id_article')->index();
            $table->unsignedBigInteger('id_topic')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_article')->references('id_article')->on('article')->onDelete('cascade');
            $table->foreign('id_topic')->references('id_topic')->on('topic')->onDelete('cascade');
            $table->unique(['id_article', 'id_topic']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_article');
    }
};
