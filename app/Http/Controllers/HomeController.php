<?php

namespace App\Http\Controllers;

use App\Models\Orgnization;
use App\Models\OrgnizationInfo;
use App\Models\OrgnizationAddress;
use App\Models\OrgnizationContact;
use App\Models\OrgnizationManager;
use App\Models\Project;
use App\Models\User;
use App\Models\UserOrgnization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\revenue;
use App\Models\expenses;
use App\Models\Threat;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    

    public function home(Request $request)
    {
        
        $user = User::with(['orgnization'])->find(session('user_id'));
        if (empty($user->orgnization)) {
            return redirect()->to('existingOrg');
        }
        Session::put('orgnization_id', $user->orgnization->orgnization_id);
        $orgnization = Orgnization::find(session('orgnization_id'));

        return view('app.home', [
            'user' => $user, 
            'orgnization' => $orgnization,
            'projects' => Project::where('orgnization_id', $user->orgnization->orgnization_id)->get()]);
    }
    public function wizard(Request $request)
    {
        return view('app.wizard.main');
    }

    public function authen(Request $request)
    {
        return view('app.wizard.wathID');

    }

    public function checkID(Request $request)
    {
        $request->validate([
            'code_1' => 'required|integer',
            'code_2' => 'required|integer',
            'code_3' => 'required|integer',
            'code_4' => 'required|integer',
            'code_5' => 'required|integer',
            'code_6' => 'required|integer'
        ]);
       
        $code_1 = $request->input('code_1');
        $code_2 = $request->input('code_2');
        $code_3 = $request->input('code_3');
        $code_4 = $request->input('code_4');
        $code_5 = $request->input('code_5');
        $code_6 = $request->input('code_6');
        $code = $code_1 . $code_2 . $code_3 . $code_4 . $code_5 . $code_6;

        // Check if the organization exists based on the provided wathik_id
        $checkWathid = Orgnization::where('wathik_id', $code)->first();

        if ($checkWathid) {
            // Organization exists, continue with the rest of the code
            // ...
            // Your existing code to create the relationship between the user and organization
            // ...
            return redirect('home');
        } else {
            // Organization does not exist, redirect back with an error message
            return back()->with('error', 'Organization does not exist');
        }
    }



    public function saveWizard(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "orgnization_name" => 'required|string',
            "orgnization_national_id" => 'required|integer',
            "orgnization_ministry" => 'required|string',
            "orgnization_founding_date" => 'required|date',
            "email" => 'required|email',
            "phone" => 'required|string',
            "mail" => 'required|string',
            "zipcode" => 'required|integer',
            "website" => 'required|string',
            "governorate" => 'required|string',
            "provenance" => 'required|string',
            "district" => 'required|string',
            "area" => 'required|string',
            "neighborhood" => 'required|string',
            "residential_type" => 'required|string',
            "manager_name" => 'required|string',
            "manager_national_id" => 'required|integer',
            "manager_phone" => 'required|string',
            "manager_email" => 'required|email'
        ], [
            //required
            'orgnization_name.required' => 'Organization name is required',
            'orgnization_national_id.required' => 'Organization national ID is required',
            'orgnization_ministry.required' => 'Ministry is required',
            'orgnization_founding_date.required' => 'Founding date is required',
            'email.required' => 'Organization email is required',
            'phone.required' => 'Organization phone number is required',
            'mail.required' => 'Mailbox is required',
            'zipcode.required' => 'Zipcode is required',
            'website.required' => 'Website is required',
            'governorate.required' => 'Governorate is required',
            'provenance.required' => 'Provenance is required',
            'district.required' => 'District is required',
            'area.required' => 'Area is required',
            'neighborhood.required' => 'Neighborhood is required',
            'residential_type.required' => 'Residential type is required',
            'manager_name.required' => 'Manager name is required',
            'manager_national_id.required' => 'Manager national ID is required',
            'manager_phone.required' => 'Manager phone is required',
            'manager_email.required' => 'Manager email is required',
            //valid format
            'orgnization_national_id.integer' => 'Organization national ID must be a number',
            'orgnization_founding_date.date' => 'Organization founding date must be in YYYY-MM-DD format',
            'email.email' => 'Organization email must be a valid email address',
            'zipcode.integer' => 'Organization zipcode must be a number',
            'manager_national_id.integer' => 'Manager national ID must be a number',
            'manager_email.email' => 'Manager email must be a valid email address',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return redirect()->back()->withErrors($validator)->withInput();
        }


        /*$request->validate([
            "orgnization_name" => 'required|string',
            "orgnization_national_id" => 'required|integer',
            "orgnization_ministry" => 'required|string',
            "orgnization_founding_date" => 'required|date',
            "email" => 'required|email',
            "phone" => 'required|string',
            "mobile" => 'string',
            "mail" => 'required|string',
            "zipcode" => 'required|integer',
            "website" => 'required|string',
            "governorate" => 'required|string',
            "provenance" => 'required|string',
            "district" => 'required|string',
            "area" => 'required|string',
            "neighborhood" => 'required|string',
            "residential_type" => 'required|string',
            "manager_name" => 'required|string',
            "manager_national_id" => 'required|integer',
            "manager_phone" => 'required|string',
            "manager_email" => 'required|email'
        ]);*/
        
        $randy = random_int(100000, 999999);
        $org = "orgnizations";
        $wathid = "wathik_id";
        $wathidVals = DB::table($org)->pluck($wathid);
        foreach ($wathidVals as $value) {
            // Do something with the column value
            if ($randy != $value){
                $randy = strval($randy);
                break;
            }
            else{
                $randy = strval(random_int(100000, 999999));
            }
        }

        $orgnization = Orgnization::create([
            'name' => $request->orgnization_name,
            'national_id' => $request->orgnization_national_id,
            'ministry' => $request->orgnization_ministry,
            'founding_date' => $request->orgnization_founding_date,
            'wathik_id' => $randy
        ]);
        UserOrgnization::create([
            'user_id' => session('user_id'),
            'orgnization_id' => $orgnization->id
        ]);
        OrgnizationContact::create([
            'orgnization_id' => $orgnization->id,
            'type' => 'email',
            'contact' => $request->email,
        ]);
        OrgnizationContact::create([
            'orgnization_id' => $orgnization->id,
            'type' => 'phone',
            'contact' => $request->phone,
        ]);
        if (!empty($request->mobile)) {
            OrgnizationContact::create([
                'orgnization_id' => $orgnization->id,
                'type' => 'mobile',
                'contact' => $request->mobile,
            ]);
        }
        if (!empty($request->mail)) {
            OrgnizationContact::create([
                'orgnization_id' => $orgnization->id,
                'type' => 'mail',
                'contact' => $request->mail,
            ]);
        }
        if (!empty($request->mobile)) {
            OrgnizationContact::create([
                'orgnization_id' => $orgnization->id,
                'type' => 'zipcode',
                'contact' => $request->zipcode,
            ]);
        }
        if (!empty($request->mobile)) {
            OrgnizationContact::create([
                'orgnization_id' => $orgnization->id,
                'type' => 'website',
                'contact' => $request->website,
            ]);
        }
        OrgnizationAddress::create([
            'orgnization_id' => $orgnization->id,
            'governorate' => $request->governorate,
            'provenance' => $request->provenance,
            'district' => $request->district,
            'area' => $request->area,
            'neighborhood' => $request->neighborhood,
            'residential_type' => $request->residential_type,
        ]);
        OrgnizationManager::create([
            'orgnization_id' => $orgnization->id,
            'name' => $request->manager_name,
            'national_id' => $request->manager_national_id,
            'phone' => $request->manager_phone,
            'email' => $request->manager_email,
        ]);

        OrgnizationInfo::create(['orgnization_id' => $orgnization->id, 'type' => 'president_national_id', 'info' => '']);
        OrgnizationInfo::create(['orgnization_id' => $orgnization->id, 'type' => 'president', 'info' => '']);
        OrgnizationInfo::create(['orgnization_id' => $orgnization->id, 'type' => 'mentioned_members', 'info' => '']);
        OrgnizationInfo::create(['orgnization_id' => $orgnization->id, 'type' => 'quorum', 'info' => '']);
        OrgnizationInfo::create(['orgnization_id' => $orgnization->id, 'type' => 'term', 'info' => '']);
        OrgnizationInfo::create(['orgnization_id' => $orgnization->id, 'type' => 'election_date', 'info' => '']);
        OrgnizationInfo::create(['orgnization_id' => $orgnization->id, 'type' => 'assembly_male', 'info' => '']);
        OrgnizationInfo::create(['orgnization_id' => $orgnization->id, 'type' => 'assembly_female', 'info' => '']);
        OrgnizationInfo::create(['orgnization_id' => $orgnization->id, 'type' => 'male_volunteers', 'info' => '']);
        OrgnizationInfo::create(['orgnization_id' => $orgnization->id, 'type' => 'female_volunteers', 'info' => '']);
        

        for($i = 1; $i < 5; $i++) {
            expenses::create([
                'organization_id' => $orgnization->id,
                'quarter' => $i,
                'salaries' => 0,
                'deprications' => 0,
                'office_expenses' => 0,
                'rent' => 0,
                'maintenance' => 0,
                'other' => 0
            ]);

            revenue::create([
                'organization_id' => $orgnization->id,
                'quarter' => $i,
                'local_financing' => 0,
                'foreign_financing' => 0,
                'project_revenue' => 0,
                'subscriptions' => 0,
                'bank_interest' => 0,
                'immoveable_properties' => 0,
                'other' => 0
            ]);
        }

        
        if(Threat::find(1) == NULL) {
            Threat::create([
                'id' => 1,
                'threat' => 'نقص التمویل لدى الجمعیة'
            ]);
            Threat::create([
                'id' => 2,
                'threat' => 'نقص الخبرات'
            ]);
            Threat::create([
                'id' => 3,
                'threat' => 'العمل في مناطق الاشد فقراً'
            ]);
            Threat::create([
                'id' => 4,
                'threat' => 'العمل في مناطق ذات كثافة سكانیة عالیة'
            ]);
            Threat::create([
                'id' => 5,
                'threat' => 'قلة المتطوعین'
            ]);
            Threat::create([
                'id' => 6,
                'threat' => 'العلاقة مع الوزارة المختصة'
            ]);

            OrgnizationInfo::create([
                'type' => 'auditor',
                'info' => '',
                'orgnization_id' => $orgnization->id
            ]);
            OrgnizationInfo::create([
                'type' => 'beginning_balance',
                'info' => '',
                'orgnization_id' => $orgnization->id
            ]);
        /*OrgnizationInfo::create([
            'type' => 'final_balance',
            'info' => ''
        ]);*/
    }


        return redirect()->to('home');
    }
    
}
