<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orgnization;

class BudgetController extends Controller
{
    public function home(Request $request)
    {
        return view('app.budget.home', ['orgnization' => Orgnization::find(session('orgnization_id')), 'target' => 'main']);
    }

    public function view(Request $request, $target)
    {
        return view('app.budget.home', ['orgnization' => Orgnization::find(session('orgnization_id')), 'target' => $target]);
    }
}
