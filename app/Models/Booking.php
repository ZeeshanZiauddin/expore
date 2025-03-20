<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parallax\FilamentComments\Models\Traits\HasFilamentComments;

class Booking extends Model
{
    use HasFactory, HasFilamentComments;

    protected $fillable = [
        'booking_date',
        'booking_agent',
        'supplier_id',
        'supplier_ref',
        'brand',
        'payment_method',
        'payment_due_date',
        'payment_amount',
        'bank_name',
        'card_no',
        'card_expire',
        'card_cvv',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_mobile',
        'departure_airport_id',
        'destination_airport_id',
        'flight_type',
        'gds',
        'flight_class',
        'segment',
        'going_stopover',
        'return_stopover',
        'departure_date_time',
        'destination_date_time',
        'airline_id',
        'pnr',
        'pnr_expire',
        'fare_expire',
        'airline_locator',
        'flight_detail_system',
        'flight_detail_client',
        'quick_type',
        'payment_plan',
        'basic_fare',
        'tax',
        'apc',
        'safi',
        'misc',
        'user_id',
    ];

    /**
     * Relationships
     */

    // Supplier relationship
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // User relationship (who created the booking)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Airline relationship
    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
    public function passengers()
    {
        return $this->hasMany(Passenger::class);
    }

    // Departure Airport relationship
    public function departureAirport()
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id');
    }


    // Destination Airport relationship
    public function destinationAirport()
    {
        return $this->belongsTo(Airport::class, 'destination_airport_id');
    }

    // Going Stopover Airport relationship
    public function goingStopover()
    {
        return $this->belongsTo(Airport::class, 'going_stopover');
    }
    // Return Stopover Airport relationship
    public function returnStopover()
    {
        return $this->belongsTo(Airport::class, 'return_stopover');
    }


    /**
     * Accessors & Mutators (For Sensitive Fields)
     */

    // Encrypt Card CVV when storing in DB
    public function setCardCvvAttribute($value)
    {
        $this->attributes['card_cvv'] = $value ? encrypt($value) : null;
    }

    public function getCardCvvAttribute($value)
    {
        return $value ? decrypt($value) : null;
    }

}