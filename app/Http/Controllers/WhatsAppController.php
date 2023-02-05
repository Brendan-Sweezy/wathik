<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\WhatsappSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class WhatsAppController extends Controller
{
    function webhook(Request $request)
    {
        $mobile = '+' . $request->post('WaId');
        $user = User::where('mobile', $mobile)->first();
        if (empty($user)) {
            $this->send($mobile, 'اهلا بك ، ليس لديك حساب على وثيق
            لاستخدام خدمات وثيق على الواتساب يرجى التسجيل اولا على الرابط
            https://wathik.app/login');
        } else {
            if (!$user->orgnization) {
                $this->send($mobile, 'اهلا بك ، حسابك على وثيق غير مكتمل
                لاستخدام خدمات وثيق يرجى اتمام التسجيل على الرابط
                https://wathik.app/login');
            } else {
                $message = $request->post('Body');
                if ($message == 'ابدأ' || $message == 'ابدا') {
                    WhatsappSession::create([
                        'user_id' => $user->id,
                        'last_action' => 'start',
                        'next_action' => 'wait',
                        'finished' => false,
                    ]);
                    $this->send($mobile, 'اهلا بك في وثيق
                    يرجى الرد برقم الخيار اللذي ترغب باختياره
                    يرجى اختيار الخدمة اللتي ترغب باستخدامها
                    1 - اضافة مشروع جديد
                    2 - المشاريع القائمة');
                } else {
                    $session = WhatsappSession::where('finished', 0)->first();
                    if (empty($session)) {
                        $this->send($mobile, 'اهلا بك ، انت المشرف على ' . $user->orgnization->orgnization->name . '
                        بامكانك دائما ارسال كلمة ابدأ للبدء باستخدام الخدمات او العودة للقائمة الرئيسية');
                    } else {
                        switch ($session->last_action) {
                            case 'start':
                                $this->handelStartSession($user, $session, $message);
                                break;
                            case 'new_project':
                                $this->handelNewProject($user, $session, $message);
                                break;
                        }
                        dd($session);
                    }
                }
            }
        }
        dd($request->post());
    }
    function handelStartSession($user, $session, $message)
    {
        if ($message == '1') {
            $this->send($user->mobile, 'يرجى تزويدنا ب إسم المشروع');
            $session->last_action = 'new_project';
            $session->next_action = 'name';
            $session->save();
        } else if ($message == '2') {
            $projects = Project::where('orgnization_id', $user->orgnization->orgnization_id)->get();
            dd($projects);
            $this->send($user->mobile, 'لقد قمت بادخال خاطئ يرجى التأكد من صيغة الادخال');
            $session->last_action = 'get_projects';
            $session->save();
        } else {
            $this->wrongResponce($user->mobile);
        }
    }
    function handelNewProject($user, $session, $message)
    {
        if ($session->next_action == 'name') {
            $project = Project::create([
                'orgnization_id' => $user->orgnization->orgnization_id,
                'name' => $message
            ]);
            $session->next_action = 'date';
            $session->obj_id = $project->id;
            $session->save();
            $this->send($user->mobile, 'يرجى تزويدنا ب تاريخ المشروع');
        } else {
            $project = Project::find($session->obj_id);
            if ($session->next_action == 'date') {
                $project->date = $message;
                $project->save();

                $session->next_action = 'title';
                $session->save();

                $this->send($user->mobile, 'يرجى تزويدنا ب عنوان المشروع');
            } else if ($session->next_action == 'title') {
                $project->title = $message;
                $project->save();

                $session->next_action = 'status';
                $session->save();

                $this->send($user->mobile, 'يرجى تزويدنا ب حالة المشروع');
            } else if ($session->next_action == 'status') {
                $project->status = $message;
                $project->save();

                $session->next_action = 'beneficiaries';
                $session->save();

                $this->send($user->mobile, 'يرجى تزويدنا ب عدد المستفيدين من المشروع');
            } else if ($session->next_action == 'beneficiaries') {
                $project->beneficiaries = $message;
                $project->save();

                $session->finished = true;
                $session->save();

                $this->send($user->mobile, 'لقد تم حفظ المشروع بنجاح ، يمكنك ارسال ابدأ للعودة للقائمة الرئيسية');
            }
        }
    }
    function wrongResponce($mobile)
    {
        $this->send($mobile, 'لقد قمت بادخال خاطئ يرجى التأكد من صيغة الادخال');
    }

    function fallback(Request $request)
    {
    }

    function status(Request $request)
    {
        Log::debug('status : ' . json_encode($request->post()));
    }

    function send($phone, $message)
    {
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $from = getenv("TWILIO_SENDER");
        $twilio = new Client($sid, $token);
        $text = 'اهلا بك في وثيق
    يرجى الرد برقم الخيار اللذي ترغب باختياره
    يرجى اختيار الخدمة اللتي ترغب باستخدامها
    1 - اضافة مشروع جديد
    2 - المشاريع القائمة ';
        $text = 'يرجى تزويدنا ب إسم المشروع';
        $text = 'يرجى تزويدنا ب تاريخ المشروع';
        $text = 'يرجى تزويدنا ب عنوان المشروع';
        $text = 'يرجى تزويدنا ب حالة المشروع';
        $text = 'يرجى تزويدنا ب عدد المستفيدين من المشروع';
        $text = 'تم اضافة المشروع بنجاح بإمكانك الان 
    1 - اضافة مشاركين في المشروع
    2 - اضافة فعاليات الى المشروع
    او ارسل 0 للعودة للقائمة الرئيسية';
        $twilio->messages
            ->create(
                "whatsapp:" . $phone, // to
                [
                    "from" => "whatsapp:" . $from,
                    "body" => $message
                ]
            );
    }
}
