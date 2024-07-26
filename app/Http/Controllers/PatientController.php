<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class PatientController extends Controller
{

    public function store(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->role = 'patient';
        $user->password = $request->password;
        $user->save();
        return response()->json($user);
       
    }

    public function findAll(Request $request)
    {
        $patients = User::where('role', 'patient')->where('deleted', 0);
        if(isset($request->search)) {
            $patients = $patients->where(function($query) use ($request) {
                $query->where('first_name', 'like', '%'.$request->search.'%')
                        ->orWhere('last_name', 'like', '%'.$request->search.'%');
            });
        }
        
        $limit = $request->limit ? $request->limit : 10;
        $offset = $request->offset ? $request->offset : 0;
        $count = $patients->count();
        $patients = $patients->limit($limit)->offset($offset)->get();

        $pagination = array(
            'total' => $count,
            'limit' => $limit,
            'offset' => $offset,
            'data' => $patients,
        );

        return response()->json($pagination);
        
    }

    public function Edit(Request $request)
    {
        $user = User::find($request->user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'patient';
        if(isset($request->password)) {
            $user->password = $request->password;
        }    
        $user->save();
        return response()->json($user);
    }

    public function Delete(Request $request)
    {
        $user = User::find($request->user_id);
        $user->deleted = 1;
        $user->save();
        return response()->json($user);
    }
}