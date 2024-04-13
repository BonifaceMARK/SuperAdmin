<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailotp;
use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pendingdocu;
use Illuminate\Support\Facades\Crypt;
use Closure;

class Authmanager extends Controller
{

    protected function authenticated(Request $request, $user)
    {

        return redirect()->intended($this->redirectPath());
    }
    public function getStr($string, $start, $end) {
        $str = explode($start, $string);
        $str = explode($end, $str[1]);
        return $str[0];
    }
    function login() {
        if (Auth::check()) {


            return redirect()->route('dashboard');
        }
        return view('login');
    }
    function registration(){
        return view('regis');
    }
    function loginDP(Request $request){


        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => ['required',function (string $attribute, mixed $value, Closure $fail) {
                $g_response = HTTP::asform()->post("https://www.google.com/recaptcha/api/siteverify", [
                    'secret' => config('services.recap.secret_key'),
                    'response' => $value,
                    'remoteip' =>request()->ip(),
                ]);

                if (!$g_response->json('success')) {
                    $fail("The g-reCAPTCHA is invalid.");
                }
            }],
        ]);

        $creden =$request->only('email','password');
        Session::put('lg0-1', $creden);


        if ($request->headers->has('X-Forwarded-For')) {

            $ip = $request->header('X-Forwarded-For');
        } else {

            $ip = $request->ip();
        }
        $ipuser = $ip;

        $curl = curl_init();
        $url = "https://api.infoip.io/$ipuser";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $ip = trim(strip_tags($this->getStr($response,'"ip":"','"')));
        $city = trim(strip_tags($this->getStr($response,'"city":"','"')));
        $country = trim(strip_tags($this->getStr($response,'"country_long":"','"')));
        curl_close($curl);

        $puser = User::where('email', $creden['email'])->first();
        if($puser){
            if ($puser->last_ip_loggedin === $ip && Auth::attempt($creden)) {
                return redirect()->route('dashboard');
            }
            else
            {
            $otp = Helpers::generateOTP();
            $details = [
                'title' => '',
                'body' => "To verify your email address in Finance Guardian, enter the following code: \n \n". $otp .
                "\n \nIf you didn't request this email, you can safely ignore it.\n" . "\n$ip \n$city, $country",
            ];
            Mail::to($request->email)->send(new mailotp($details));
            return redirect()->intended(route('oauth'));
            }
        } else {
            return redirect()->route('loadlogin')->with('errors', 'No Email Exist!');
        }
    }
    function registrationDP(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('register'))->with("error","Register Error!");
        }
        return redirect(route('login'))-> with ("success", "Registration Success!");
    }
    function logout(){






       Session::flush();
       Auth::logout();
       return redirect('/');
    }
}

