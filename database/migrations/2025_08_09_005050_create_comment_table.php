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
        Schema::create('comment', function (Blueprint $table) {
            $table->id('id_comment');
            $table->unsignedBigInteger('id_article')->index();
            $table->unsignedBigInteger('id_user')->index();
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->unsignedBigInteger('reply_id')->nullable()->index();
            $table->text('comment');
            $table->timestamps();

            $table->foreign('id_article')->references('id_article')->on('article')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('parent_id')->references('id_comment')->on('comment')->onDelete('cascade');
            $table->foreign('reply_id')->references('id_comment')->on('comment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
