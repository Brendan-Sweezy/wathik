<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Orgnization;
use App\Models\OrgnizationContact;
use App\Models\OrgnizationAddress;

class ReportsController extends Controller
{
    public function home(Request $request)
    {
        return view('app.reports.home');
    }

    public function generate(Request $request) {
        $organization = Orgnization::find(session('orgnization_id'));
        $mobile_number = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'mobile')->value('contact');
        $landline_number = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'phone')->value('contact');
        $mailbox = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'mail')->value('contact');
        $zipcode = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'zipcode')->value('contact');
        $email = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'email')->value('contact');
        $providence = OrgnizationAddress::where('orgnization_id', $organization->id)->value('provenance');
        $governorate = OrgnizationAddress::where('orgnization_id', $organization->id)->value('governorate');
        $area = OrgnizationAddress::where('orgnization_id', $organization->id)->value('area');
        $district = OrgnizationAddress::where('orgnization_id', $organization->id)->value('district');
        $residential_type = OrgnizationAddress::where('orgnization_id', $organization->id)->value('residential_type');
        $neighborhood = OrgnizationAddress::where('orgnization_id', $organization->id)->value('neighborhood');


        $pdf = Pdf::loadView('pdf.report', [
            'national_id' => $organization->national_id,
            'cbo_name' => $organization->name,
            'founding_date' => $organization->founding_date,
            'ministry' => $organization->ministry,
            'mobile_number' => $mobile_number,
            'landline_number' => $landline_number,
            'mailbox' => $mailbox . ' ' . $zipcode,
            'email' => $email,
            'providence' => $providence,
            'governorate' => $governorate,
            'area' => $area,
            'district' => $district,
            'residential_type' => $residential_type,
            'neighborhood' => $neighborhood
        ]);
        return $pdf->download('report.pdf');
    }
}
