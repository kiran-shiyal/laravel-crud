@extends('students.layout')
@section('title', 'Update From')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }} ">
@endsection

@section('content')
    <div class="container-sm  d-flex justify-content-center align-items-center  " style="height: 100vh">

        <form method="POST" action="{{ route('students.update',$student->id) }}" enctype="multipart/form-data"  >
            @csrf
            @method('PUT')
         <div class="form border border-1  p-3 rounded-2" style="background-color: rgb(240, 241, 236)">
            <input type="hidden" name="id" value="{{ $student->id }}">
                <h2 class="text-center mb-5 text-black">Update From</h2>
                <div class="row ">

                    <div class="col-sm-6">
                        <label for="firstName" class="">firstName:</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Enter firstName"
                            name="editFirstName" value="{{ $student->first_name }}">
                        @error('editFirstName')
                            <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 ">

                        <label for="lastName" class="">lastName:</label>
                        <input type="text" class="form-control" id="lastName" value="{{ $student->last_name}}"
                            placeholder="Enter lastName" name="editLastName">
                        @error('editLastName')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <label for="email" class="">Email:</label>
                        <input type="text" disabled class="form-control" id="email" value="{{ $student->email }}"
                            placeholder="Enter email" name="email">
                        @error('email')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class=" col-sm-6">
                        <label for="dob" class="">Date of Birth :</label>
                        <input type="date" class="form-control" id="dob" value="{{ $student->dob }}"
                            placeholder="Enter birth date" name="editDob">
                        @error('editDob')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">

                    <div class="col-sm-6">
                        <label for="number" class="">Number :</label>
                        <input type="number" class="form-control" id="number" value="{{ $student->contact_number }}"
                            placeholder="Enter number" name="editNumber">
                        @error('number')
                            <span class="text-danger ">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6  ">
                        <label for="gender" class="">gender :</label>
                        <div class="mt-1 d-flex flex-wrap  justify-content-around ">
                        <div class="">
                            <label for="gender" class="">Male</label>
                            <input type="radio" class="" name="editGender" id="male" value="male"
                            {{  $student->gender == 'male' ? 'checked' : '' }}>
                        </div>
                        <div>

                                <label for="gender" class="">Female</label>
                                <input type="radio" name="editGender" id="male" value="female"
                                {{  $student->gender == 'female' ? 'checked' : '' }}>
                            </div>
                            <div>
                                <label for="gender" class="">Other</label>
                                <input type="radio" name="editGender" id="male" value="other"
                                {{  $student->gender == 'other' ? 'checked' : '' }}>
                            </div>


                            @error('editGender')
                            <span class="text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-3">

                    <div class="col-sm-6">
                        <label for="file" class=""> Profile Image :</label>
                        <input type="file" class="form-control" id="file" name="image">
                        @error('image')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <img width="100" height="100" src="{{ url('storage/'. $student->profile_picture) }}" width="40%">
                    </div>

                </div>
                <div class="row mt-3 ">
                    <div class="col mt-3 ">
                        <button type="submit" class="btn btn-success w-100">Update</button>
                    </div>
            </div>
        </form>

    </div>
    </div>
@endsection
