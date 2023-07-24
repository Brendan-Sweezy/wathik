<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function add(Request $request)
    {

        //$filename = time() . '.' . $request->file('photo')->extension();
        //$path = $request->file('photo')->storeAs('images', $filename, 'public');
        
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


    public function amend(Request $request, $id){   
        $event = Event::find($id);

        $event->name = $request->name;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->beneficiaries = $request->beneficiaries;

        $event->save();
        return redirect('/projects/view/' . $request->project_id);}

    public function delete($id){
        $event = Event::find($id);
        $event->delete();
        return redirect('/projects/view/' . $event->project_id);}
}
