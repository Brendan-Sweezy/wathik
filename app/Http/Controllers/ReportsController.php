<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\pdftk\Pdf;
use App\Models\Orgnization;
use App\Models\OrgnizationContact;
use App\Models\OrgnizationAddress;
use App\Models\OrgnizationManager;
use App\Models\OrgnizationInfo;
use App\Models\Project;
use App\Models\ProjectThreat;
use App\Models\Threat;
use App\Models\Member;
use App\Models\Employee;
use App\Models\Meeting;
use App\Models\Branch;
use App\Models\FinancingEntity;


class ReportsController extends Controller
{
    public function generate() {
        
        //SQL Queries First Page
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

        $president = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'president')->value('info');
        $president_id = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'president_national_id')->value('info');
        $president_phone = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'president_phone')->value('info');
        $president_email = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'president_email')->value('info');
        /*
        
        //SQL Queries Second Page
        $projects = Project::where('orgnization_id', $organization->id)->get();
        $project_names = array_fill(0, 9, '');
        $project_dates = array_fill(0, 9, '');
        $project_titles = array_fill(0, 9, '');
        $project_statuses = array_fill(0, 9, '');
        $project_beneficiaries = array_fill(0, 9, '');

        $threats = [false, false, false, false, false, false];
        $other_threats = [];

        for($i = 0; $i < 9 && $i < count($projects); $i++) {
            $project_names[$i] = $projects[$i]->name;
            $project_dates[$i] = $projects[$i]->date;
            $project_titles[$i] = $projects[$i]->title;
            $project_statuses[$i] = $projects[$i]->status;
            $project_beneficiaries[$i] = $projects[$i]->beneficiaries;
        }

        foreach($projects as $project) {
            $project_threats = ProjectThreat::where('project_id', $project->id)->get();
            foreach($project_threats as $threat) {
                if($threat->threat_id <= 6 && $threat->threat_id > 0) {
                    $threats[$threat->threat_id - 1] = true;
                } else {
                    array_push($other_threats, Threat::where('id', $threat->threat_id)->value('threat'));
                }
            }
        }
       

        //SQL Queries Third Page 
        //President is manager?????? TODODOODODOD
       

        $board_members = Member::where('orgnization_id', $organization->id)->get();

        $board_size = count($board_members);
        $board_size_articles ='';
        $board_male_size = '';
        $board_female_size = '';
        $board_quorum = '';
        $board_term = '';
        $board_election_date = '';

        $association_size = '';
        $association_male_size = '';
        $association_female_size = '';

        $employees_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'total_employees')->value('info');
        $employees_male_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'female_employees')->value('info');
        $employees_female_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'female_employees')->value('info');

        $volunteers_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'total_volunteers')->value('info');
        $volunteers_male_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'male_volunteers')->value('info');
        $volunteers_female_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'female_volunteers')->value('info');

        $board_names = array_fill(0, 9, '');
        $board_ids = array_fill(0, 9, '');
        $board_birthdays = array_fill(0, 9, '');
        $board_professions = array_fill(0, 9, '');
        $board_degrees = array_fill(0, 9, '');
        $board_phones = array_fill(0, 9, '');
        $board_election_dates = array_fill(0, 9, '');

        $board_members = Member::where('orgnization_id', $organization->id)->get();
        for($i = 0; $i < 9 && $i < count($board_members); $i++) {
            $board_names[$i] = $board_members[$i]->name;
            $board_ids[$i] = $board_members[$i]->national_id;
            $board_birthdays[$i] = $board_members[$i]->birthday;
            $board_professions[$i] = $board_members[$i]->work;
            $board_degrees[$i] = $board_members[$i]->degree;
            $board_phones[$i] = $board_members[$i]->phone;
            
            //TODO Election dates:
            //$board_election_dates[$i] = TODO;
        }

        $employee_names = array_fill(0, 9, '');
        $employee_qualifications = array_fill(0, 9, '');
        $employee_titles = array_fill(0, 9, '');
        $employee_genders = array_fill(0, 9, '');

        $employees = Employee::where('organization_id', $organization->id)->get();
        for($i = 0; $i < 9 && $i < count($employees); $i++) {
            $employee_names[$i] = $employees[$i]->name;
            $employee_qualifications[$i] = $employees[$i]->qualification;
            $employee_titles[$i] = $employees[$i]->title;
            $employee_genders[$i] = "male";
            if($employees[$i]->gender == 0) {
                $employee_genders[$i] = "female";
            }
        }

        $meeting_nums = array_fill(0, 4, '');
        $meeting_dates = array_fill(0, 4, '');
        $meeting_types = array_fill(0, 4, '');
        $meeting_attendees = array_fill(0, 4, '');
        $meeting_deputies = array_fill(0, 4, '');
        $meeting_decisions = array_fill(0, 4, '');

        $meetings = Meeting::where('organization_id', $organization->id)->get();
        for($i = 0; $i < 4 && $i < count($meetings); $i++) {
            $meeting_nums[$i] = $meetings[$i]->meeting_number;
            $meeting_dates[$i] = $meetings[$i]->date;
            $meeting_types[$i] = $meetings[$i]->type;
            $meeting_attendees[$i] = $meetings[$i]->attendees;
            $meeting_deputies[$i] = $meetings[$i]->deputies;
            $meeting_decisions[$i] = $meetings[$i]->decisions;
        }

        $branch_dates = array_fill(0, 4, '');
        $branch_names = array_fill(0, 4, '');
        $branch_governorates = array_fill(0, 4, '');
        $branch_major_generals = array_fill(0, 4, '');
        $branch_eleminates = array_fill(0, 4, '');
        $branch_populations = array_fill(0, 4, '');

        $branches = Branch::where('organization_id', $organization->id)->get();
        for($i = 0; $i < 4 && $i < count($branches); $i++) {
            $branch_dates[$i] = $branches[$i]->date;
            $branch_names[$i] = $branches[$i]->name;
            $branch_governorates[$i] = $branches[$i]->governorate;
            $branch_major_generals[$i] = $branches[$i]->major_general;
            $branch_eleminates[$i] = $branches[$i]->eleminate;
            $branch_populations[$i] = $branches[$i]->population;
        }

        $funding_donors = array_fill(0, 6, '');
        $funding_nationalities = array_fill(0, 6, '');
        $funding_type = array_fill(0, 6, '');
        $funding_statuses = array_fill(0, 6, '');
        $funding_dates = array_fill(0, 6, '');
        $funding_values = array_fill(0, 6, '');

        $donors = FinancingEntity::where('orgnization_id', $organization->id)->get();
        for($i = 0; $i < 6 && $i < count($donors); $i++) {
            $funding_donors[$i] = $donors[$i]->name;
            $funding_nationalities[$i] = $donors[$i]->nationality;
            $funding_type[$i] = $donors[$i]->type;
            $funding_statuses[$i] = $donors[$i]->financing_characteristic;
            $funding_dates[$i] = $donors[$i]->date;
            $funding_values[$i] = $donors[$i]->amount;
        }


        $balance_beginning = '';
        $revenue = '';
        $expenses = '';
        $balance_ending = '';

        $budget_local_financing = [];
        $budget_foreign_financing = [];
        $budget_project_profits = [];
        $budget_subscriptions = [];
        $budget_bank_interests = [];
        $budget_immovable_properties = [];
        $budget_revenue_others = [];
        $budget_revenue_totals = [];

        $budget_salaries = [];
        $budget_depreciations = [];
        $budget_office_expenses = [];
        $budget_rents = [];
        $budget_maintenances = [];
        $budget_expenses_others1 = [];
        $budget_expenses_others2 = [];
        $budget_expenses_others3 = [];
        $budget_expenses_others4 = [];
        $budget_expenses_others5 = [];
        $budget_expenses_totals = [];

        $budget_balances = [];

        $auditor = '';

        $upcoming_project_names = [];
        $upcoming_project_locations = [];
        $upcoming_project_beneficiaries = [];
        $upcoming_project_budgets = [];


*/
        
        

        $pdf = new Pdf('/assets/template.pdf');
        $result = $pdf->fillForm([
            'CBO Name' => $organization->name,
            'Text_1' => $id[0],
            '90id' => $id[1],
            'id9' => $id[2],
            'id8' => $id[3],
            'ity' => $id[4],
            'hi' => $id[5],
            'hello' => $id[6],
            'id0' => $id[7],
            'id1' => $id[8],
            'id5' => $id[9],
            'id10' => $id[10],
            'id11' => $id[11],
            'id90' => $id[12],
            'Competent Ministry' => $organization->ministry,
            'Date of Establishment' => $organization->founding_date,
            'Landline Number' => $landline_number,
            'Mobile' => $mobile_number,
            'Email_0' => $email,
            'Postal Code' => $mailbox,
            'P.O. Box' => $zipcode,
            'Governate' => $address->governorate,
            'District' => $address->provenance,
            'Constituency' => $address->district,
            'Area' => $address->area,
            'Neighborhood' => $address->neighborhood,

            'Name of CBO President' => $president,
            'ID Number_0' => $president_id,
            'Mobile Number' => $president_phone,
            'Email' => $president_email,
            'CBO\'s Website' => $website

           
        ])->send('report.pdf');
    }

    public function home(Request $request)
    {
        return view('app.reports.home');
    }
}  
    
/*
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
            */