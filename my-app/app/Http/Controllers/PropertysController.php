<?php

namespace App\Http\Controllers;
//
use App\Models\Property;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PropertiesResource;
use App\Http\Requests\StorePropertyRequest;

/**
 * PropertysController
 */
class PropertysController extends Controller
{
    use HttpResponse;

    /**
     * notFound
     *
     * @param  mixed $id
     * @return JsonResponse
     */
    private function propertyNotFound(string $id): JsonResponse
    {
        return $this->response('Property' . $id . 'not found', [], 404);
    }

    /**
     * index
     *
     * @return PropertiesResource
     */
    public function index()
    {
        return PropertiesResource::collection(Property::all());
    }

    /**
     * store
     *
     * @param  StorePropertyRequest $request
     * @return void
     */
    public function store(StorePropertyRequest $request): PropertiesResource
    {
        $request->validated();
        //
        $property = Property::create([

            'broker_id' => $request->broker_id,
            //
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'description' => $request->description,
            'build_year' => $request->build_year,

        ]);
        //
        $property->propertyDescrtiption()->create([

            'property_id' => $property->id,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'sqft' => $request->sqft,
            'price_sqft' => $request->price_sqft,
            'property_type' => $request->property_type,
            'status' => $request->status,
        ]);
        //
        return new PropertiesResource($property);
    }

    /**
     * show
     *
     * @param  string $id
     * @return mixed
     */
    public function show(string $id): mixed
    {
        $property = Property::find($id);
        //
        if (!$property) {
            return $this->propertyNotFound($id);
        }
        //
        return new PropertiesResource($property);
    }

    /**
     * update
     *
     * @param  Request $request
     * @param  string $id
     * @return mixed
     */
    public function update(Request $request, string $id): mixed
    {
        $property = Property::find($id);
        //
        if (!$property) {
            return $this->propertyNotFound($id);
        }
        //
        $property->update($request->only([

            'broker_id',
            'address',
            'listing_type',
            'city',
            'zip_code',
            'description',
            'build_year'

        ]));
        //
        $property->propertyDescrtiption()
            ->where('property_id', $property->id)
            ->update($request->only([
                'property_id',
                'price',
                'bedrooms',
                'bathrooms',
                'sqft',
                'price_sqft',
                'property_type',
                'status'
            ]));
        //
        return new PropertiesResource($property);
    }

    /**
     * destroy
     *
     * @param  string $id
     * @return mixed
     */
    public function destroy(string $id): mixed
    {
        $property = Property::find($id);
        //
        if (!$property) {
            return $this->propertyNotFound($id);
        }
        //
        $property->delete();
        //
        return  [
            'message' => response()->json('Property was deleted'),
            'broker' => new PropertiesResource($property),
        ];
    }
}