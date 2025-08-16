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
        Schema::create('user', function (Blueprint $table) {
            $table->id('id_user');
            $table->unsignedBigInteger('id_role')->unique()->index();
            $table->string('email', 100)->unique();
            $table->string('password', 20);
            $table->string('name', 100);
            $table->text('address');
            $table->string('phone_number', 30)->unique();
            $table->date('birth_date');
            $table->enum('gender', ['man', 'woman']);
            $table->string('highest_education', 100);
            $table->text('photo_path');
            $table->timestamps();

            $table->foreign('id_role')->references('id_role')->on('role')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
