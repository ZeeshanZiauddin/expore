<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_id',
        'user_id',
        'company_id',
        'recipient_email',
        'subject',
        'body',
        'status',
        'error_message',
    ];
    protected $casts = [
        'body' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function mailer()
    {
        return $this->belongsTo(CompanyEmail::class, 'email_id');
    }
}