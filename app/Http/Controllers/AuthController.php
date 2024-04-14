<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Mail\mailotp;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Closure;


class AuthController extends Controller
{
    //
    public function getStr($string, $start, $end) {
        $str = explode($start, $string);
        if (isset($str[1])) {
            $str = explode($end, $str[1]);
            return $str[0];
        }
        return ""; // or handle the case when the pattern is not found
    }

    public function loadRegister()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('register');
    }



    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'department' => 'required|string',
            'email' => ['required', 'email', 'max:100', 'unique:users', function ($attribute, $value, $fail) {
                if (!Str::endsWith($value, '@gmail.com')) {
                    $fail('The email must be a Gmail address.');
                }
            }],
            'password' => 'required|string|min:6'
        ]);


        $user = new User;
        $user->name = $request->name;
        $user->department = $request->department;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // lagyan mo condtion to pag di nag set ng role automatic 0 wag static 'inassume ko na superadmin to'
        $user->role = 0;

        $user->save();


        return Redirect::route('loadlogin')->with('success', 'Your registration has been successful. You can now log in.');
    }



    public function loadLogin()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

        $userCredential = $request->only('email','password');
        //
        // e{
        
        if(Auth::attempt($userCredential)){
            // dd(Auth::user()->role);
            
            if( Auth::user()->role == '0' || Auth::user()->role == '0') 
            {
                // $route = $this->redirectDash();
                // // return redirect($route);
                //     return response()->json(['redirect' => $route, 'message' => 'Login successful']);
                return response()->json(['redirect' => route('home'), 'message' => 'Login successful']);

            } else if ( Auth::user()->role == '2' ){

                return response()->json(['redirect' => route('manager.home'), 'message' => 'Login successful']);
                
            } else if ( Auth::user()->role == '1' ) {
                return response()->json(['redirect' => route('manager.home'), 'message' => 'Login successful']);
            } else if ( Auth::user()->role == '11' ){
                return response()->json(['redirect' => route('ehome'), 'message' => 'Login successful']);
            }
            
            
        }
        else{
            return response()->json(['error' => 'Username & Password is incorrect'], 401);     
            // return back()->with('error','Username & Password is incorrect');
        }
    }




    public function redirectDash()
    {
        $redirect = '';

        if (Auth::user()) {
            switch (Auth::user()->role) {
                // paayos na lang to
                // case 0:
                //     $redirect = '/user/dashboard';
                //     break;
                case 0:
                    $redirect = '/superadmin/dashboard';
                        break;
                case 1:
                    $redirect = '/admin/dashboard';
                    break;
                case 3:
                    $redirect = '/subadmin/dashboard';
                    break;
                case 2:
                    $redirect = '/subadmin/dashboard';
                    break;
                    // case 3:
                    //     $redirect = '/subadmin/dashboard';
                    //     break;
                default:
                    $redirect = '/';
                    break;
            }
        } else {
            $redirect = '/';
        }

        return $redirect;
    }


    public function logout(Request $request)
    {
        // audit trail
        // dd($request->all());
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    
   /* public function changePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|string|min:8|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Verify the current password
        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }

        // Update the password
        $user->password = Hash::make($request->newPassword);
        $user->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Password changed successfully.');
    }
    */
}
