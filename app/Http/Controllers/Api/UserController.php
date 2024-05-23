<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserAdOn;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * create a new user
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request): JsonResponse
    {
        $newUser = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => strval($request->get('phone')),
            'password' => Hash::make(Str::random(8))
        ]);

        foreach($request->get('ad_on_ids') as $ad_on_id){
            UserAdOn::create([
                'user_id' => $newUser->id,
                'ad_on_id' => $ad_on_id
            ]);
        }

        return response()->json(
            [
                'success' => true,
                "msg" => 'user created'
            ],
            Response::HTTP_CREATED
        );
    }
}
