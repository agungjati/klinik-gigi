<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->role = 'user';
        $user->password = $request->password;
        $user->save();
        return response()->json($user);
       
    }

    public function signIn(Request $request)
    {
        $password = $request->password;

        $user = User::where('email', $request->email)
            ->select('user_id', 'first_name', 'last_name', 'email', 'phone', 'role', 'password')
            ->first();
    
        if ($user) {
            $user->revealHiddenAttributes();
            
            if ($user->password == $password) {
                return response()->json([
                    'user_id' => $user->user_id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'role' => $user->role,
                ]);
            }

            return response()->json(['message' => 'Invalid password'], 401);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}