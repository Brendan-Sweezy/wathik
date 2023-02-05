<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function home(Request $request)
    {
        return view('app.reports.home');
    }
}
