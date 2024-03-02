<?php

namespace App\Models;
//
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Broker
 */
class Broker extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name','address','zip_code','phone_number','logo_path','city'
    ];
}