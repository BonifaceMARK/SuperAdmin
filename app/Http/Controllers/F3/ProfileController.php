<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;

use Illuminate\Support\Facades\Crypt;
class ProfileController extends Controller
{
    function profile() {
        $profiles = Profile::where('user_id', auth()->user()->id)->first();


    if ($profiles) {

        $profiles->full_name = Crypt::decryptString($profiles->full_name);
        $profiles->about = Crypt::decryptString($profiles->about);
        $profiles->company = Crypt::decryptString($profiles->company);
        $profiles->job = Crypt::decryptString($profiles->job);
        $profiles->country = Crypt::decryptString($profiles->country);

        $profiles->phone = Crypt::decryptString($profiles->phone);

    } else {

        $profiles = (object) [];
    }


    return view('profile', compact('profiles'));
    }
    function profileupdate(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'about' => '',
            'company' => '',
            'job' => '',
            'country' => '',
            'address' => '',
            'phone' => '',
            'email' => 'email',
        ]);

        $upro = Profile::where('user_id', auth()->user()->id)->first();
        $encryptedFullName = Crypt::encryptString($request->fullName);
        $encryptedAbout = Crypt::encryptString($request->about);
        $encryptedCompany = Crypt::encryptString($request->company);
        $encryptedJob = Crypt::encryptString($request->job);
        $encryptedCountry = Crypt::encryptString($request->country);

        $encryptedPhone = Crypt::encryptString($request->phone);

        if ($upro) {
            $upro->update([
                'full_name' => $encryptedFullName,
                'about' => $encryptedAbout,
                'company' => $encryptedCompany,
                'job' => $encryptedJob,
                'country' => $encryptedCountry,
                'address' => $request->address,
                'phone' => $encryptedPhone,
                'email' => $request->email,
            ]);
        } else {
            $data = [
                'user_id' => auth()->user()->id,
                'full_name' => $encryptedFullName,
                'about' => $encryptedAbout,
                'company' => $encryptedCompany,
                'job' => $encryptedJob,
                'country' => $encryptedCountry,
                'address' => $request->address,
                'phone' => $encryptedPhone,
                'email' => $request->email,
            ];
            $upro = Profile::create($data);
        }

        $udat = [
            'name' => $encryptedFullName,
            'email' => $request->email,
        ];
        $user = User::where('id', auth()->user()->id)->update($udat);
        if (!$upro || !$user) {
            return redirect('profile')->with ("error","Update Error!");
        }
        return redirect('profile');
    }
    function show(Request $request)
    {
        $profiles = Profile::where('user_id', auth()->user()->id)->first();

        return view('profile', compact('profiles'));
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

