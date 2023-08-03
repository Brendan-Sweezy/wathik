<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orgnization;
use App\Models\OrgnizationManager;
use App\Models\OrgnizationInfo;
use App\Models\OrgnizationContact;
use App\Models\OrgnizationAddress;
use App\Models\Member;
use App\Models\AuthorityMeeting;
use App\Models\FinancingEntity;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Event;
use App\Models\Branch;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class OrgnizationController extends Controller
{
    public function home(Request $request)
    {
        $user = User::with(['orgnization'])->find(session('user_id'));
        $orgnization = Orgnization::find(session('orgnization_id'));

        //contacts
        $orgEmail = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'email')->first();
        $orgPhone = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'phone')->first();
        $orgMobile = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'mobile')->first();
        $orgMail = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'mail')->first();
        $orgZipcode = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'zipcode')->first();
        $orgWebsite = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'website')->first();

        $address = OrgnizationAddress::where('orgnization_id', session('orgnization_id'))->first();
        $projects = Project::where('orgnization_id', session('orgnization_id'))->where('status', '!=', 'Upcoming')->get();
        $branch = Branch::find(0);
        $id = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president_national_id')->first();
        $num_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'num_members')->first();
        $mentioned_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'mentioned_members')->first();
        $quorum = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'quorum')->first();
        $term = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'term')->first();
        $election_date = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'election_date')->first();
        $assembly_male = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_male')->first();
        $assembly_female = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_female')->first();
        $male_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'male_volunteers')->first();
        $female_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'female_volunteers')->first();
        
        $male_mems = count(Member::where('gender','male')->get());
        $female_mems = count(Member::where('gender','female')->get());
        $male_employees = count(Employee::where('orgnization_id', session('orgnization_id'))->where('gender','male')->get());
        $female_employees = count(Employee::where('orgnization_id', session('orgnization_id'))->where('gender','female')->get());
        
        $project_num = count($projects);
        $event_num = 0;                     
        $beneficiary_num = 0;               
        foreach($projects as $project) {
            $events = Event::where('project_id', $project->id)->get();
            $event_num += count($events);
            foreach($events as $event) {
                $beneficiary_num += $event->beneficiaries;
            }
        }
        
        return view('app.orgnization.home', [
            'user' => $user,
            'orgnization' => Orgnization::find(session('orgnization_id')), 
            'target' => 'main',
            'project_num' => $project_num,
            'event_num' => $event_num,
            'beneficiary_num' => $beneficiary_num,
            'branch' => $branch,
            'orgEmail' => $orgEmail,
            'orgPhone' => $orgPhone,
            'orgMobile' => $orgMobile,
            'orgMail' => $orgMail,
            'orgZipcode' => $orgZipcode,
            'orgWebsite' => $orgWebsite, 
            'address' => $address,   
        ]);
    }

    public function view(Request $request, $target)
    {
        $user = User::with(['orgnization'])->find(session('user_id'));
        $orgnization = Orgnization::find(session('orgnization_id'));

        //contacts
        
        $orgEmail = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'email')->first();
        $orgPhone = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'phone')->first();
        $orgMobile = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'mobile')->first();
        $orgMail = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'mail')->first();
        $orgZipcode = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'zipcode')->first();
        $orgWebsite = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'website')->first();

        $address = OrgnizationAddress::where('orgnization_id', session('orgnization_id'))->first();
        $projects = Project::where('orgnization_id', session('orgnization_id'))->where('status', '!=', 'Upcoming')->get();
        $branch = Branch::find(0);
        $president = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president')->first();
        $id = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president_national_id')->first();
        $num_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'num_members')->first();
        $mentioned_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'mentioned_members')->first();
        $male = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'male')->first();
        $female = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'female')->first();
        $quorum = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'quorum')->first();
        $term = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'term')->first();
        $election_date = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'election_date')->first();
        $assembly_male = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_male')->first();
        $assembly_female = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_female')->first();
        $male_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'male_volunteers')->first();
        $female_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'female_volunteers')->first();
        $member = Member::find(0);
        
        $male_mems = count(Member::where('gender','male')->get());
        $female_mems = count(Member::where('gender','female')->get());
        $male_employees = count(Employee::where('orgnization_id', session('orgnization_id'))->where('gender','male')->get());
        $female_employees = count(Employee::where('orgnization_id', session('orgnization_id'))->where('gender','female')->get());
        
        $project_num = count($projects);
        $event_num = 0;                        
        $beneficiary_num = 0;                  
        foreach($projects as $project) {
            $events = Event::where('project_id', $project->id)->get();
            $event_num += count($events);
            foreach($events as $event) {
                $beneficiary_num += $event->beneficiaries;
            }
        }

        return view('app.orgnization.home', [
            'user' => $user,
            'orgnization' => $orgnization, 
            'target' => $target,
            'president' => $president,
            'president_national_id' => $id,
            'num_members' => $num_members,
            'mentioned_members' => $mentioned_members,
            'male_mems' => $male_mems,
            'female_mems' => $female_mems,
            'quorum' => $quorum,
            'term' => $term,
            'election_date' => $election_date,
            'assembly_male' => $assembly_male,
            'assembly_female' => $assembly_female,
            'male_employees' => $male_employees,
            'female_employees' => $female_employees,
            'male_volunteers' => $male_volunteers,
            'female_volunteers' => $female_volunteers,
            'project_num' => $project_num,
            'event_num' => $event_num,
            'beneficiary_num' => $beneficiary_num,
            'member' => $member,
            'branch' => $branch,
            'orgEmail' => $orgEmail,
            'orgPhone' => $orgPhone,
            'orgMobile' => $orgMobile,
            'orgMail' => $orgMail,
            'orgZipcode' => $orgZipcode,
            'orgWebsite' => $orgWebsite,  
            'address' => $address,
        ]);
    }


/** ___________________________________________________________________     
 * 
 *      ALL THE ORGANIZATION EDITING THINGS ARE BELOW
 *  ___________________________________________________________________ */


//MAIN PAGE ------------------------------------------------------------------
    public function amendInfo(Request $request){
        $user = User::with(['orgnization'])->find(session('user_id'));
        $info = Orgnization::find(session('orgnization_id'));

        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "national_id" => "required|integer",
            "ministry" => "required|string",
            "founding_date" => "required|date"
        ], [
            //required
            'name.required' => 'Organization name is required',
            'national_id.required' => 'Organization national ID is required',
            'ministry.required' => 'Ministry is required',
            'founding_date.required' => 'Founding date is required',
        ]);
        
        if ($validator->fails()) {
            $request->session()->flash('edit_information', true);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $info->name = $request->name;
        $info->national_id = $request->national_id;
        $info->ministry = $request->ministry;
        $info->founding_date = $request->founding_date;

        $info->save();
        return redirect('orgnization/main');}


    public function amendManager(Request $request){
        $manager = OrgnizationManager::find(session('orgnization_id'));

        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "national_id" => "required|integer",
            "phone" => "required|string",
            "email" => "required|email"
        ], [
            //required
            'name.required' => 'Organization name is required',
            'national_id.required' => 'Organization national ID is required',
            'phone.required' => 'Phone is required',
            'email.required' => 'Email is required',
            //valid format
            'email.email' => 'Email must be a valid email address',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('edit_management', true);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $manager->name = $request->name;
        $manager->national_id = $request->national_id;
        $manager->phone = $request->phone;
        $manager->email = $request->email;

        $manager->save();
        return redirect('orgnization/main');}

    public function amendContact(Request $request){
        $user = User::with(['orgnization'])->find(session('user_id'));

        //contacts
        $orgEmail = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'email')->first();
        $orgPhone = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'phone')->first();
        $orgMobile = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'mobile')->first();
        $orgMail = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'mail')->first();
        $orgZipcode = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'zipcode')->first();
        $orgWebsite = OrgnizationContact::where('orgnization_id', session('orgnization_id'))->where('type', 'website')->first();

        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "phone" => "required|string",
        ], [
            //required
            'email.required' => 'Organization email is required',
            'phone.required' => 'Organization phone number is required',

            //valid format
            'email.email' => 'Email must be a valid email address',
        ]);
        
        if ($validator->fails()) {
            $request->session()->flash('edit_contact', true);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $orgEmail->contact = $request->email;
        $orgPhone->contact = $request->phone;
        $orgMobile->contact = $request->mobile;
        $orgMail->contact = $request->mail;
        $orgZipcode->contact = $request->zipcode;
        $orgWebsite->contact = $request->website;

        $orgEmail->save();
        $orgPhone->save();
        $orgMobile->save();
        $orgMail->save();
        $orgZipcode->save();
        $orgWebsite->save();

        return redirect('orgnization/main');}

    public function amendAddress(Request $request){
        $user = User::with(['orgnization'])->find(session('user_id'));
        $address = OrgnizationAddress::where('orgnization_id', session('orgnization_id'))->first();

        $validator = Validator::make($request->all(), [
            "governorate" => "required|string",
            "provenance" => "string",
            "district" => "string",
            "area" => "string",
            "neighborhood" => "required|string",
            "residential_type" => "required|string",
        ], [
            //required
            'governorate.required' => 'governorate is required',
            'neighborhood.required' => 'neighborhood is required',
            'residential_type.required' => 'residential type is required',
        ]);
        
        if ($validator->fails()) {
            $request->session()->flash('edit_address', true);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $address->governorate = $request->governorate;
        $address->provenance = $request->provenance;
        $address->district = $request->district;
        $address->area = $request->area;
        $address->neighborhood = $request->neighborhood;
        $address->residential_type = $request->residential_type;

        $address->save();
        

        return redirect('orgnization/main');}


    //list of branches
        public function addBranch(Request $request){
            $request->validate([
                "date" => 'required|date',
                "name" => 'required|string',
                "governorate" => 'required|string',
                "major_general" => 'required|string',
                "eleminate" => 'required|string',
                "population" => 'required|integer'
            ]);

            Branch::Create([
                'orgnization_id' => session('orgnization_id'),
                'date' => $request->date,
                'name' => $request->name,
                'governorate' => $request->governorate,
                'major_general' => $request->major_general,
                'eleminate' => $request->eleminate,
                'population' => $request->population,
            ]);

            return redirect('orgnization/main');}


        public function amendBranch(Request $request, $id){   
            
            $branch = Branch::find($id);

            $validator = Validator::make($request->all(), [
                "date" => 'required|date',
                "name" => 'required|string',
                "governorate" => 'required|string',
                "major_general" => 'required|string',
                "eleminate" => 'required|string',
                "population" => 'required|integer'
            ], [
                //required
                'date.required' => 'Date is required',
                'name.required' => 'Name is required',
                'governorate.required' => 'Governorate is required',
                'major_general.required' => 'Major general is required',
                'eleminate.required' => 'Eleminate is required',
                'population.required' => 'Population is required',
                
            ]);
            if ($validator->fails()) {
                $request->session()->flash('edit_branches', true);
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $branch->date = $request->date;
            $branch->name = $request->name;
            $branch->governorate = $request->governorate;
            $branch->major_general = $request->major_general;
            $branch->eleminate = $request->eleminate;
            $branch->population = $request->population;

            $branch->save();
            return redirect('orgnization/main');}
            

        public function deleteBranch($id){
            $branch = Branch::find($id);

            $branch->delete();
            return redirect('orgnization/main');}


//ADMINISTRATIVE BOARD PAGE --------------------------------------------------
    public function amendPresident(Request $request){
        $orgnization = Orgnization::find(session('orgnization_id'));
        $president = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president')->first();
        $president_national_id = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'president_national_id')->first();
        
        
        $request->validate([
            "name" => 'required|string',
            "national_id" => 'required|integer'
        ]);

        
        
        $president->info = $request->name;
        $president_national_id->info = $request->national_id;

        $president->save();
        $president_national_id->save();
        return redirect('orgnization/managment');}


    public function amendAdminInfo(Request $request){
        $orgnization = Orgnization::find(session('orgnization_id'));
        $num_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'num_members')->first();
        $mentioned_members = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'mentioned_members')->first();
        $quorum = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'quorum')->first();
        $term = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'term')->first();
        $election_date = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'election_date')->first();
        $male_mems = count(Member::where('gender','male')->get());
        $female_mems = count(Member::where('gender','female')->get());


        $validator = Validator::make($request->all(), [
            "mentioned_members" => 'required|integer',
            "quorum" => 'required|integer',
            "term" => 'required|integer',
            "election_date" => 'required|date'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('trigger_edit_button', true);
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $mentioned_members->info = $request->mentioned_members;
        $quorum->info = $request->quorum;
        $term->info = $request->term;
        $election_date->info = $request->election_date;

        $mentioned_members->save();
        $quorum->save();
        $term->save();
        $election_date->save();
        return redirect('orgnization/managment');}


    //list of board members
        public function addMember(Request $request){
            $request->validate([
                "name" => 'required|string',
                "national_id" => 'required|integer',
                "gender" => 'required|string',
                "birthday" => 'required|date',
                "work" => 'required|string',
                "degree" => 'required|string',
                "major" => 'required|string',
                "phone" => 'required|string',
                "election_date" => 'required|date'
            ]);
            
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

            $request->validate([
                "name" => 'required|string',
                "national_id" => 'required|integer',
                "gender" => 'required|string',
                "birthday" => 'required|date',
                "work" => 'required|string',
                "degree" => 'required|string',
                "major" => 'required|string',
                "phone" => 'required|string',
                "election_date" => 'required|date'
            ]);
            

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
        $request->validate([
            "assembly_male" => 'required|integer',
            "assembly_female" => 'required|integer'
        ]);
        
        $orgnization = Orgnization::find(session('orgnization_id'));
        $assembly_male = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_male')->first();
        $assembly_female = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'assembly_female')->first();
        
        $assembly_male->info = $request->assembly_male;
        $assembly_female->info = $request->assembly_female;
        
        $assembly_male->save();
        $assembly_female->save();
        return redirect('orgnization/authority');}


    //list of general assembly meetings
        public function addMeeting(Request $request){
            
            $request->validate([
                "num" => "required|integer",
                "date" => "required|date",
                "type" => "required|string",
                "attendees" => "required|integer",
                "alternate_number" => "required|integer",
                "decisions" => "required|string"
            ]);
            
            $meeting = AuthorityMeeting::Create([
                'orgnization_id' => session('orgnization_id'),
                'meeting_num' => $request->num,
                'date' => $request->date,
                'type' => $request->type,
                'attendees' => $request->attendees,
                'alternate' => $request->alternate_number,
                'decisions' => $request->decisions, ]);

            return redirect('orgnization/authority');}

                
        public function amendMeeting(Request $request, $id){   

            
            $request->validate([
                "num" => "required|integer",
                "date" => "required|date",
                "type" => "required|string",
                "attendees" => "required|integer",
                "alternate_number" => "required|integer",
                "decisions" => "required|string"
            ]);
            
            $meeting = AuthorityMeeting::find($id);

            $meeting->meeting_num = $request->num;
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

    public function amendVolunteers(Request $request){
        $request->validate([
            "male" => 'required|integer',
            "female" => "required|integer"
        ]);
        
        $orgnization = Orgnization::find(session('orgnization_id'));
        $male_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'male_volunteers')->first();
        $female_volunteers = OrgnizationInfo::where('orgnization_id', $orgnization->id)->where('type', 'female_volunteers')->first();
        
        $male_volunteers->info = $request->male;
        $female_volunteers->info = $request->female;
        
        $male_volunteers->save();
        $female_volunteers->save();
        return redirect('orgnization/employees');}
    

    //list of salaried employees
        public function addEmployee(Request $request){
            $request->validate([
                "name" => "required|string",
                "qualification" => "required|string",
                "title" => "required|string",
                "gender" => "required|string"
            ]);
            
            Employee::Create([
                'orgnization_id' => session('orgnization_id'),
                'name' => $request->name,
                'qualification' => $request->qualification,
                'title' => $request->title,
                'gender' => $request->gender
            ]);
                return redirect('orgnization/employees');}


        public function amendEmployee(Request $request, $id){  
            $request->validate([
                "name" => "required|string",
                "qualification" => "required|string",
                "title" => "required|string",
                "gender" => "required|string"
            ]);
            
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

        $request->validate([
            "name" => 'required|string',
            "nationality" => 'required|string',
            "type" => 'required|string',
            "financing_characteristic" => 'required|string',
            "date" => 'required|date',
            "amount" => 'required|integer',
        ]);
        
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
        $request->validate([
            "name" => 'required|string',
            "nationality" => 'required|string',
            "type" => 'required|string',
            "financing_characteristic" => 'required|string',
            "date" => 'required|date',
            "amount" => 'required|integer',
        ]);
        
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
