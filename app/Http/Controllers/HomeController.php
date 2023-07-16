<?php

namespace App\Http\Controllers;

use App\Models\Orgnization;
use App\Models\OrgnizationAddress;
use App\Models\OrgnizationContact;
use App\Models\OrgnizationManager;
use App\Models\Project;
use App\Models\User;
use App\Models\UserOrgnization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    

    public function home(Request $request)
    {
        $user = User::with(['orgnization'])->find(session('user_id'));
        if (empty($user->orgnization)) {
            return redirect()->to('existingOrg');
        }
        Session::put('orgnization_id', $user->orgnization->orgnization_id);
        return view('app.home', ['user' => $user, 'projects' => Project::where('orgnization_id', $user->orgnization->orgnization_id)->get()]);
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
        dd($request);
    }

    public function saveWizard(Request $request)
    {
        $randy = random_int(100000, 999999);
        $org = "orgnizations";
        $wathid = "wathik_id";
        $wathidVals = DB::table($org)->pluck($wathid);
        foreach ($wathidVals as $value) {
            // Do something with the column value
            if ($randy != $value){
                $randy = $randy;
                break;
            }
            else{
                $randy = random_int(100000, 999999);
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
            'orgnization_id' => $orgnization->id,
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
        return redirect()->to('home');
    }
}
