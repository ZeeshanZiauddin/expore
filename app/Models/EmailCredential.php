<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailCredential extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'host',
        'port',
        'encryption',
        'from_name',
        'reply_to',
        'default'
    ];

    protected $hidden = ['password'];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}