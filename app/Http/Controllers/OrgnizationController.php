<?php

namespace App\Http\Controllers;

use App\Models\Orgnization;
use App\Models\OrgnizationManager;
use App\Models\OrgnizationInfo;
use App\Models\Member;
use App\Models\AuthorityMeeting;

use Illuminate\Http\Request;

class OrgnizationController extends Controller
{
    public function home(Request $request)
    {
        return view('app.orgnization.home', ['orgnization' => Orgnization::find(session('orgnization_id')), 'target' => 'main']);
    }

    public function view(Request $request, $target)
    {
        return view('app.orgnization.home', ['orgnization' => Orgnization::find(session('orgnization_id')), 'target' => $target]);
    }


/** ___________________________________________________________________     
 * 
 *      ALL THE STUPID ORGANIZATION EDITING THINGS ARE BELOW
 *  ___________________________________________________________________ */


//MAIN PAGE ------------------------------------------------------------------
    public function amendInfo(Request $request){
        $info = Orgnization::find(session('orgnization_id'));
        $info->name = $request->name;
        $info->national_id = $request->national_id;
        $info->ministry = $request->ministry;
        $info->founding_date = $request->founding_date;
        $info->save();
        return redirect('orgnization/main');}

    public function amendManager(Request $request){
        $manager = OrgnizationManager::find(session('orgnization_id'));
        $manager->name = $request->name;
        $manager->national_id = $request->national_id;
        $manager->phone = $request->phone;
        $manager->email = $request->email;
        $manager->save();
        return redirect('orgnization/main');}


//ADMINISTRATIVE BOARD PAGE --------------------------------------------------
    public function amendPresident(Request $request){
        if (OrgnizationInfo::find(session('orgnization_id')) == NULL) {
            $president = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'president',
                'info' => $request->name
            ]);
            $id = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'president_national_id',
                'info' => $request->national_id
            ]);
        }
        else {
            $counter = 1;
            $presHits = 0;
            $idHits = 0;
            while (OrgnizationInfo::find($counter)) {
                $info = OrgnizationInfo::find($counter);
                if ($info->type == 'president') {
                    $presHits++;
                    $info->info = $request->name;
                    $info->save();
                }
                else if($info->type == 'president_national_id') {
                    $idHits++;
                    $info->info = $request->national_id;
                    $info->save();
                }
                $counter++;
            }
            if ($presHits==0) {
                $president = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'president',
                    'info' => $request->name
                ]);
                $president->save();
            }
            if ($idHits==0) {
                $id = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'president_national_id',
                    'info' => $request->national_id
                ]);
                $id->save();
            }
        }
        return redirect('orgnization/managment');}
    public function amendAdminInfo(Request $request){
        if (OrgnizationInfo::find(session('orgnization_id')) == NULL) {
            $num_members = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'num_members',
                'info' => $request->num_members
            ]);
            $mentioned_members = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'mentioned_members',
                'info' => $request->mentioned_members
            ]);
            $male = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'male',
                'info' => $request->male
            ]);
            $female = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'female',
                'info' => $request->female
            ]);
            $quorum = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'quorum',
                'info' => $request->quorum
            ]);
            $election_date = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'election_date',
                'info' => $request->election_date
            ]);
        }
        else {
            $counter = 1;
            $numHits = 0;
            $mentionedHits = 0;
            $maleHits = 0;
            $femaleHits = 0;
            $quorumHits = 0;
            $dateHits = 0;
            while (OrgnizationInfo::find($counter)) {
                $info = OrgnizationInfo::find($counter);
                if ($info->type == 'num_members') {
                    $numHits++;
                    $info->info = $request->num_members;
                    $info->save();
                }
                else if($info->type == 'mentioned_members') {
                    $mentionedHits++;
                    $info->info = $request->mentioned_members;
                    $info->save();
                }
                else if($info->type == 'male') {
                    $maleHits++;
                    $info->info = $request->male;
                    $info->save();
                }
                else if($info->type == 'female') {
                    $femaleHits++;
                    $info->info = $request->female;
                    $info->save();
                }
                else if($info->type == 'quorum') {
                    $quorumHits++;
                    $info->info = $request->quorum;
                    $info->save();
                }
                else if($info->type == 'election_date') {
                    $dateHits++;
                    $info->info = $request->election_date;
                    $info->save();
                }
                $counter++;
            }
            if ($numHits==0) {
                $num_members = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'num_members',
                    'info' => $request->num_members
                ]);
                $num_members->save();
            }
            if ($mentionedHits==0) {
                $mentioned_members = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'mentioned_members',
                    'info' => $request->mentioned_members
                ]);
                $mentioned_members->save();
            }
            if ($maleHits==0) {
                $male = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'male',
                    'info' => $request->male
                ]);
                $male->save();
            }
            if ($femaleHits==0) {
                $female = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'female',
                    'info' => $request->female
                ]);
                $female->save();
            }
            if ($quorumHits==0) {
                $quorum = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'quorum',
                    'info' => $request->quorum
                ]);
                $quorum->save();
            }
            if ($dateHits==0) {
                $election_date = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'election_date',
                    'info' => $request->election_date
                ]);
                $election_date->save();
            }
        }
        return redirect('orgnization/managment');}

    //board members
    public function addMember(Request $request){
        Member::Create([
            'orgnization_id' => session('orgnization_id'),
            'name' => $request->name,
            'national_id' => $request->national_id,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'work' => $request->work,
            'degree' => $request->degree,
            'major' => $request->major,
            'phone' => $request->phone,
            'election_date' => $request->election_date,
        ]);
         return redirect('orgnization/managment');}
    public function amendMember(Request $request, $id){
        $member = Member::find($id);
        $member->name = $request->name;
        $member->national_id = $request->national_id;
        $member->gender = $request->gender;
        $member->birthday = $request->birthday;
        $member->work = $request->work;
        $member->degree = $request->degree;
        $member->major = $request->major;
        $member->phone = $request->phone;
        $member->election_date = $request->election_date;
        $member->save();
        return redirect('orgnization/managment');}
    public function deleteMember($id){
        $member = Member::find($id);
        $member->delete();
        return redirect('orgnization/managment');}
    


//GENERAL AUTHORITY PAGE -----------------------------------------------------
    public function amendAssemblyInfo(Request $request){
        if (OrgnizationInfo::find(session('orgnization_id')) == NULL) {
            $assembly_members = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'assembly_members',
                'info' => $request->assembly_members
            ]);
            $assembly_male = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'assembly_male',
                'info' => $request->assembly_male
            ]);
            $assembly_female = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'assembly_female',
                'info' => $request->assembly_female
            ]);
        }
        else {
            $counter = 1;
            $memberHits = 0;
            $maleHits = 0;
            $femaleHits = 0;
            while (OrgnizationInfo::find($counter)) {
                $info = OrgnizationInfo::find($counter);
                if ($info->type == 'assembly_members') {
                    $memberHits++;
                    $info->info = $request->assembly_members;
                    $info->save();
                }
                else if($info->type == 'assembly_male') {
                    $maleHits++;
                    $info->info = $request->assembly_male;
                    $info->save();
                }
                else if($info->type == 'assembly_female') {
                    $femaleHits++;
                    $info->info = $request->assembly_female;
                    $info->save();
                }
                $counter++;
            }
            if ($memberHits==0) {
                $assembly_members = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'assembly_members',
                    'info' => $request->assembly_members
                ]);
                $assembly_members->save();
            }
            if ($maleHits==0) {
                $assembly_male = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'assembly_male',
                    'info' => $request->assembly_male
                ]);
                $assembly_male->save();
            }
            if ($femaleHits==0) {
                $assembly_female = OrgnizationInfo::create([
                    'orgnization_id' => session('orgnization_id'),
                    'type' => 'assembly_female',
                    'info' => $request->assembly_female
                ]);
                $assembly_female->save();
            }
        }
        return redirect('orgnization/authority');}
    //general assembly meetings
    public function addMeeting(Request $request){
        $meeting = AuthorityMeeting::Create([
            'orgnization_id' => session('orgnization_id'),
            'date' => $request->date,
            'type' => $request->type,
            'attendees' => $request->attendees,
            'alternate' => $request->alternate_number,
            'decisions' => $request->decisions,
        ]);
            return redirect('orgnization/authority');}

    public function amendMeeting(Request $request, $id){                        //TODO: this doesnt work 
        $meeting = AuthorityMeeting::find($id);
        $meeting->date = $request->date;
        $meeting->type = $request->type;
        $meeting->attendees = $request->attendees;
        $meeting->alternate = $request->alternate_number;
        $meeting->decisions = $request->decisions;
        $meeting->save();
        return redirect('orgnization/authority');}
    public function deleteMeeting($id){
        $meeting = AuthorityMeeting::find($id);
        $meeting->delete();
        return redirect('orgnization/authority');}




//TODO: EMPLOYEES PAGE
    //amend salaried employees
    //amend volunteers
//TODO: DONORS PAGE
    //add
    //edit
    //delete



}
