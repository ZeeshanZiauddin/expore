<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table(config('filament-fabricator.table_name', 'pages'), function (Blueprint $table) {
            $table->foreignId('destination_id')->nullable()->constrained('destinations')->cascadeOnDelete()->cascadeOnUpdate()->after('title');
            $table->boolean('index')->default(false)->after('destination_id'); // Adding the index column with true/false values
        });
    }

    public function down()
    {
        Schema::table(config('filament-fabricator.table_name', 'pages'), function (Blueprint $table) {
            $table->dropForeign(['destination_id']);
            $table->dropColumn(['destination_id', 'index']); // Dropping both columns in the rollback
        });
    }
};