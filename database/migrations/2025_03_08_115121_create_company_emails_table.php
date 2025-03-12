<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('company_emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name')->default('Email');
            $table->string('email')->unique();
            $table->string('mail_host')->nullable();
            $table->integer('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('mail_from_name')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_emails');
    }
};