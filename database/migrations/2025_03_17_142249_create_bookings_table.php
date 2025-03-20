<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('booking_date');
            $table->string('booking_agent');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->string('supplier_ref');
            $table->string('brand');
            $table->enum('payment_method', ['card', 'bank'])->nullable();
            $table->date('payment_due_date')->nullable();
            $table->decimal('payment_amount', 10, 2);
            $table->string('bank_name')->nullable();
            $table->string('card_no')->nullable();
            $table->string('card_expire')->nullable();
            $table->string('card_cvv')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->foreignId('departure_airport_id')->nullable()->constrained('airports')->onDelete('set null');
            $table->foreignId('destination_airport_id')->nullable()->constrained('airports')->onDelete('set null');
            $table->enum('flight_type', ['one_way', 'return'])->nullable();
            $table->string('gds')->nullable();
            $table->enum('flight_class', ['economy', 'business', 'first_class'])->nullable();
            $table->string('segment')->nullable();
            $table->boolean('going_stopover')->nullable();
            $table->boolean('return_stopover')->nullable();
            $table->dateTime('departure_date_time')->nullable();
            $table->dateTime('destination_date_time')->nullable();
            $table->foreignId('airline_id')->constrained('airlines')->onDelete('cascade');
            $table->string('pnr')->nullable();
            $table->dateTime('pnr_expire')->nullable();
            $table->dateTime('fare_expire')->nullable();
            $table->string('airline_locator')->nullable();
            $table->longText('flight_detail_system')->nullable();
            $table->longText('flight_detail_client')->nullable();
            $table->enum('quick_type', ['not_under_quoted', 'under_quoted_with_availability', 'under_quoted_with_no_availability'])->nullable();
            $table->enum('payment_plan', ['full', 'installments']);
            $table->decimal('basic_fare', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('apc', 10, 2);
            $table->decimal('safi', 10, 2);
            $table->decimal('misc', 10, 2);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};