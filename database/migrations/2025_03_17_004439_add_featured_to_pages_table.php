<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('featured')->default(false)->after('parent_id');
            $table->string('featured_image')->nullable()->after('featured'); // Adding featured_image column
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['featured', 'featured_image']);
        });
    }
};