<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\User as UserResource;

class ApiController extends Controller
{

    public function user(Request $request,$id)
    {
        $user=User::find($id);
        return new UserResource($user);
    }

    public function users()
    {
        $user=User::all();
        return new UserCollection($user);
    }



    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        $response['token'] =  $user->createToken('MyApp')->plainTextToken;
        $response['name'] =  $user->name;
        return response()->json(['success' => $response], 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user= Auth::user();
            $response['token'] =  $user->createToken('MyApp')->plainTextToken;
            $response['name'] =  $user->name;
            return response()->json(['success' => $response], 200);
        }else{
            return response()->json(['error' => 'invalid credentials details'], 401);
        }
    }

    public function detail()
    {
        $user = Auth::user();
        $data=[
            'name'=>$user->name,
            'email'=>$user->email,

        ];
        $response['user'] =  $data;
        return response()->json(['success' => $response], 200);
    }
}
