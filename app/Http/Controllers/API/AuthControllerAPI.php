<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Requests\API\SigninRequest;
class AuthControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SigninRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json(
                [
                    'error' => 'Invalid credentials',
                    'status' => Response::HTTP_UNPROCESSABLE_ENTITY
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $accessToken = auth()->user()->createToken('Bearer Token');
        return response()->json([
            'token_type' => 'Bearer',
            'access_token' => $accessToken->plainTextToken,
            'status' => Response::HTTP_OK      
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'error' => 'Tokens Revoked',
            'status' => Response::HTTP_OK
        ],Response::HTTP_OK);
    }
}
