<?php

namespace App\Http\Resources;
//
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PropertyDescriptionResource;

/**
 * PropertiesResource
 */
class PropertiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      return [
            'property-id' => $this->id,
            'property-address' => $this->address,
            'property-broker' =>
            [
                // Broker relation
                'broker_name' => $this->broker->name,
                'broker_id' => $this->broker->id,
                'phone' => $this->broker->phone_number,
            ],
            'property-attributes' =>
            [
                'address' => $this->address,
                'listing_type' => $this->listing_type,
                'city' => $this->city,
                'zip_code' => $this->zip_code,
                'description' => $this->description,
                'build_year' => $this->build_year,
            ],
            'property-description-data' => new PropertyDescriptionResource($this->propertyDescrtiption),
        ];
    }
}