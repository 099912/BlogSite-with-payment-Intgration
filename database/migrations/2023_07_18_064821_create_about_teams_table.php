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
        //soft deletes if you want
        Schema::create('about_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profession');
            $table->longText('discription');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_teams');
    }
};
