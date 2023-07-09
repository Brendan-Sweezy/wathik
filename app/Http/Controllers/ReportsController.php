<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Barryvdh\DomPDF\Facade\Pdf;
use mikehaertl\pdftk\Pdf;
use App\Models\Orgnization;
use App\Models\OrgnizationContact;
use App\Models\OrgnizationAddress;
use App\Models\OrgnizationManager;

class ReportsController extends Controller
{
    public function generate() {
        $organization = Orgnization::find(session('orgnization_id'));
        $id = $organization->national_id;
        $mobile_number = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'mobile')->value('contact');
        $landline_number = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'phone')->value('contact');
        $mailbox = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'mail')->value('contact');
        $zipcode = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'zipcode')->value('contact');
        $email = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'email')->value('contact');
        $address = OrgnizationAddress::where('orgnization_id', $organization->id)->first();
        $manager = OrgnizationManager::where('orgnization_id', $organization->id)->first();
        $website = OrgnizationContact::where('orgnization_id', $organization->id)->where('type', 'website')->value('contact');

        $pdf = new Pdf('/assets/template.pdf');
        $result = $pdf->fillForm([
            'id_0' => $id[0],
            'id_1' => $id[1],
            'id_2' => $id[2],
            'id_3' => $id[3],
            'id_4' => $id[4],
            'id_5' => $id[5],
            'id_6' => $id[6],
            'id_7' => $id[7],
            'id_8' => $id[8],
            'id_9' => $id[9],
            'id_10' => $id[10],
            'id_11' => $id[11],
            'id_12' => $id[12],
            
            'organization_name' => $organization->name,
            'ministry' => $organization->ministry,
            'date_of_establishment' => $organization->founding_date,
            'landline_phone' => $landline_number,
            'mobile_phone' => $mobile_number,
            'email' => $email,
            'mailbox' => $mailbox,
            'postal_code' => $zipcode,
            'governorate' => $address->governorate,
            'province' => $address->provenance,
            'district' => $address->district,
            'area' => $address->area,
            'neighborhood' => $address->neighborhood,
            'residential_type' => 'بادية',
            'organization_president' => $manager->name,
            'president_id' => $manager->national_id,
            'president_mobile' => $manager->phone,
            'president_email' => $manager->email,
            'organization_website' => $website
        ])->send('report.pdf');
    }

    public function home(Request $request)
    {
        return view('app.reports.home');
    }
}  
    
  