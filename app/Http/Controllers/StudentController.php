<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendEmail;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        if (Auth::check())
        {
            return view('students.index', compact('students'));

        } else
        {
            return redirect()->route('login');
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

        if (Auth::check())
        {
            return redirect()->route('students.index');

        } else
        {

            return view('students.login')->with('success', 'Your session has timed out. Please login again.');
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:12',
            'dob' => 'required|date|before:today',
            'gender' => 'required',
            'number' => 'required|digits:10',
            'file' => 'required|nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $student = new Student();
        $email_verify = md5(now());
        $student->first_name = $request->firstName;
        $student->last_name = $request->lastName;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->contact_number = $request->number;
        $student->profile_picture = $request->file;
        $student->email_verify = $email_verify;

        if ($request->hasFile('file'))
        {
            // put image in the public storage
            $imgFile = $request->file;

            $imageName = time() . '.' . $request->file->extension();
            //   $imgFile->store('public');
            Storage::disk('public')->put($imageName, file_get_contents($imgFile));
            $student->profile_picture = $imageName;

        }

        $student->save();
        $mailData = [
            'title' => 'please verify your email address',
            'url' => 'http://127.0.0.1:8000/email/verify/' . $email_verify,
            'name' => $request->firstName,
        ];

        Mail::to($request->email)->queue(new SendEmail($mailData));


        return redirect()->back()
            ->with('success', 'registration successfully! please verify the the email');

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

        if (Auth::attempt($credentials, false))
        {

            session(['user' => $request->first_name]);
            return redirect()->route('students.index')->with('success', 'You have Successfully login');
        } else
        {

            return redirect()->route('login')->with('error', 'Oppes! You have entered invalid credentials');
        }


    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'You have logged out successfully!');

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
        $student = Student::where('id', $id)->first();
        if (Auth::check())
        {

            return view('students.edit', compact('student'));
        } else
        {

            return redirect()->route('login')->with('success', 'Your session has timed out. Please login again.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::check())
        {
            $request->validate([
                'editFirstName' => 'required|max:255',
                'editLastName' => 'required|max:255',
                'editDob' => 'required|date',
                'editGender' => 'required',
                'editNumber' => 'required|digits:10',
                'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $user = Student::find($id);

            $user->first_name = $request->input('editFirstName');
            $user->last_name = $request->input('editLastName');
            $user->dob = $request->input('editDob');
            $user->gender = $request->input('editGender');

            if ($request->hasFile('image'))
            {

                if (isset($user->profile_picture))
                {
                    Storage::disk('public')->delete($user->profile_picture);
                }
                $imgFile = $request->image;
                $imageName = time() . '.' . $request->image->extension();
                Storage::disk('public')->put($imageName, file_get_contents($imgFile));
                $user->profile_picture = $imageName;

            }
            $user->save();

            return redirect()->route('students.index')
                ->with('success', 'Student updated successfully.');
        } else
        {

            return redirect()->route('login')->with('success', 'Your session has timed out. Please login again.');
        }


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        if (Auth::check())
        {
            $student->delete();
            return redirect()->route('students.index')
                ->with('success', 'Student is deleted successfully.');


        } else
        {

            return redirect()->route('login')->with('success', 'Your session has timed out. Please login again.');
        }

    }
    public function dataTable()
    {

        $students = Student::all();
        return view('datatable_users', compact('students'));
        
    }

    public function serverSideDataTable()
    {

        return view('students.server_side_datatable');

    }

    public function getData(Request $request)
    {
        if ($request->ajax())
        {
            $data = Student::all();
            return Datatables::of($data)->addColumn('image', function ($data) {
                $imageUrl = url('storage/' . $data->profile_picture);
                return '<img src="' . $imageUrl . '" border="0" width="100" height = "70">';
            })->rawColumns(['image'])->make(true);
        }
    }

}
