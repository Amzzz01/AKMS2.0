<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueLocation extends Model
{
    use HasFactory;

    protected $table = 'mosque_location';

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'zoom_level'
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'zoom_level' => 'integer',
    ];
}