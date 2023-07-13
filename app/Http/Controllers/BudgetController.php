<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orgnization;
use App\Models\OrgnizationInfo;

class BudgetController extends Controller
{
    public function home(Request $request)
    {
        $organization = Orgnization::find(session('orgnization_id'));
        $beginning_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'beginning_balance')->value('info');
        $final_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'final_balance')->value('info');
        $auditor = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'auditor')->value('info');

        return view('app.budget.home', [
            'orgnization' => $organization, 
            'target' => 'main', 
            'beginning_balance' => $beginning_balance,
            'final_balance' => $final_balance,
            'auditor' => $auditor
        ]);
    }

    public function view(Request $request, $target)
    {
        $organization = Orgnization::find(session('orgnization_id'));
        $beginning_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'beginning_balance')->value('info');
        $final_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'final_balance')->value('info');
        $auditor = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'auditor')->value('info');

        return view('app.budget.home', [
            'orgnization' => $organization, 
            'target' => $target,
            'beginning_balance' => $beginning_balance,
            'final_balance' => $final_balance,
            'auditor' => $auditor
        ]);
    }

    public function amendInfo(Request $request)
    {
        $organization = Orgnization::find(session('orgnization_id'));
        $beginning_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'beginning_balance')->first();
        $final_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'final_balance')->first();
        $auditor = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'auditor')->first();
       
        $beginning_balance->info = $request->beginning_balance;
        $final_balance->info = $request->final_balance;
        $auditor->info = $request->auditor;

        $beginning_balance->save();
        $final_balance->save();
        $auditor->save();
        return redirect('budget/main');
    }
}
