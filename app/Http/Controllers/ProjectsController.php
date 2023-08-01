<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Participant;
use App\Models\Project;
use App\Models\ProjectThreat;
use App\Models\Threat;
use App\Models\Orgnization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    public function home(Request $request){
        $user = User::with(['orgnization'])->find(session('user_id'));
        return view('app.projects.home', [
            'user' => $user,
            'projects' => Project::with(['threats', 'events', 'participants'])
                ->where('orgnization_id', session('orgnization_id'),)
                ->get()]);}


    public function view(Request $request, int $id){
        $user = User::with(['orgnization'])->find(session('user_id'));
        $project = Project::with(['threats'])->find($id);
        $participants = Participant::where('project_id', $id)->get();
        $num_participants = count($participants);
        $events = Event::where('project_id', $id)->get();
        $num_events = count($events);

        $beneficiary_num = 0;
        foreach($events as $event) {
            $beneficiary_num += $event->beneficiaries;}
        $project->beneficiaries = $beneficiary_num;
        $project->save();
        
        if(session('orgnization_id') != $project->orgnization_id) {
            return redirect()->back();
        }

        return view('app.projects.view', [
            'id' => $id,
            'user' => $user,
            'project' => Project::with(['threats'])->find($id),
            'participants' => Participant::where('project_id', $id)->get(),
            'events' => Event::where('project_id', $id)->get(),
            'num_participants' => $num_participants,
            'num_events' => $num_events]);}

    public function add(Request $request){
        $user = User::with(['orgnization'])->find(session('user_id'));
        return view('app.projects.add', [
            'user' => $user,
            'step' => 'info']);}

    public function amend(Request $request, $id){
        $user = User::with(['orgnization'])->find(session('user_id'));
        $project = Project::find($id);
        if(session('orgnization_id') != $project->orgnization_id) {
            return redirect()->back();
        }
        $project->name = $request->name;
        $project->date = $request->date;
        $project->title = $request->title;
        $project->status = $request->status;
        $project->budget = $request->budget;
        $project->save();
        return redirect('/projects/view/' . $request->project_id);}     
    
    public function addThreats(Request $request, int $id){
        $user = User::with(['orgnization'])->find(session('user_id'));
        return view('app.projects.add', [
            'user' => $user,
            'step' => 'threats',
            'id' => $id,
            'threats' => Threat::all()]);}


    public function addParticipants(Request $request, int $id){
        $user = User::with(['orgnization'])->find(session('user_id'));


        return view('app.projects.add', [
            'user' => $user,
            'step' => 'participants',
            'id' => $id,
            'participants' => Participant::where('project_id', $id)->get()]);}



    public function addEvents(Request $request, int $id){
        $user = User::with(['orgnization'])->find(session('user_id'));

        return view('app.projects.add', [
            'user' => $user,
            'step' => 'events',
            'id' => $id,
            'events' => Event::where('project_id', $id)->get()]);}


    public function save(Request $request){
        $request->validate([
            'step' => 'required|string'
        ]);
        
        switch ($request->step) {
            case 'info':
                
                $request->validate([
                    'name' => 'required|string',
                    'date' => 'required|date',
                    'title' => 'required|string',
                    'status' => 'required|string',
                    'budget' => 'required|decimal:0,3'
                ]);

                $project = Project::create([
                    'orgnization_id' => session('orgnization_id'),
                    'name' => $request->name,
                    'date' => $request->date,
                    'title' => $request->title,
                    'status' => $request->status,
                    'budget' => $request->budget,
                    'beneficiaries' => 0,
                ]);
                return redirect('/projects/addThreats/' . $project->id);
            case 'threats':
                if (!empty($request->threats) || (!empty($request->other) && !empty($request->otherThreat))) {
                    $threats = $request->threats;
                    if (!empty($request->other) && !empty($request->otherThreat)) {
                        $newThreat = Threat::create([
                            'threat' => $request->otherThreat
                        ]);
                        $threats[] = $newThreat->id;
                    }

                    foreach ($threats as $threat) {
                        ProjectThreat::create([
                            'project_id' => $request->id,
                            'threat_id' => $threat
                        ]);
                    }
                    return redirect('/projects/addParticipants/' . $request->id);
                } else {
                    return redirect('/projects/addThreats/' . $request->id);
                }
            }}
                

    public function deleteProject($id){
        $project = Project::find($id);
        
        $project->delete();
        return redirect('projects/');}
}

