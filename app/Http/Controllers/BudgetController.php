<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orgnization;
use App\Models\OrgnizationInfo;
use App\Models\revenue;
use App\Models\expenses;


class BudgetController extends Controller
{
    public function home(Request $request)
    {
        $organization = Orgnization::find(session('orgnization_id'));
        $beginning_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'beginning_balance')->value('info');
        $final_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'final_balance')->value('info');
        $auditor = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'auditor')->value('info');

        $q1Rev = revenue::where('organization_id', $organization->id)->where('quarter', 1)->first();
        $q2Rev = revenue::where('organization_id', $organization->id)->where('quarter', 2)->first();
        $q3Rev = revenue::where('organization_id', $organization->id)->where('quarter', 3)->first();
        $q4Rev = revenue::where('organization_id', $organization->id)->where('quarter', 4)->first();

        $q1Ex = expenses::where('organization_id', $organization->id)->where('quarter', 1)->first();
        $q2Ex = expenses::where('organization_id', $organization->id)->where('quarter', 2)->first();
        $q3Ex = expenses::where('organization_id', $organization->id)->where('quarter', 3)->first();
        $q4Ex = expenses::where('organization_id', $organization->id)->where('quarter', 4)->first();

        $total_rev = $q1Rev->local_financing + $q1Rev->foreign_financing + $q1Rev->project_revenue + $q1Rev->subscriptions + $q1Rev->bank_interest + $q1Rev->immoveable_properties + $q1Rev->other +
        $q2Rev->local_financing + $q2Rev->foreign_financing + $q2Rev->project_revenue + $q2Rev->subscriptions + $q2Rev->bank_interest + $q2Rev->immoveable_properties + $q2Rev->other +
        $q3Rev->local_financing + $q3Rev->foreign_financing + $q3Rev->project_revenue + $q3Rev->subscriptions + $q3Rev->bank_interest + $q3Rev->immoveable_properties + $q3Rev->other +
        $q4Rev->local_financing + $q4Rev->foreign_financing + $q4Rev->project_revenue + $q4Rev->subscriptions + $q4Rev->bank_interest + $q4Rev->immoveable_properties + $q4Rev->other;

        $total_ex = $q1Ex->salaries + $q1Ex->deprications + $q1Ex->office_expenses + $q1Ex->rent + $q1Ex->maintenance + $q1Ex->other +
        $q2Ex->salaries + $q2Ex->deprications + $q2Ex->office_expenses + $q2Ex->rent + $q2Ex->maintenance + $q2Ex->other +
        $q3Ex->salaries + $q3Ex->deprications + $q3Ex->office_expenses + $q3Ex->rent + $q3Ex->maintenance + $q3Ex->other +
        $q4Ex->salaries + $q4Ex->deprications + $q4Ex->office_expenses + $q4Ex->rent + $q4Ex->maintenance + $q4Ex->other;

        return view('app.budget.home', [
            'orgnization' => $organization, 
            'target' => 'main', 
            'beginning_balance' => $beginning_balance,
            'final_balance' => $final_balance,
            'auditor' => $auditor,
            'total_rev' => $total_rev,
            'total_ex' => $total_ex
        ]);
    }

    public function view(Request $request, $target)
    {
        $organization = Orgnization::find(session('orgnization_id'));
        $beginning_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'beginning_balance')->value('info');
        $final_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'final_balance')->value('info');
        $auditor = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'auditor')->value('info');
        
        $q1Rev = revenue::where('organization_id', $organization->id)->where('quarter', 1)->first();
        $q2Rev = revenue::where('organization_id', $organization->id)->where('quarter', 2)->first();
        $q3Rev = revenue::where('organization_id', $organization->id)->where('quarter', 3)->first();
        $q4Rev = revenue::where('organization_id', $organization->id)->where('quarter', 4)->first();

        $q1Ex = expenses::where('organization_id', $organization->id)->where('quarter', 1)->first();
        $q2Ex = expenses::where('organization_id', $organization->id)->where('quarter', 2)->first();
        $q3Ex = expenses::where('organization_id', $organization->id)->where('quarter', 3)->first();
        $q4Ex = expenses::where('organization_id', $organization->id)->where('quarter', 4)->first();

        $total_rev = $q1Rev->local_financing + $q1Rev->foreign_financing + $q1Rev->project_revenue + $q1Rev->subscriptions + $q1Rev->bank_interest + $q1Rev->immoveable_properties + $q1Rev->other +
        $q2Rev->local_financing + $q2Rev->foreign_financing + $q2Rev->project_revenue + $q2Rev->subscriptions + $q2Rev->bank_interest + $q2Rev->immoveable_properties + $q2Rev->other +
        $q3Rev->local_financing + $q3Rev->foreign_financing + $q3Rev->project_revenue + $q3Rev->subscriptions + $q3Rev->bank_interest + $q3Rev->immoveable_properties + $q3Rev->other +
        $q4Rev->local_financing + $q4Rev->foreign_financing + $q4Rev->project_revenue + $q4Rev->subscriptions + $q4Rev->bank_interest + $q4Rev->immoveable_properties + $q4Rev->other;

        $total_ex = $q1Ex->salaries + $q1Ex->deprications + $q1Ex->office_expenses + $q1Ex->rent + $q1Ex->maintenance + $q1Ex->other +
        $q2Ex->salaries + $q2Ex->deprications + $q2Ex->office_expenses + $q2Ex->rent + $q2Ex->maintenance + $q2Ex->other +
        $q3Ex->salaries + $q3Ex->deprications + $q3Ex->office_expenses + $q3Ex->rent + $q3Ex->maintenance + $q3Ex->other +
        $q4Ex->salaries + $q4Ex->deprications + $q4Ex->office_expenses + $q4Ex->rent + $q4Ex->maintenance + $q4Ex->other;

        return view('app.budget.home', [
            'orgnization' => $organization, 
            'target' => $target,
            'beginning_balance' => $beginning_balance,
            'final_balance' => $final_balance,
            'auditor' => $auditor,
            'q1Rev' => $q1Rev,
            'q2Rev' => $q2Rev,
            'q3Rev' => $q3Rev,
            'q4Rev' => $q4Rev,
            'total_rev' => $total_rev,
            'q1Ex' => $q1Ex,
            'q2Ex' => $q2Ex,
            'q3Ex' => $q3Ex,
            'q4Ex' => $q4Ex,
            'total_ex' => $total_ex
        ]);
    }

    public function amendInfo(Request $request)
    {
        $organization = Orgnization::find(session('orgnization_id'));
        $beginning_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'beginning_balance')->first();
        //$final_balance = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'final_balance')->first();
        $auditor = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'auditor')->first();
       
        $beginning_balance->info = $request->beginning_balance;
        $final_balance->info = $request->final_balance;
        $auditor->info = $request->auditor;

        $beginning_balance->save();
        //$final_balance->save();
        $auditor->save();
        return redirect('budget/main');
    }

    public function amendRev(Request $request, $target)
    {
        $organization = Orgnization::find(session('orgnization_id'));
        $rev = revenue::where('organization_id', $organization->id)->where('quarter', $target)->first();
        
        $rev->local_financing = $request->local_financing;
        $rev->foreign_financing = $request->foreign_financing;
        $rev->project_revenue = $request->project_revenue;
        $rev->subscriptions = $request->subscriptions;
        $rev->bank_interest = $request->bank_interest;
        $rev->immoveable_properties = $request->immoveable_properties;
        $rev->other = $request->other;

        $rev->save();
        return redirect('budget/revenue');
    }

    public function amendEx(Request $request, $target)
    {
        $organization = Orgnization::find(session('orgnization_id'));
        $ex = expenses::where('organization_id', $organization->id)->where('quarter', $target)->first();
        
        $ex->salaries = $request->salaries;
        $ex->deprications = $request->deprications;
        $ex->office_expenses = $request->office_expenses;
        $ex->rent = $request->rent;
        $ex->maintenance = $request->maintenance;
        $ex->other = $request->other;

        $ex->save();
        return redirect('budget/expenses');
    }
}
