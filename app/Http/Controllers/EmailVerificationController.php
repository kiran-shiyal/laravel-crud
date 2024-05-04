<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{

    public function emailVerification($hash){
        $student = Student::where('email_verify', $hash)->first();
        if($student){
            $student->email_verify = null;
            $student->email_verified_at = now();
            $student->save();
            return redirect()->route('login')
            ->with('success', 'Email verification successfully done! please login');
        }
        // return response()->view('error', [], 404);
        return redirect()->route('login')
        ->with('success', 'your email   already verified! please login.');
    }
}
