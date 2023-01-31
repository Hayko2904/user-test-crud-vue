<?php


namespace Src\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('app')->plainTextToken;
            $success['name'] =  $user->name;

            return response()->json([
                'token' => $user->createToken('app')->plainTextToken,
                'name' => $user->name
            ]);
        }
        else{
            return  response()->json([
                'error' => 'Unauthorised'
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true
        ]);
    }
}