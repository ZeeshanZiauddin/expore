<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'blade_path', 'html_content', 'fields'];

    protected $casts = [
        'fields' => 'array',
        'html_content' => 'array',

    ];
}