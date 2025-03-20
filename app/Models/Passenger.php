<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'relation',
        'sale',
        'admin_fee',
        'ticket_no'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}