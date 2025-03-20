<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Drop the old boolean columns if they exist
            if (Schema::hasColumn('bookings', 'going_stopover')) {
                $table->dropColumn('going_stopover');
            }
            if (Schema::hasColumn('bookings', 'booking_agent')) {
                $table->dropColumn('booking_agent');
            }
            if (Schema::hasColumn('bookings', 'return_stopover')) {
                $table->dropColumn('return_stopover');
            }

            // Add the new foreign key columns
            $table->foreignId('going_stopover_id')
                ->nullable()
                ->constrained('airports')
                ->nullOnDelete();

            $table->foreignId('return_stopover_id')
                ->nullable()
                ->constrained('airports')
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Drop foreign keys and columns in case of rollback
            $table->dropForeign(['going_stopover_id']);
            $table->dropForeign(['return_stopover_id']);
            $table->dropColumn(['going_stopover_id', 'return_stopover_id']);

            // Restore the boolean columns if needed
            $table->boolean('going_stopover')->nullable();
            $table->boolean('return_stopover')->nullable();
            $table->boolean('booking_agent')->nullable();
        });
    }
};