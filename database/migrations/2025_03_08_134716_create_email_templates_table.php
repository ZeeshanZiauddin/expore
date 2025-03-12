<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Template Name
            $table->string('blade_path')->nullable(); // Path to the generated Blade file
            $table->text('html_content'); // Email HTML Content
            $table->json('fields')->nullable(); // Dynamic fields for the template
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_templates');
    }
};