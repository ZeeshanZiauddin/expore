<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{

    protected $fillable = [
        'status',
        'from',
        'to',
        'departure_date',
        'return_date',
        'name',
        'email',
        'phone',
        'passengers',
        'flight_class',
    ];

    public function fromDestination()
    {
        return $this->belongsTo(Destination::class, 'from');
    }

    public function toDestination()
    {
        return $this->belongsTo(Destination::class, 'to');
    }
    public function awailedBy()
    {
        return $this->belongsTo(User::class, 'awailed_by');
    }
}