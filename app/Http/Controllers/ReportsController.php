<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportsController extends Controller
{
    public function home(Request $request)
    {
        return view('app.reports.home');
    }

    public function generate(Request $request) {
        $pdf = Pdf::loadView('pdf.report');
        return $pdf->download('report.pdf');
    }
}
