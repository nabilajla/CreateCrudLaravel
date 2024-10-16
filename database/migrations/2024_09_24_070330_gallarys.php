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
        Schema::create('Gallarys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ProjectID');

            $table->foreign('ProjectID')->references('id')->on('Projects')->onDelete('cascade');


            $table->text("gallary");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Gallarys');
    }
};
