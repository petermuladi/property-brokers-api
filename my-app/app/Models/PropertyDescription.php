<?php

namespace App\Models;
//
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * PropertyDescription
 */
class PropertyDescription extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'property_id',
        'price',
        'bedrooms',
        'bathrooms',
        'sqft',
        'price_sqft',
        'property_type',
        'status'
    ];
}