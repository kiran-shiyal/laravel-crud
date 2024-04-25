<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        if(Auth::check())
        {
            return view('students.index', compact('students'));

        }else{

            return view('students.login');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }
    public function login()
    {

        if(Auth::check())
        {
            return redirect()->route('students.index');

        }else{

            return view('students.login');
        }


    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
            'dob' => 'required|date',
            'gender' => 'required',
            'number' => 'required|max:20',
            'file' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $student = new Student();

        $student->first_name = $request->firstName;
        $student->last_name = $request->lastName;
        $student->email =    $request->email;
        $student->password = Hash::make($request->password);
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->contact_number = $request->number;
        $student->profile_picture = $request->file;

        if ($request->hasFile('file'))
        {
            // put image in the public storage
            $imgFile = $request->file;

            $img_name = $imgFile->getClientOriginalName();
            Storage::disk('public')->put($img_name, file_get_contents($imgFile));

        }

        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'registration successfully');

    }

    public function postLogin(Request $request)
    {

        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:6|max:12',

        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials))
        {
            session(['user' => $request->first_name]);
            return  redirect()->route('students.index') ->with('success','You have Successfully login');;
        } else
        {
            return redirect("/login")->with('success','Oppes! You have entered invalid credentials');
        }


    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login')->with('success','You have logged out successfully!');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::where('id',$id)->first();
        
        return view('students.edit')->with(['id'=>$id, 'student'=> $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
