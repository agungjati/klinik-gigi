<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class DoctorController extends Controller
{

    public function store(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->role = 'doctor';
        $user->password = $request->password;
        $user->save();
        return response()->json($user);
       
    }

    public function findAll(Request $request)
    {
        $doctors = User::where('role', 'doctor')->where('users.deleted', 0);
        if(isset($request->search)) {
            $doctors = $doctors->where(function($query) use ($request) {
                $query->whereRaw("LOWER(CONCAT(first_name, ' ', last_name)) LIKE LOWER(?)", ['%' . $request->search . '%']);
            });
        }
        
        if($request->join == 'schedule') {
            $doctors = $doctors->with('schedules')
                ->select('users.*', 'schedules.start_date', 'schedules.end_date', 'schedules.from_time', 'schedules.end_time', 'schedules.status');
        }
        $limit = $request->limit ? $request->limit : 10;
        $offset = $request->offset ? $request->offset : 0;
        $count = $doctors->count();
        $doctors = $doctors->limit($limit)->offset($offset)->get();

        $pagination = array(
            'total' => $count,
            'limit' => $limit,
            'offset' => $offset,
            'data' => $doctors,
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
        $user->role = 'doctor';
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