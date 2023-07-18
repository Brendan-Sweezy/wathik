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
use App\Models\AuthorityMeeting;
use App\Models\Branch;
use App\Models\FinancingEntity;
use App\Models\revenue;
use App\Models\expenses;


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
        
        
        //SQL Queries Second Page
        $projects = Project::where('orgnization_id', $organization->id)->where('status', '!=', 'Upcoming')->get();
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
                    $threats[$threat->threat_id - 1] = 'Yes';
                } else {
                    array_push($other_threats, Threat::where('id', $threat->threat_id)->value('threat'));
                }
            }
        }
       

        //SQL Queries Third Page 
        //President is manager?????? TODODOODODOD
       

        $board_members = Member::where('orgnization_id', $organization->id)->get();

        
        $board_size_articles = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'mentioned_members')->value('info');
        $board_male_size = count(Member::where('gender','male')->get());
        $board_female_size = count(Member::where('gender','female')->get());
        $board_quorum = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'quorum')->value('info');
        $board_term = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'term')->value('info');
        $board_election_date = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'election_date')->value('info');
        $board_size = $board_male_size + $board_female_size;
        

        $association_male_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'assembly_male')->value('info');
        $association_female_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'assembly_female')->value('info');
        $association_size = $association_female_size + $association_male_size;
        

        $employees_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'total_employees')->value('info');
        $employees_male_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'male_employees')->value('info');
        $employees_female_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'female_employees')->value('info');

        $volunteers_male_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'male_volunteers')->value('info');
        $volunteers_female_size = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'female_volunteers')->value('info');
        $volunteers_size = $volunteers_female_size + $volunteers_male_size;
        

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
            $board_election_dates[$i] = $board_members[$i]->election_date;
            
            //TODO Election dates:
            //$board_election_dates[$i] = TODO;
        }

        $employee_names = array_fill(0, 10, '');
        $employee_qualifications = array_fill(0, 10, '');
        $employee_titles = array_fill(0, 10, '');
        $employee_genders = array_fill(0, 10, '');

        $employees = Employee::where('orgnization_id', $organization->id)->get();
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

        $meetings = AuthorityMeeting::where('orgnization_id', $organization->id)->get();
        for($i = 0; $i < 4 && $i < count($meetings); $i++) {
            //$meeting_nums[$i] = $meetings[$i]->meeting_number;
            $meeting_dates[$i] = $meetings[$i]->date;
            $meeting_types[$i] = $meetings[$i]->type;
            $meeting_attendees[$i] = $meetings[$i]->attendees;
            $meeting_deputies[$i] = $meetings[$i]->alternate;
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


    

        $q1Rev = revenue::where('organization_id', $organization->id)->where('quarter', 1)->first();
        $q2Rev = revenue::where('organization_id', $organization->id)->where('quarter', 2)->first();
        $q3Rev = revenue::where('organization_id', $organization->id)->where('quarter', 3)->first();
        $q4Rev = revenue::where('organization_id', $organization->id)->where('quarter', 4)->first();

        $q1Ex = expenses::where('organization_id', $organization->id)->where('quarter', 1)->first();
        $q2Ex = expenses::where('organization_id', $organization->id)->where('quarter', 2)->first();
        $q3Ex = expenses::where('organization_id', $organization->id)->where('quarter', 3)->first();
        $q4Ex = expenses::where('organization_id', $organization->id)->where('quarter', 4)->first();

        $budget_local_financing = [$q1Rev->local_financing, $q2Rev->local_financing, $q3Rev->local_financing, $q4Rev->local_financing];
        $budget_foreign_financing = [$q1Rev->foreign_financing, $q2Rev->foreign_financing, $q3Rev->foreign_financing, $q4Rev->foreign_financing];
        $budget_project_profits = [$q1Rev->project_revenue, $q2Rev->project_revenue, $q3Rev->project_revenue, $q4Rev->project_revenue];
        $budget_subscriptions = [$q1Rev->subscriptions, $q2Rev->subscriptions, $q3Rev->subscriptions, $q4Rev->subscriptions];
        $budget_bank_interests = [$q1Rev->bank_interest, $q2Rev->bank_interest, $q3Rev->bank_interest, $q4Rev->bank_interest];
        $budget_immovable_properties = [$q1Rev->immoveable_properties, $q2Rev->immoveable_properties, $q3Rev->immoveable_properties, $q4Rev->immoveable_properties];
        $budget_revenue_others = [$q1Rev->other, $q2Rev->other, $q3Rev->other, $q4Rev->other];
        $budget_revenue_totals = [
            $budget_local_financing[0] + $budget_foreign_financing[0] + $budget_project_profits[0] + $budget_subscriptions[0] + $budget_bank_interests[0] + $budget_immovable_properties[0] + $budget_revenue_others[0],
            $budget_local_financing[1] + $budget_foreign_financing[1] + $budget_project_profits[1] + $budget_subscriptions[1] + $budget_bank_interests[1] + $budget_immovable_properties[1] + $budget_revenue_others[1],
            $budget_local_financing[2] + $budget_foreign_financing[2] + $budget_project_profits[2] + $budget_subscriptions[2] + $budget_bank_interests[2] + $budget_immovable_properties[2] + $budget_revenue_others[2],
            $budget_local_financing[3] + $budget_foreign_financing[3] + $budget_project_profits[3] + $budget_subscriptions[3] + $budget_bank_interests[3] + $budget_immovable_properties[3] + $budget_revenue_others[3]
        ];

        $budget_salaries = [$q1Ex->salaries, $q2Ex->salaries, $q3Ex->salaries, $q4Ex->salaries];
        $budget_depreciations = [$q1Ex->deprications, $q2Ex->deprications, $q3Ex->deprications, $q4Ex->deprications];
        $budget_office_expenses = [$q1Ex->office_expenses, $q2Ex->office_expenses, $q3Ex->office_expenses, $q4Ex->office_expenses];
        $budget_rents = [$q1Ex->rent, $q2Ex->rent, $q3Ex->rent, $q4Ex->rent];
        $budget_maintenances = [$q1Ex->maintenance, $q2Ex->maintenance, $q3Ex->maintenance, $q4Ex->maintenance];
        $budget_expenses_others1 = [$q1Ex->other, $q2Ex->other, $q3Ex->other, $q4Ex->other];
        $budget_expenses_others2 = array_fill(0, 4, 0);
        $budget_expenses_others3 = array_fill(0, 4, 0);
        $budget_expenses_others4 = array_fill(0, 4, 0);
        $budget_expenses_others5 = array_fill(0, 4, 0);
        $budget_expenses_totals = [
            $budget_salaries[0] + $budget_depreciations[0] + $budget_office_expenses[0] + $budget_rents[0] + $budget_maintenances[0] + $budget_expenses_others1[0],
            $budget_salaries[1] + $budget_depreciations[1] + $budget_office_expenses[1] + $budget_rents[1] + $budget_maintenances[1] + $budget_expenses_others1[1],
            $budget_salaries[2] + $budget_depreciations[2] + $budget_office_expenses[2] + $budget_rents[2] + $budget_maintenances[2] + $budget_expenses_others1[2],
            $budget_salaries[3] + $budget_depreciations[3] + $budget_office_expenses[3] + $budget_rents[3] + $budget_maintenances[3] + $budget_expenses_others1[3]
        ];

        $budget_balances = [
            $budget_revenue_totals[0] - $budget_expenses_totals[0],
            $budget_revenue_totals[1] - $budget_expenses_totals[1],
            $budget_revenue_totals[2] - $budget_expenses_totals[2],
            $budget_revenue_totals[3] - $budget_expenses_totals[3],
        ];

        $auditor = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'auditor')->value('info');

        $balance_beginning = OrgnizationInfo::where('orgnization_id', $organization->id)->where('type', 'beginning_balance')->value('info');;
        $revenue = array_sum($budget_revenue_totals);
        $expenses = array_sum($budget_expenses_totals);
        $balance_ending = $balance_beginning + $revenue - $expenses;

        $upcoming_projects = Project::where('orgnization_id', $organization->id)->where('status', 'Upcoming')->get();
        
        $upcoming_project_names = array_fill(0, 9, '');
        $upcoming_project_locations = array_fill(0, 9, '');
        $upcoming_project_beneficiaries = array_fill(0, 9, '');
        $upcoming_project_budgets = array_fill(0, 9, '');

        for($i = 0; $i < 9 && $i < count($upcoming_projects); $i++) {
            $upcoming_project_names[$i] = $upcoming_projects[$i]->name;
            $upcoming_project_locations[$i] = $upcoming_projects[$i]->title;
            $upcoming_project_beneficiaries[$i] = $upcoming_projects[$i]->beneficiaries;
            $upcoming_project_budgets[$i] = $upcoming_projects[$i]->budget;
        }

        
        

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

            'Name of CBO President' => $manager->name,
            'ID Number_0' => $manager->national_id,
            'Mobile Number' => $manager->phone,
            'Email' => $manager->email,
            'CBO\'s Website' => $website,

            /*'Name of CBO President' => $president,
            'ID Number_0' => $president_id,
            'Mobile Number' => $president_phone,
            'Email' => $president_email,
            'CBO\'s Website' => $website,*/

            'p4_0' => $project_names[0],
            'p4' => $project_names[1],
            'p4_2' => $project_names[2],
            'p4_3' => $project_names[3],
            'p4_4' => $project_names[4],
            'p4_5' => $project_names[5],
            'p4_6' => $project_names[6],
            'p4_7' => $project_names[7],
            'p4_8' => $project_names[8],

            'p3_0' => $project_titles[0],
            'p3' => $project_titles[1],
            'p3_2' => $project_titles[2],
            'p3_3' => $project_titles[3],
            'p3_4' => $project_titles[4],
            'p3_5' => $project_titles[5],
            'p3_6' => $project_titles[6],
            'p3_7' => $project_titles[7],
            'p3_8' => $project_titles[8],

            'p2_0' => $project_statuses[0],
            'p2' => $project_statuses[1],
            'p2_2' => $project_statuses[2],
            'p2_3' => $project_statuses[3],
            'p2_4' => $project_statuses[4],
            'p2_5' => $project_statuses[5],
            'p2_6' => $project_statuses[6],
            'p2_7' => $project_statuses[7],
            'p2_8' => $project_statuses[8],

            'p1_0' => $project_beneficiaries[0],
            'p1' => $project_beneficiaries[1],
            'p1_2' => $project_beneficiaries[2],
            'p1_3' => $project_beneficiaries[3],
            'p1_4' => $project_beneficiaries[4],
            'p1_5' => $project_beneficiaries[5],
            'p1_6' => $project_beneficiaries[6],
            'p1_7' => $project_beneficiaries[7],
            'p1_8' => $project_beneficiaries[8],

            '1' => $threats[0],
            '2' => $threats[1],
            '3' => $threats[2],
            '4' => $threats[3],
            '5' => $threats[4],
            '6' => $threats[5],
            'Other Reasons' => '',

            'Name' => $president,
            'ID Number' =>$president_id,

            '#_1' => $board_size,
            '#_4' => $board_size_articles,
            '#_5' => $board_male_size,
            '#_6' => $board_female_size,
            '#_2' => $board_quorum,
            '#_7' => $board_term,
            '#_3' => $board_election_date,

            '# of Current, Participating Members of the CBO' => $association_size,
            '# of Male Members' => $association_male_size,
            '# of Female Members' => $association_female_size,

            'Male_1' => $employees_male_size,
            'Female_1' => $employees_female_size,
            'Total_1' => $employees_size,

            'Male_2' => $volunteers_male_size,
            'Female_2' => $volunteers_female_size,
            'Total_2' => $volunteers_size,

            'Full Name' => $board_names[0],
            'fill_23_3' => $board_names[1],
            'fill_30_2' => $board_names[2],
            'fill_37_2' => $board_names[3],
            'fill_44' => $board_names[4],
            'fill_51' => $board_names[5],
            'fill_58_a' => $board_names[6],
            'fill_58_b' => $board_names[7],
            'fill_58_c' => $board_names[8],

            'Employee ID #' => $board_ids[0],
            'fill_22_3' => $board_ids[1],
            'fill_29_2' => $board_ids[2],
            'fill_36_2' => $board_ids[3],
            'fill_43_2' => $board_ids[4],
            'fill_50' => $board_ids[5],
            'fill_57_a' => $board_ids[6],
            'fill_57_b' => $board_ids[7],
            'fill_57_c' => $board_ids[8],

            'Date of Birth' => $board_birthdays[0],
            'fill_21_3' => $board_birthdays[1],
            'fill_28_3' => $board_birthdays[2],
            'fill_35_2' => $board_birthdays[3],
            'fill_42_2' => $board_birthdays[4],
            'fill_49' => $board_birthdays[5],
            'fill_56_a' => $board_birthdays[6],
            'fill_56_b' => $board_birthdays[7],
            'fill_56_c' => $board_birthdays[8],

            'Work/Profession' => $board_professions[0],
            'fill_20_3' => $board_professions[1],
            'fill_27_3' => $board_professions[2],
            'fill_34_2' => $board_professions[3],
            'fill_41_2' => $board_professions[4],
            'fill_48' => $board_professions[5],
            'fill_55_a' => $board_professions[6],
            'fill_55_b' => $board_professions[7],
            'fill_55_c' => $board_professions[8],

            'Academic Degree and Specialty' => $board_degrees[0],
            'fill_19_3' => $board_degrees[1],
            'fill_26_3' => $board_degrees[2],
            'fill_33_2' => $board_degrees[3],
            'fill_40_2' => $board_degrees[4],
            'fill_47' => $board_degrees[5],
            'fill_54_a' => $board_degrees[6],
            'fill_54_b' => $board_degrees[7],
            'fill_54_c' => $board_degrees[8],

            'Mobile #' => $board_phones[0],
            'fill_18_3' => $board_phones[1],
            'fill_25_3' => $board_phones[2],
            'fill_32_2' => $board_phones[3],
            'fill_39_2' => $board_phones[4],
            'fill_46' => $board_phones[5],
            'fill_53_a' => $board_phones[6],
            'fill_53_b' => $board_phones[7],
            'fill_53_c' => $board_phones[8],

            'Date of election to the administration' => $board_election_dates[0],
            'fill_17_3' => $board_election_dates[1],
            'fill_24_3' => $board_election_dates[2],
            'fill_31_2' => $board_election_dates[3],
            'fill_38_2' => $board_election_dates[4],
            'fill_45' => $board_election_dates[5],
            'fill_52_a' => $board_election_dates[6],
            'fill_52_a' => $board_election_dates[7],
            'fill_52_a' => $board_election_dates[8],

            'Name_1' => $employee_names[0],
            'fill_10_5' => $employee_names[1],
            'fill_14_4' => $employee_names[2],
            'fill_18_4' => $employee_names[3],
            'fill_22_4' => $employee_names[4],
            'fill_26_4' => $employee_names[5],
            'fill_30_3' => $employee_names[6],
            'fill_34_3' => $employee_names[7],
            'fill_38_3' => $employee_names[8],
            'fill_42_3' => $employee_names[9],

            'Professional_1' => $employee_qualifications[0],
            'fill_9_5' => $employee_qualifications[1],
            'fill_13_5' => $employee_qualifications[2],
            'fill_17_4' => $employee_qualifications[3],
            'fill_21_4' => $employee_qualifications[4],
            'fill_25_4' => $employee_qualifications[5],
            'fill_29_3' => $employee_qualifications[6],
            'fill_33_3' => $employee_qualifications[7],
            'fill_37_3' => $employee_qualifications[8],
            'fill_41_3' => $employee_qualifications[9],

            'Job_1' => $employee_titles[0],
            'fill_8_5' => $employee_titles[1],
            'fill_12_5' => $employee_titles[2],
            'fill_16_4' => $employee_titles[3],
            'fill_20_4' => $employee_titles[4],
            'fill_24_4' => $employee_titles[5],
            'fill_28_4' => $employee_titles[6],
            'fill_32_3' => $employee_titles[7],
            'fill_36_3' => $employee_titles[8],
            'fill_40_3' => $employee_titles[9],

            'Gender_1' => $employee_genders[0],
            'fill_7_5' => $employee_genders[1],
            'fill_11_5' => $employee_genders[2],
            'fill_15_4' => $employee_genders[3],
            'fill_19_4' => $employee_genders[4],
            'fill_23_4' => $employee_genders[5],
            'fill_27_4' => $employee_genders[6],
            'fill_31_3' => $employee_genders[7],
            'fill_35_3' => $employee_genders[8],
            'fill_39_3' => $employee_genders[9],

            'Date of Meeting' => $meeting_dates[0],
            'fill_51_2' => $meeting_dates[1],
            'fill_57_3' => $meeting_dates[2],
            'fill_63' => $meeting_dates[3],

            'Meeting Type' => $meeting_types[0],
            'fill_50_2' => $meeting_types[1],
            'fill_56_3' => $meeting_types[2],
            'fill_62' => $meeting_types[3],

            '# of Attendees' => $meeting_attendees[0],
            'fill_49_2' => $meeting_attendees[1],
            'fill_55_3' => $meeting_attendees[2],
            'fill_61_2' => $meeting_attendees[3],

            '# of Deputies' => $meeting_deputies[0],
            'fill_48_2' => $meeting_deputies[1],
            'fill_54_3' => $meeting_deputies[2],
            'fill_60_2' => $meeting_deputies[3],

            'Decisions' => $meeting_decisions[0],
            'fill_47_2' => $meeting_decisions[1],
            'fill_53_3' => $meeting_decisions[2],
            'fill_59_2' => $meeting_decisions[3],

            'Date of Registration' => $branch_dates[0],
            'fill_76' => $branch_dates[1],
            'fill_82' => $branch_dates[2],
            'Text18_0' => $branch_dates[3],

            'Branch Name' => $branch_names[0],
            'fill_75' => $branch_names[1],
            'fill_81' => $branch_names[2],
            'Text18_1' => $branch_names[3],

            'Governorate' => $branch_governorates[0],
            'fill_74' => $branch_governorates[1],
            'fill_80' => $branch_governorates[2],
            'Text18_2' => $branch_governorates[3],

            'Area_1' => $branch_major_generals[0],
            'fill_73' => $branch_major_generals[1],
            'fill_79' => $branch_major_generals[2],
            'Text18_3' => $branch_major_generals[3],

            'Address' => $branch_eleminates[0],
            'fill_72_2' => $branch_eleminates[1],
            'fill_78' => $branch_eleminates[2],
            'Text18_4' => $branch_eleminates[3],

            'Population' => $branch_populations[0],
            'fill_71_2' => $branch_populations[1],
            'fill_77' => $branch_populations[2],
            'Text18_5' => $branch_populations[3],

            'Donor' => $funding_donors[0],
            'fill_14_5' => $funding_donors[1],
            'fill_20_5' => $funding_donors[2],
            'fill_26_5' => $funding_donors[3],
            'fill_32_4' => $funding_donors[4],
            'fill_38_4' => $funding_donors[5],

            'Nationality of Donor' => $funding_nationalities[0],
            'fill_13_6' => $funding_nationalities[1],
            'fill_19_5' => $funding_nationalities[2],
            'fill_25_5' => $funding_nationalities[3],
            'fill_31_4' => $funding_nationalities[4],
            'fill_37_4' => $funding_nationalities[5],

            'Governmental/non-governmental' => $funding_type[0],
            'fill_12_6' => $funding_type[1],
            'fill_18_5' => $funding_type[2],
            'fill_24_5' => $funding_type[3],
            'fill_30_4' => $funding_type[4],
            'fill_36_4' => $funding_type[5],

            'Financing Status' => $funding_statuses[0],
            'fill_11_6' => $funding_statuses[1],
            'fill_17_5' => $funding_statuses[2],
            'fill_23_5' => $funding_statuses[3],
            'fill_29_4' => $funding_statuses[4],
            'fill_35_4' => $funding_statuses[5],

            'Funding Approval Date' => $funding_dates[0],
            'fill_10_6' => $funding_dates[1],
            'fill_16_5' => $funding_dates[2],
            'fill_22_5' => $funding_dates[3],
            'fill_28_5' => $funding_dates[4],
            'fill_34_4' => $funding_dates[5],

            'Value (JD)' => $funding_values[0],
            'fill_9_6' => $funding_values[1],
            'fill_15_5' => $funding_values[2],
            'fill_21_5' => $funding_values[3],
            'fill_27_5' => $funding_values[4],
            'fill_33_4' => $funding_values[5],

            'fill_43_4' => $balance_beginning,
            'fill_39_4' => $revenue,
            'fill_40_4' => $expenses,
            'fill_41_4' => $balance_ending,

            'fill_12_7' => $budget_local_financing[0],
            'fill_11_7' => $budget_local_financing[1],
            'fill_10_7' => $budget_local_financing[2],
            'fill_9_7' => $budget_local_financing[3],
            'fill_8_7' => array_sum($budget_local_financing),

            'fill_17_6' => $budget_foreign_financing[0],
            'fill_16_6' => $budget_foreign_financing[1],
            'fill_15_6' => $budget_foreign_financing[2],
            'fill_14_6' => $budget_foreign_financing[3],
            'fill_13_7' => array_sum($budget_foreign_financing),

            'fill_22_6' => $budget_project_profits[0],
            'fill_21_6' => $budget_project_profits[1],
            'fill_20_6' => $budget_project_profits[2],
            'fill_19_6' => $budget_project_profits[3],
            'fill_18_6' => array_sum($budget_project_profits),

            'fill_27_6' => $budget_subscriptions[0],
            'fill_26_6' => $budget_subscriptions[1],
            'fill_25_6' => $budget_subscriptions[2],
            'fill_24_6' => $budget_subscriptions[3],
            'fill_23_6' => array_sum($budget_subscriptions),

            'fill_32_5' => $budget_bank_interests[0],
            'fill_31_5' => $budget_bank_interests[1],
            'fill_30_5' => $budget_bank_interests[2],
            'fill_29_5' => $budget_bank_interests[3],
            'fill_28_6' => array_sum($budget_bank_interests),

            'fill_37_5' => $budget_immovable_properties[0],
            'fill_36_5' => $budget_immovable_properties[1],
            'fill_35_5' => $budget_immovable_properties[2],
            'fill_34_5' => $budget_immovable_properties[3],
            'fill_33_5' => array_sum($budget_immovable_properties),

            'fill_42_5' => $budget_revenue_others[0],
            'fill_41_5' => $budget_revenue_others[1],
            'fill_40_5' => $budget_revenue_others[2],
            'fill_39_5' => $budget_revenue_others[3],
            'fill_38_5' => array_sum($budget_revenue_others),

            
            'fill_47_3' => $budget_revenue_totals[0],
            'fill_46_3' => $budget_revenue_totals[1],
            'fill_45_3' => $budget_revenue_totals[2],
            'fill_44_4' => $budget_revenue_totals[3],
            'fill_43_5' => array_sum($budget_revenue_totals),
            

            'fill_57_5' => $budget_salaries[0],
            'fill_56_5' => $budget_salaries[1],
            'fill_55_5' => $budget_salaries[2],
            'fill_54_5' => $budget_salaries[3],
            'fill_53_5' => array_sum($budget_salaries),

            'fill_62_2' => $budget_depreciations[0],
            'fill_61_4' => $budget_depreciations[1],
            'fill_60_4' => $budget_depreciations[2],
            'fill_59_4' => $budget_depreciations[3],
            'fill_58_4' => array_sum($budget_depreciations),

            'fill_67_3' => $budget_office_expenses[0],
            'fill_66_3' => $budget_office_expenses[1],
            'fill_65_3' => $budget_office_expenses[2],
            'fill_64_3' => $budget_office_expenses[3],
            'fill_63_2' => array_sum($budget_office_expenses),

            'fill_72_3' => $budget_rents[0],
            'fill_71_3' => $budget_rents[1], 
            'fill_70_3' => $budget_rents[2],
            'fill_69_3' => $budget_rents[3],
            'fill_68_3' => array_sum($budget_rents),

            'fill_77_2' => $budget_maintenances[0],
            'fill_76_2' => $budget_maintenances[1],
            'fill_75_2' => $budget_maintenances[2],
            'fill_74_2' => $budget_maintenances[3],
            'fill_73_2' => array_sum($budget_maintenances),

            'fill_82_2' => $budget_expenses_others1[0],
            'fill_81_2' => $budget_expenses_others1[1],
            'fill_80_2' => $budget_expenses_others1[2],
            'fill_79_2' => $budget_expenses_others1[3],
            'fill_78_2' => array_sum($budget_expenses_others1),
            
            'fill_107' => $budget_expenses_totals[0],
            'fill_106' => $budget_expenses_totals[1],
            'fill_105' => $budget_expenses_totals[2],
            'fill_104' => $budget_expenses_totals[3],
            'fill_103' => array_sum($budget_expenses_totals),

            'fill_112' => $budget_balances[0],
            'fill_111' => $budget_balances[1],
            'fill_110' => $budget_balances[2],
            'fill_109' => $budget_balances[3],
            'fill_108' => array_sum($budget_balances),

            'Text25' => $auditor,

            'Name of activity' => $upcoming_project_names[0],
            'fill_10_8' => $upcoming_project_names[1],
            'fill_14_7' => $upcoming_project_names[2],
            'fill_18_7' => $upcoming_project_names[3],
            'fill_22_7' => $upcoming_project_names[4],
            'fill_26_7' => $upcoming_project_names[5],
            'fill_30_6' => $upcoming_project_names[6],
            'fill_34_6' => $upcoming_project_names[7],
            'fill_38_6' => $upcoming_project_names[8],

            'Location' => $upcoming_project_locations[0],
            'fill_9_8' => $upcoming_project_locations[1],
            'fill_13_8' => $upcoming_project_locations[2],
            'fill_17_7' => $upcoming_project_locations[3],
            'fill_21_7' => $upcoming_project_locations[4],
            'fill_25_7' => $upcoming_project_locations[5],
            'fill_29_6' => $upcoming_project_locations[6],
            'fill_33_6' => $upcoming_project_locations[7],
            'fill_37_6' => $upcoming_project_locations[8],

            '# of beneficiaries' => $upcoming_project_beneficiaries[0],
            'fill_8_8' => $upcoming_project_beneficiaries[1],
            'fill_12_8' => $upcoming_project_beneficiaries[2],
            'fill_16_7' => $upcoming_project_beneficiaries[3],
            'fill_20_7' => $upcoming_project_beneficiaries[4],
            'fill_24_7' => $upcoming_project_beneficiaries[5],
            'fill_28_7' => $upcoming_project_beneficiaries[6],
            'fill_32_6' => $upcoming_project_beneficiaries[7],
            'fill_36_6' => $upcoming_project_beneficiaries[8],

            'Budget' => $upcoming_project_budgets[0],
            'fill_7_8' => $upcoming_project_budgets[1],
            'fill_11_8' => $upcoming_project_budgets[2],
            'fill_15_7' => $upcoming_project_budgets[3],
            'fill_19_7' => $upcoming_project_budgets[4],
            'fill_23_7' => $upcoming_project_budgets[5],
            'fill_27_7' => $upcoming_project_budgets[6],
            'fill_31_6' => $upcoming_project_budgets[7],
            'fill_35_6' => $upcoming_project_budgets[8],

           
        ])->send('report.pdf');
    }

    public function home(Request $request)
    {
        return view('app.reports.home');
    }
}  
    