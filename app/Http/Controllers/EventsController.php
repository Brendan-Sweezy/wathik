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
        $project = Project::find($request->project_id);
        if(session('orgnization_id') != $project->orgnization_id) {
            return redirect()->back();
        }


        $validator = Validator::make($request->all(), [
            'image' => 'required|file',
            'project_id' => 'required|integer',
            'name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'beneficiaries' => 'required|integer',
            'backto' => 'required|string'

        ],[
            //required
            //'image.required' => 'required|file',
            'project_id.required' => 'Project ID is required',
            'name.required' => 'Project name is required',
            'date.required' => 'Project start date is required',
            'time.required' => 'Project length is required',
            'beneficiaries.required' => '# of Beneficiaries is required',
            //valid format
            'project_id.integer' => 'Project ID is must be a number',
            'time.integer' => 'Project length must be a number',
            'beneficiaries.integer' => '# of Beneficiaries must be a number',
        ]);
    
        if ($validator->fails()) {
            $request->session()->flash('trigger_edit_button', true);
            return redirect()->back()->withErrors($validator)->withInput();
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

        $project = Project::find($request->project_id);
        if(session('orgnization_id') != $project->orgnization_id) {
            return redirect()->back();
        }


        $validator = Validator::make($request->all(), [
            'image' => 'required|file',
            'project_id' => 'required|integer',
            'name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'beneficiaries' => 'required|integer'
        ]);
    
        if ($validator->fails()) {
            $request->session()->flash('trigger_edit_button', true);
            return redirect()->back()->withErrors($validator)->withInput();
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

        $project = Project::find($request->project_id);
        if(session('orgnization_id') != $project->orgnization_id) {
            return redirect()->back();
        }
        $event = Event::find($id);
        $event->delete();
        return redirect('/projects/view/' . $event->project_id);}
}
