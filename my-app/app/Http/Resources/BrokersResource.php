<?php

namespace App\Http\Resources;
//
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrokersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
        'id'=>$this->id,
        'name'=>$this->name,
        'address'=>$this->address,
        'phone'=>$this->phone_number,
        'logo'=>$this->logo_path,
       ];
    }

}