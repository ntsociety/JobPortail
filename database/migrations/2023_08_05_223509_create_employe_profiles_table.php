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
        Schema::create('employe_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('email')->unique();
            $table->string('name')->nullable();
            $table->string('f_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('birth_day')->nullable();
            $table->string('gender')->nullable();
            $table->string('bio')->nullable();
            $table->string('domain')->nullable();
            $table->string('experience_years')->nullable();
            $table->text('education')->nullable();
            $table->text('experience')->nullable();
            $table->string('lang_1')->nullable();
            $table->string('lang_2')->nullable();
            $table->string('cv')->nullable();
            $table->string('photo_profil')->nullable();
            $table->string('fb_user')->nullable();
            $table->string('insta_user')->nullable();
            $table->string('link_user')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employe_profiles');
    }
};
