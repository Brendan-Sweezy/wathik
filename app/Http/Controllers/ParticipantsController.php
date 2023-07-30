<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{

    public function add(Request $request)
    {
        $request->validate([
            'project_id' => 'required|integer',
            'name' => 'required|string',
            'gender' => 'required|string',
            'department' => 'required|string',
            'national_id' => 'required|integer',
            'address' => 'required|string',
            'phone' => 'required|integer',
            'birthday' => 'required|date',
            'backto' => 'require|string'
        ]);
        
        Participant::Create([
            'project_id' => $request->project_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'department' => $request->department,
            'national_id' => $request->national_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
        ]);
        if ($request->backto == 'wizard') {
            return redirect('/projects/addParticipants/' . $request->project_id);
        } else {
            return redirect('/projects/view/' . $request->project_id);
        }
    }

    public function amend(Request $request, $id){   
        $request->validate([
            'project_id' => 'required|integer',
            'name' => 'required|string',
            'gender' => 'required|string',
            'department' => 'required|string',
            'national_id' => 'required|integer',
            'address' => 'required|string',
            'phone' => 'required|integer',
            'birthday' => 'required|date',
            'backto' => 'require|string'
        ]);
        
        $participant = Participant::find($id);

        $participant->name = $request->name;
        $participant->gender = $request->gender;
        $participant->department = $request->department;
        $participant->national_id = $request->national_id;
        $participant->address = $request->address;
        $participant->phone = $request->phone;
        $participant->birthday = $request->birthday;

        $participant->save();

        if ($request->backto == 'wizard') {
            return redirect('/projects/addParticipants/' . $request->project_id);
        } else {
            return redirect('/projects/view/' . $request->project_id);}}

    public function delete($id){
        $participant = Participant::find($id);
        $participant->delete();
        return redirect('/projects/view/' . $participant->project_id);}
}
