<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{

    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->schedule_id = $request->schedule_id;
        $schedule->user_id = $request->user_id;
        $schedule->start_date = $request->start_date;
        $schedule->end_date = $request->end_date;
        $schedule->from_time = $request->from_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->deleted = 0;
        $schedule->save();
        return response()->json($schedule);
    }

    public function findAll(Request $request)
    {
        $schedule = Schedule::where('schedules.deleted', 0)->leftJoin('users', 'schedules.user_id', '=', 'users.user_id')
            ->select('schedules.*', 'users.first_name', 'users.last_name');
        
        if(isset($request->search)) {
            $schedule = $schedule->where(function($query) use ($request) {
                $query->whereRaw("LOWER(CONCAT(users.first_name, ' ', users.last_name)) LIKE LOWER(?)", ['%' . $request->search . '%']);
            });
        }
        
        $limit = $request->limit ? $request->limit : 10;
        $offset = $request->offset ? $request->offset : 0;
        $count = $schedule->count();
        $schedule = $schedule->limit($limit)->offset($offset)->get();

        $pagination = array(
            'total' => $count,
            'limit' => $limit,
            'offset' => $offset,
            'data' => $schedule,
        );

        return response()->json($pagination);
        
    }

    public function Edit(Request $request)
    {
        $schedule = Schedule::find($request->schedule_id);
        $schedule->user_id = $request->user_id;
        $schedule->start_date = $request->start_date;
        $schedule->end_date = $request->end_date;
        $schedule->from_time = $request->from_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->save();
        return response()->json($schedule);
    }

    public function Delete(Request $request)
    {
        $schedule = Schedule::find($request->schedule_id);
        $schedule->deleted = 1;
        $schedule->save();
        return response()->json($schedule);
    }
}