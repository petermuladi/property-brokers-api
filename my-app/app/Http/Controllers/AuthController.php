<?php

namespace App\Http\Controllers;
//
use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\JsonResponse;

/**
 * AuthController
 */
class AuthController extends Controller
{
    use HttpResponse;

    /**
     * store
     *
     * @param  StoreUserRequest $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        $request->validated();
        //
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //
        $token = $user->createToken('API TOKEN' . $user->name);
        //
        return $this->response('User was Created :' . ':' . $user->name . '', [
            'user' => $user,
            'token' => $token->plainTextToken,
        ]);
    }

    /**
     * login
     *
     * @param  LoginUserRequest $request
     * @return void
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        $request->validated();
        //
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->response('', ' Bad Credentials User not Logged in', 401);
        }
        //
        $user = User::where('email', $request->email)->first();
        //
        return $this->response([
            'user' => $user,
            'token' => $user->createToken('API login Token_' . $user->name)->plainTextToken
        ], 'User Logged in');
    }

    /**
     * logout
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();
        //
        return $this->response('User Logged Out', []);
    }
}