@extends('students.layout')
@section('title', 'Registration From')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/register.css') }} ">
@endsection

@section('content')
    <div class="container-sm  d-flex justify-content-center align-items-center  " style="height: 100vh">

        <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form border border-1  p-3 rounded-2" style="background-color: rgb(240, 241, 236)">
                <h2 class="text-center mb-5 text-black">Registration Form</h2>
                <div class="row ">

                    <div class="col-sm-6">
                        <label for="firstName" class="">firstName:</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Enter firstName"
                            name="firstName" value="{{ old('firstName') }}">
                        @error('firstName')
                            <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 ">

                        <label for="lastName" class="">lastName:</label>
                        <input type="text" class="form-control" id="lastName" value="{{ old('lastName') }}"
                            placeholder="Enter lastName" name="lastName">
                        @error('lastName')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <label for="email" class="">Email:</label>
                        <input type="text" class="form-control" id="email" value="{{ old('email') }}"
                            placeholder="Enter email" name="email">
                        @error('email')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class=" col-sm-6">
                        <label for="password" class="">Password:</label>
                        <input type="text" class="form-control" id="password" value="{{ old('password') }}"
                            placeholder="Enter password" name="password">
                        @error('password')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">

                    <div class="col-sm-6">
                        <label for="dob" class="">Date of Birth :</label>
                        <input type="date" class="form-control" id="dob" value="{{ old('dob') }}"
                            placeholder="Enter birth date" name="dob">
                        @error('dob')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6  ">
                        <label for="gender" class="">gender :</label>
                        <div class="mt-1 d-flex flex-wrap  justify-content-around ">
                        <div class="">
                            <label for="gender" class="">Male</label>
                            <input type="radio" class="" name="gender" id="male" value="male"
                            {{ old('gender') == 'male' ? 'checked' : '' }}>
                        </div>
                        <div>

                                <label for="gender" class="">Female</label>
                                <input type="radio" name="gender" id="male" value="female"
                                {{ old('gender') == 'female' ? 'checked' : '' }}>
                            </div>
                            <div>
                                <label for="gender" class="">Other</label>
                                <input type="radio" name="gender" id="male" value="other"
                                {{ old('gender') == 'other' ? 'checked' : '' }}>
                            </div>


                            @error('gender')
                            <span class="text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-6">

                        <label for="number" class="">Number :</label>
                        <input type="number" class="form-control" id="number" value="{{ old('number') }}"
                            placeholder="Enter number" name="number">
                        @error('number')
                            <span class="text-danger ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="file" class=""> Profile Image :</label>
                        <input type="file" class="form-control" id="file" name="file">
                        @error('file')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col mt-3 ">

                        <button type="submit" class="btn btn-success w-100">Submit</button>

                    </div>

                </div>
                <div class="mt-3 d-flex justify-content-center">

                    <span class="text"> Already have an account?
                        <a href="{{ route('login') }}" class="text-decoration-none">Login Now</a>
                    </span>
                </div>
            </div>
        </form>

    </div>
    </div>
@endsection
