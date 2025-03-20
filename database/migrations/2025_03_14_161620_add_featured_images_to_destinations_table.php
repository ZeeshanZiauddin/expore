<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('featured_image')->nullable(); // Full-size image
            $table->string('compressed_featured_image')->nullable(); // Compressed image
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn(['featured_image', 'compressed_featured_image']);
        });
    }
};