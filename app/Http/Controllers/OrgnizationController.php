<?php

namespace App\Http\Controllers;

use App\Models\Orgnization;
use App\Models\OrgnizationManager;
use App\Models\OrgnizationInfo;
use App\Models\Member;
use App\Models\AuthorityMeeting;
use App\Models\FinancingEntity;
use App\Models\Employee;

use Illuminate\Http\Request;

class OrgnizationController extends Controller
{
    public function home(Request $request)
    {
        $orgnization = Orgnization::find(session('orgnization_id'));
        $president = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president')->first();
        $id = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president_national_id')->first();
        
        return view('app.orgnization.home', [
            'orgnization' => $orgnization, 
            'target' => 'main',
            'president' => $president,
            'president_national_id' => $id
        ]);
    }

    public function view(Request $request, $target)
    {
        $orgnization = Orgnization::find(session('orgnization_id'));
        $president = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president')->first();
        $id = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president_national_id')->first();
        $num_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'num_members')->first();
        $mentioned_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'mentioned_members')->first();
        $male = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'male')->first();
        $female = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'female')->first();
        $quorum = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'quorum')->first();
        $term = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'term')->first();
        $election_date = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'election_date')->first();
        $assembly_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_members')->first();
        $assembly_male = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_male')->first();
        $assembly_female = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_female')->first();
        $male_employees = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'male_employees')->first();
        $female_employees = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'female_employees')->first();
        $total_employees = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'total_employees')->first();
        $male_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'male_volunteers')->first();
        $female_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'female_volunteers')->first();
        $total_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'total_volunteers')->first();
        
        return view('app.orgnization.home', [
            'orgnization' => $orgnization, 
            'target' => $target,
            'president' => $president,
            'president_national_id' => $id,
            'num_members' => $num_members,
            'mentioned_members' => $mentioned_members,
            'male' => $male,
            'female' => $female,
            'quorum' => $quorum,
            'term' => $term,
            'election_date' => $election_date,
            'assembly_members' => $assembly_members,
            'male_employees' => $male_employees,
            'female_employees' => $female_employees,
            'total_employees' => $total_employees,
            'male_volunteers' => $male_volunteers,
            'female_volunteers' => $female_volunteers,
            'total_volunteers' => $total_volunteers,
        ]);
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
        $orgnization = Orgnization::find(session('orgnization_id'));
        $president = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president')->first();
        $id = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president_national_id')->first();
        if($president == NULL){
            $president = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'president',
                'info' => $request->name]);}
        else $president->info = $request->name;
        if($id == NULL){
            $id = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'president_national_id',
                'info' => $request->national_id]);}
        else $id->info = $request->national_id;
        $president->save();
        $id->save();
        return redirect('orgnization/managment');}

    public function amendAdminInfo(Request $request){
        $orgnization = Orgnization::find(session('orgnization_id'));
        $num_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'num_members')->first();
        $mentioned_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'mentioned_members')->first();
        $male = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'male')->first();
        $female = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'female')->first();
        $quorum = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'quorum')->first();
        $term = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'term')->first();
        $election_date = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'election_date')->first();
        if($num_members == NULL){
            $num_members = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'num_members',
                'info' => $request->num_members]);}
        else $num_members->info = $request->num_members;
        if($mentioned_members == NULL){
            $mentioned_members = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'mentioned_members',
                'info' => $request->mentioned_members]);}
        else $mentioned_members->info = $request->mentioned_members;
        if($male == NULL){
            $male = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'male',
                'info' => $request->male]);}
        else $male->info = $request->male;
        if($female == NULL){
            $female = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'female',
                'info' => $request->female]);}
        else $female->info = $request->female;
        if($quorum == NULL){
            $quorum = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'quorum',
                'info' => $request->quorum]);}
        else $quorum->info = $request->quorum;
        if($term == NULL){
            $term = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'term',
                'info' => $request->term]);}
        else $term->info = $request->term;
        if($election_date == NULL){
            $election_date = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'election_date',
                'info' => $request->election_date]);}
        else $election_date->info = $request->election_date;
        $num_members->save();
        $mentioned_members->save();
        $male->save();
        $female->save();
        $quorum->save();
        $term->save();
        $election_date->save();
        return redirect('orgnization/managment');}

    //list of board members
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
        $orgnization = Orgnization::find(session('orgnization_id'));
        $assembly_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_members')->first();
        $assembly_male = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_male')->first();
        $assembly_female = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_female')->first();
        
        if($assembly_members == NULL){
            $assembly_members = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'assembly_members',
                'info' => $request->assembly_members]);}
        else $assembly_members->info = $request->assembly_members;
        if($assembly_male == NULL){
            $assembly_male = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'assembly_male',
                'info' => $request->assembly_male]);}
        else $assembly_male->info = $request->assembly_male;
        if($assembly_female == NULL){
            $assembly_female = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'assembly_female',
                'info' => $request->assembly_female]);}
        else $assembly_female->info = $request->assembly_female;
        
        $assembly_members->save();
        $assembly_male->save();
        $assembly_female->save();
        return redirect('orgnization/authority');}


    //list of general assembly meetings
        public function addMeeting(Request $request){
            $meeting = AuthorityMeeting::Create([
                'orgnization_id' => session('orgnization_id'),
                'date' => $request->date,
                'type' => $request->type,
                'attendees' => $request->attendees,
                'alternate' => $request->alternate_number,
                'decisions' => $request->decisions, ]);

                return redirect('orgnization/authority');}

                
        public function amendMeeting(Request $request, $id){   
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


//EMPLOYEES PAGE -------------------------------------------------------------
    public function amendEmployees(Request $request){
        $orgnization = Orgnization::find(session('orgnization_id'));
        $male_employees = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'male_employees')->first();
        $female_employees = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'female_employees')->first();
        $total_employees = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'total_employees')->first();
        
        if($male_employees == NULL){
            $male_employees = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'male_employees',
                'info' => $request->male_employees]);}
        else $male_employees->info = $request->male_employees;
        if($female_employees == NULL){
            $female_employees = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'female_employees',
                'info' => $request->female_employees]);}
        else $female_employees->info = $request->female_employees;
        if($total_employees == NULL){
            $total_employees = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'total_employees',
                'info' => $request->total_employees]);}
        else $total_employees->info = $request->total_employees;
        
        $male_employees->save();
        $female_employees->save();
        $total_employees->save();
        return redirect('orgnization/employees');}


    public function amendVolunteers(Request $request){
        $orgnization = Orgnization::find(session('orgnization_id'));
        $male_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'male_volunteers')->first();
        $female_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'female_volunteers')->first();
        $total_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'total_volunteers')->first();
        
        if($male_volunteers == NULL){
            $male_volunteers = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'male_volunteers',
                'info' => $request->male_volunteers]);}
        else $male_volunteers->info = $request->male_volunteers;
        if($female_volunteers == NULL){
            $female_volunteers = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'female_volunteers',
                'info' => $request->female_volunteers]);}
        else $female_volunteers->info = $request->female_volunteers;
        if($total_volunteers == NULL){
            $total_volunteers = OrgnizationInfo::create([
                'orgnization_id' => session('orgnization_id'),
                'type' => 'total_volunteers',
                'info' => $request->total_volunteers]);}
        else $total_volunteers->info = $request->total_volunteers;
        
        $male_volunteers->save();
        $female_volunteers->save();
        $total_volunteers->save();
        return redirect('orgnization/employees');}
    

    //list of salaried employees
        public function addEmployee(Request $request){
            Employee::Create([
                'orgnization_id' => session('orgnization_id'),
                'name' => $request->name,
                'qualification' => $request->qualification,
                'title' => $request->title,
                'gender' => $request->gender
            ]);
                return redirect('orgnization/employees');}

        public function amendEmployee(Request $request, $id){  
            $employee = Employee::find($id);
            $employee->name = $request->name;
            $employee->qualification = $request->qualification;
            $employee->title = $request->title;
            $employee->gender = $request->gender;
            $employee->save();
            return redirect('orgnization/employees');}
            
        public function deleteEmployee($id){
            $employee = Employee::find($id);
            $employee->delete();
            return redirect('orgnization/employees');} 
    
    
//DONORS PAGE ----------------------------------------------------------------
    public function addDonor(Request $request){
        FinancingEntity::Create([
            'orgnization_id' => session('orgnization_id'),
            'name' => $request->name,
            'nationality' => $request->nationality,
            'type' => $request->type,
            'financing_characteristic' => $request->financing_characteristic,
            'date' => $request->date,
            'amount' => $request->amount,
        ]);
        return redirect('orgnization/funding');}

    public function amendDonor(Request $request, $id){         
        $donor = FinancingEntity::find($id);
        $donor->name = $request->name;
        $donor->nationality = $request->nationality;
        $donor->type = $request->type;
        $donor->financing_characteristic = $request->financing_characteristic;
        $donor->date = $request->date;
        $donor->amount = $request->amount;
        $donor->save();
        return redirect('orgnization/funding');}
        
    public function deleteDonor($id){
        $donor = FinancingEntity::find($id);
        $donor->delete();
        return redirect('orgnization/funding');}
}
