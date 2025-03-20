<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'city', 'country', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departureBookings()
    {
        return $this->hasMany(Booking::class, 'departure_airport_id');
    }

    public function destinationBookings()
    {
        return $this->hasMany(Booking::class, 'destination_airport_id');
    }


    // Accessor for city and code combined
    public function getCityCodeAttribute(): string
    {
        return "{$this->city} ({$this->code})";
    }
}