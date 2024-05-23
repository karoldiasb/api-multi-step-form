<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdOnRequest;
use App\Models\AdOn;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class AdOnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdOnRequest $request): JsonResponse
    {
        $search = function ($query) use ($request) {
            $same = $request->only('plan_id', 'plan_type_id');

            foreach ($same as $name => $value) {
                if ($value) {
                    $query->where($name, '=', $value);
                }
            }
        };

        $adOns = AdOn::where($search)->get();

        return response()->json(
            [
                'data' => $adOns,
                'total' => $adOns->count()
            ],
            Response::HTTP_OK
        );

    }
}
