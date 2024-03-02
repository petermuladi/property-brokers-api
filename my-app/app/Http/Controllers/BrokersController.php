<?php

namespace App\Http\Controllers;
//
use App\Models\Broker;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Resources\BrokersResource;
use App\Http\Requests\StoreBrokerRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * BrokersController
 */
class BrokersController extends Controller
{

    use HttpResponse;

    /**
     * notFound
     *
     * @param  mixed $id
     * @return JsonResponse
     */
    private function brokerNotFound(string $id): JsonResponse
    {
        return $this->response('Broker_' . $id . 'not found', [], 404);
    }

    /**
     * index
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return BrokersResource::collection(Broker::all());
    }

    /**
     * store
     *
     * @param  StoreBrokerRequest $request
     * @return void
     */
    public function store(StoreBrokerRequest $request)
    {
        $request->validated();
        //
        $broker = Broker::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'zip_code' => $request->zip_code,
            'logo_path' => $request->logo_path,

        ]);
        //
        return new BrokersResource($broker);
    }

    /**
     * show
     *
     * @param  string $id
     * @return mixed
     */
    public function show(string $id): mixed
    {
        $broker = Broker::find($id);
        //
        if (!$broker) {
            return $this->brokerNotFound($id);
        }
        //
        return new BrokersResource($broker);
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
        $broker = Broker::find($id);
        //
        if (!$broker) {
            return $this->brokerNotFound($id);
        }
        //
        $broker->update($request->only([
            'name', 'address', 'zip_code', 'phone_number', 'logo_path', 'city'
        ]));
        //
        return new BrokersResource($broker);
    }

    /**
     * destroy
     *
     * @param  string $id
     * @return mixed
     */
    public function destroy(string $id): mixed
    {
        $broker = Broker::find($id);
        //
        if (!$broker) {
            return $this->brokerNotFound($id);
        }
        //
        $broker->delete();
        //
        return [
            'message' => response()->json('Broker was deleted'),
            'broker' => new BrokersResource($broker),
        ];
    }
}