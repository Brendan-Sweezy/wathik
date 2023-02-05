<?php

namespace App\Http\Controllers;

use App\Models\Orgnization;
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
}
