<?php

namespace App\Models;
//
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Property
 */
class Property extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'broker_id',
        'address',
        'listing_type',
        'city',
        'zip_code',
        'description',
        'build_year'
    ];

    /**
     * broker
     *
     * @return BelongsTo
     */
    public function broker(): BelongsTo
    {
        return $this->belongsTo(Broker::class);
    }

    /**
     * propertyDescrtiption
     *
     * @return HasOne
     */
    public function propertyDescrtiption(): HasOne
    {
        return $this->hasOne(PropertyDescription::class);
    }
}