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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('domain')->nullable();
            $table->string('slug')->nullable();
            $table->string('company_email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('address')->nullable();
            $table->enum('statut', ['non', 'en attente', 'rejeté'])->default('non');
            $table->string('logo')->nullable();
            $table->string('site_url')->nullable();
            $table->string('fb_user')->nullable();
            $table->string('twit_user')->nullable();
            $table->string('link_user')->nullable();
            $table->string('agrement')->unique()->nullable();
            $table->text('about')->nullable();
            $table->boolean('is_verify')->default('0');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
