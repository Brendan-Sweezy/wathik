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
    //allow a new user to join existing org
    public function joinOrgView() {
        return view('app.existingOrg');
    }

    public function login() {
        if (session('user_id')) {
            return redirect()->route('home');
        }
        return view('app.login_temporary');
    }

    public function authenticate(Request $request) {
        //TODO: Error messages
        $user = User::where('username', $request->username)->get();
        if(count($user)) {
            if(password_verify($request->password, $user[0]->password)) {
                Session::put('user_id', $user[0]->id);
                return redirect('home');
            } else {
                echo "incorrect password";
            }
        } else {
            echo 'no user found';
        }
    }

    public function createAccountView() {
        if (session('user_id')) {
            return redirect()->route('home');
        }
        return view('app.create_account');
    }

    public function authenticateNewAccount(Request $request) {
        $username = User::where('username', $request->username)->get();
        if(count($username)) {
            echo "Username Taken";
        } else if($request->password != $request->password_confirm) {
            echo "Passwords do not match";
        } else {
            $password = password_hash($request->password, PASSWORD_DEFAULT);        
            User::create([
                'username' => $request->username,
                'password' => $password,
                'email' => $request->email,
                'phone' => $request->phone_number
            ]);
            return redirect('/login');
        }
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
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
