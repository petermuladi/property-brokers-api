<?php

namespace App\Traits;
//
use Illuminate\Http\JsonResponse;

trait HttpResponse
{
    /**
     * response
     *
     * @param  string $message
     * @param  array $data
     * @param  int $status
     * @return JsonResponse
     */
    public function response($message = null, $data = [], $status = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}