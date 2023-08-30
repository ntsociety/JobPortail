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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cate_id')->default('1');
            $table->string('slug');
            $table->string('title');
            $table->string('region')->nullable();
            $table->string('type')->nullable();
            $table->string('vacancy')->nullable();
            $table->string('experience')->nullable();
            $table->string('salary')->nullable();
            $table->string('gender')->nullable();
            $table->string('apps_deadline')->nullable();
            $table->string('cover')->nullable();
            $table->text('description')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('education_experience')->nullable();
            $table->text('other_benifits')->nullable();
            $table->boolean('is_available')->default('1');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
