<?php

namespace App\Http\Controllers;

use App\Models\Orgnization;
use App\Models\OrgnizationManager;

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
}
