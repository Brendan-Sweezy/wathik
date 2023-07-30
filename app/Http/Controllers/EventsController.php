<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{

    public function add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'image' => 'required|file',
            'project_id' => 'required|integer',
            'name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'beneficiaries' => 'required|integer',
            'backto' => 'required|string'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $request->validate([
            'image' => 'required|file',
            'project_id' => 'required|integer',
            'name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'beneficiaries' => 'required|integer',
            'backto' => 'required|string'
        ]);
        
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


        $validator = Validator::make($request->all(), [
            'image' => 'required|file',
            'project_id' => 'required|integer',
            'name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'beneficiaries' => 'required|integer'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    

        $request->validate([
            'image' => 'required|file',
            'project_id' => 'required|integer',
            'name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'beneficiaries' => 'required|integer'
        ]);
        
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
