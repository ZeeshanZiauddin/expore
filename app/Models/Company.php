<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'favicon', 'api_key', 'status'];

    public function emails()
    {
        return $this->hasMany(CompanyEmail::class);
    }
}