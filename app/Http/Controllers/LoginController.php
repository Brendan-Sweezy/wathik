<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    
    public function login() {
        if (session('user_id')) {
            //return redirect()->route('home');
        }
        return view('app.login_temporary');
    }

    public function authenticate(Request $request) {
        $user = User::where('username', $request->username)->get();
        if(count($user)) {
            $input = $request->password . $user[0]->salt;
            
            if(Hash::check($input, $user[0]->password)) {
                Session::put('user_id', $user[0]->id);
                return redirect('home');
                //return json_encode(['status' => true]);
            } else {
                return json_encode(['status' => false, 'msg' => 'الرمز المدخل غير صحيح']);
            }
        } else {
            echo 'no user found';
        }
    }
    
    
    
    /*public function login(Request $request)
    {
        if (session('user_id')) {
            return redirect()->route('home');
        }
        return view('app.login');
    }*/



    
    /*public function authenticate(Request $request)
    {
        $user = User::where('mobile', $request->phone)->first();
        if (empty($user)) {
            $user = User::create(['mobile' => $request->phone]);
        }
        $user->otp = rand(100000, 999999);
        // $user->otp = 123456;
        $user->save();
        try {
            $sid = getenv("TWILIO_ACCOUNT_SID");
            $token = getenv("TWILIO_AUTH_TOKEN");
            $from = getenv("TWILIO_SENDER");
            $twilio = new Client($sid, $token);
            $message = $twilio->messages
                ->create(
                    "whatsapp:" . $user->mobile, // to
                    [
                        "from" => "whatsapp:" . $from,
                        "body" => "اهلا بك في وثيق ، بامكانك استخدام الرمز " . $user->otp . " لتسجيل الدخول"
                    ]
                );
            return json_encode(['status' => true]);
        } catch (Exception $e) {
            // echo $e->getCode() . ' : ' . $e->getMessage() . "<br>";
            // die();
            return json_encode(['status' => false]);
        }
    }

    public function otplogin(Request $request)
    {
        $user = User::where('mobile', $request->phone)->first();
        if ($user->otp == $request->code) {
            Session::put('user_id', $user->id);
            return json_encode(['status' => true]);
        } else {
            return json_encode(['status' => false, 'msg' => 'الرمز المدخل غير صحيح']);
        }
    }*/

    /*public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }*/
}
