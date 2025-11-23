<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KariahBoundary extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_name',
        'boundary_polygon',
        'color',
        'is_active',
        'description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the polygon as array
     */
    public function getPolygonArrayAttribute()
    {
        return json_decode($this->boundary_polygon, true);
    }

    /**
     * Set the polygon from array
     */
    public function setPolygonArrayAttribute($value)
    {
        $this->attributes['boundary_polygon'] = json_encode($value);
    }
}