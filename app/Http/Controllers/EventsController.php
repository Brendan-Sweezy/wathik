<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function add(Request $request)
    {
        Event::Create([
            'project_id' => $request->project_id,
            'name' => $request->name,
            'date' => $request->date,
            'time' => $request->time,
            'beneficiaries' => $request->beneficiaries,
        ]);
        if ($request->backto == 'wizard') {
            return redirect('/projects/addEvents/' . $request->project_id);
        } else {
            return redirect('/projects/view/' . $request->project_id);
        }
    }
}
