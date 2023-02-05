<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{

    public function add(Request $request)
    {
        Participant::Create([
            'project_id' => $request->project_id,
            'name' => $request->name,
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
}
