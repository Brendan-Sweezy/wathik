<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use App\Models\Project;
use App\Models\ProjectThreat;
use App\Models\Threat;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function home(Request $request)
    {
        return view('app.projects.home', [
            'projects' => Project::with(['threats', 'events', 'participants'])
                ->where('orgnization_id', session('orgnization_id'),)
                ->get()
        ]);
    }
    public function view(Request $request, int $id)
    {
        return view('app.projects.view', [
            'id' => $id,
            'project' => Project::with(['threats'])->find($id),
            'participants' => Participant::where('project_id', $id)->get(),
            'events' => Event::where('project_id', $id)->get()
        ]);
    }
    public function add(Request $request)
    {
        return view('app.projects.add', ['step' => 'info']);
    }
    public function addThreats(Request $request, int $id)
    {
        return view('app.projects.add', [
            'step' => 'threats',
            'id' => $id,
            'threats' => Threat::all()
        ]);
    }
    public function addParticipants(Request $request, int $id)
    {
        return view('app.projects.add', [
            'step' => 'participants',
            'id' => $id,
            'participants' => Participant::where('project_id', $id)->get()
        ]);
    }
    public function addEvents(Request $request, int $id)
    {
        return view('app.projects.add', [
            'step' => 'events',
            'id' => $id,
            'events' => Event::where('project_id', $id)->get()
        ]);
    }
    public function save(Request $request)
    {
        switch ($request->step) {
            case 'info':
                $project = Project::create([
                    'orgnization_id' => session('orgnization_id'),
                    'name' => $request->name,
                    'date' => $request->date,
                    'title' => $request->title,
                    'status' => $request->status,
                    'budget' => $request->budget,
                    'beneficiaries' => $request->beneficiaries,
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
            case 'participants':
                return redirect('/projects/addEvents/' . $request->id);
            case 'events':
                return redirect('/projects/view/' . $request->id);
        }
    }
}
