<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Project;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function add(Request $request)
    {
<<<<<<< HEAD
       
=======
>>>>>>> 7a493579f4f83900dae3710fe43a37772f883774
        $request->file('image')->store('public');
        
        Event::Create([
            'project_id' => $request->project_id,
            'name' => $request->name,
            'date' => $request->date,
            'time' => $request->time,
            'beneficiaries' => $request->beneficiaries,
            'photo' => $request->file('image')->hashName()
        ]);

        $project = Project::find($request->project_id);
        $events = Event::where('project_id', $request->project_id)->get();
        $beneficiary_num = 0;
        foreach($events as $event) {
            $beneficiary_num += $event->beneficiaries;}
        $project->beneficiaries = $beneficiary_num;
        $project->save();

        if ($request->backto == 'wizard') {
            return redirect('/projects/addEvents/' . $request->project_id);
        } else {
            return redirect('/projects/view/' . $request->project_id);
        }
    }


    public function amend(Request $request, $id){   

        $request->file('image')->store('public');
        
        $event = Event::find($id);
        $event->name = $request->name;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->beneficiaries = $request->beneficiaries;
        $event->photo = $request->file('image')->hashName();
        $event->save();

        $project = Project::find($request->project_id);
        $events = Event::where('project_id', $request->project_id)->get();
        $beneficiary_num = 0;
        foreach($events as $event) {
            $beneficiary_num += $event->beneficiaries;}
        $project->beneficiaries = $beneficiary_num;
        $project->save();
        return redirect('/projects/view/' . $request->project_id);}

    public function delete($id){
        $event = Event::find($id);
        $event->delete();
        return redirect('/projects/view/' . $event->project_id);}
}
