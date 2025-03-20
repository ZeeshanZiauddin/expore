<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('pending');
            $table->foreignId('from')->constrained('destinations')->cascadeOnDelete();
            $table->foreignId('to')->constrained('destinations')->cascadeOnDelete();
            $table->date('departure_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('passengers')->default(1);
            $table->string('flight_class')->default('economy');
            $table->foreignId('awailed_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('queries');
    }
};