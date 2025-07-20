<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnakKariah extends Model
{
    use HasFactory;
    protected $table = 'anak_kariah';

    protected $casts = [
        'birth_date' => 'date',
    ];    

    protected $fillable = [
        'full_name', 'ic_number', 'address', 'phone_number', 'gender', 'date_of_birth', 'areas'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}

