<?php

namespace App\Http\Controllers;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;

class VerifyPhoneController extends Controller
{
    public function create()
    {
        return view('auth.add-phone');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tel' => ['required','numeric', 'unique:users'],
        ]);
        /* Get credentials from .env */
        // $token = getenv("TWILIO_TOKEN");
        // $twilio_sid = getenv("TWILIO_SID");
        // $twilio_verify = getenv("TWILIO_VERIFY");
        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        $twilio->verify->v2->services(config('services.twilio.verify'))
            ->verifications
            ->create($data['tel'], "sms");
        auth()->user()->update([
            'tel' => $data['tel'],
        ]);
        return redirect()->route('verify-show')->with(['tel' => $data['tel']]);
    }

    public function verifyShow()
    {
        return view('auth.verify');
    }

    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required','digits:6','numeric'],
            'tel' => ['required', 'string'],
        ]);
        try{
        /* Get credentials from .env */
        // $token = getenv("TWILIO_TOKEN");
        // $twilio_sid = getenv("TWILIO_SID");
        // $twilio_verify = getenv("TWILIO_VERIFY");
        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        $verification = $twilio->verify->v2->services(config('services.twilio.verify'))
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $data['tel']));
        if ($verification->valid) {
            tap(User::where('tel', $data['tel']))->update(['isVerified' => true]);
            return redirect()->route('dashboard');
        }else{
            tap(User::where('tel', $data['tel']))->update(['tel' => NULL]);
            return redirect()->route('add-phone');
        }
        }
        catch(\Exception $e){
            return back();
        }
        }
}
