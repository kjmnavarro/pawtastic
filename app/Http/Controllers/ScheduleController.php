<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function ajaxRequestPost(Request $request)
    {

        $validated = request()->validate(
            [
                'selected_freq' => ['required'],
                'startdate' => ['required', 'date', 'after_or_equal:now'],
                'selected_day' => ['required'],
                'selected_times' => ['required'],
            ],
            [
                'selected_freq.required' => 'Frequency is required.',
                'startdate.required' => 'Start date is required.',
                'startdate.date' => 'Start date must be a date.',
                'startdate.after_or_equal' => 'Date must be now or in the future',
                'selected_day.required' => 'Day is required',
                'selected_times.required' => 'Times is required'
            ]
        );
        
        if ($validated) {
            $days = implode(" ",$request->selected_day);
            $times = implode(" ",$request->selected_times);

            $schedule = new Schedule;
            $schedule->frequency = $request->selected_freq;
            $schedule->start_date = $request->startdate;
            $schedule->days = $days;
            $schedule->times = $times;
            $schedule->notes = $request->notes;
            $schedule->save();
        }    

        return response()->json(['success'=>true]);
    }
}
