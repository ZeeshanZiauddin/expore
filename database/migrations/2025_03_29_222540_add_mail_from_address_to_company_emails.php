<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('company_emails', function (Blueprint $table) {
            $table->string('mail_from_address')->nullable()->after('mail_from_name');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('company_emails', function (Blueprint $table) {
            $table->dropColumn('mail_from_address');
            $table->dropForeign(['user_id']);
        });
    }
};