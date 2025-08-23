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
        Schema::create('article', function (Blueprint $table) {
            $table->id('id_article');
            $table->unsignedBigInteger('id_user')->index();
            $table->unsignedBigInteger('id_topic')->index();
            $table->string('kode', 150)->unique();
            $table->string('title', 100);
            $table->text('article');
            $table->enum('status',['pending', 'approved', 'rejected'])->default('pending');
            $table->integer('view')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('id_topic')->references('id_topic')->on('topic')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
