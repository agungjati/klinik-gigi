<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('welcome', compact('appointments'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'doctor' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'describe' => 'required'
        ]);

        $dateExp = explode('/', $request->date);
        $date = $dateExp[2] . '-' . $dateExp[0] . '-' . $dateExp[1];

        $appointment = new Appointment();
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->hp = $request->hp;
        $appointment->doctor = $request->doctor;
        $appointment->date = $date;
        $appointment->time = substr($request->time,0, 5);
        $appointment->describe = $request->describe;
        $appointment->save();

        return redirect('/#kontak')->with([ 'data' => $appointment ]);
    }
}