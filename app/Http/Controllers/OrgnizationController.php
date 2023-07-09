<?php

namespace App\Http\Controllers;

use App\Models\Orgnization;
use App\Models\OrgnizationManager;
use App\Models\OrgnizationInfo;
use App\Models\Member;

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

    public function amendManager(Request $request)
    {
        $manager = OrgnizationManager::find(1);
        $manager->name = $request->name;
        $manager->national_id = $request->national_id;
        $manager->phone = $request->phone;
        $manager->email = $request->email;
        $manager->save();
        return redirect('orgnization/main');
    }

    public function amendInfo(Request $request)
    {
        $info = Orgnization::find(1);
        $info->name = $request->name;
        $info->national_id = $request->national_id;
        $info->ministry = $request->ministry;
        $info->founding_date = $request->founding_date;
        $info->save();
        return redirect('orgnization/main');
    }

    public function addMember(Request $request)
    {
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
            'election_date' => $request->election_date
        ]);
         return redirect('orgnization/managment');
    }

    //TODO: amendMember
    public function amendMember(Request $request, $id)
    {
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
        return redirect('orgnization/managment');
    }

    //TODO: deleteMember
    public function deleteMember($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('orgnization/managment');
    }


    public function amendPresident(Request $request)
    {
        if (OrgnizationInfo::find(1) == NULL) {
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
        return redirect('orgnization/managment');
    }
    
}
