@extends('students.layout')

@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }} ">
@endsection
@if (session('error'))
    <div class="alert alert-danger d-flex text-wrap   alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        {{ session('error') }}

    </div>
@endif
@if (session('success'))
    <div class="alert alert-success d-flex text-wrap   alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        {{ session('success') }}

    </div>
@endif
<div class="container-sm d-flex flex-wrap justify-content-center align-items-center " style="height: 100vh">

    <form action="{{ route('post.login') }}" method="POST" style="max-height:338px" onsubmit="return validateLogin(event)">
        @csrf
        <div class="container-sm  p-4 rounded-3 border-1  border-black "
            style="background-color: rgb(240, 241, 236);">
            <h2 class="text-center">Login</h2>


            <div class="row" style="max-width: 400px">

                <div class="col-sm-12 ">
                    <label for="email" class="">Email:</label>
                    <input type="text" class="form-control" id="email" value="{{ old('email') }}"
                        placeholder="Enter email" name="email">
                        <span class="text-danger text-sm" id="emailErr"> @error('email'){{ $message }}  @enderror</span>

                </div>
                <div class="col-sm-12 mt-3">
                    <label for="password" class="">Password:</label>
                    <input type="text" class="form-control" id="password" value="{{ old('password') }}"
                        placeholder="Enter password" name="password">
                        <span class="text-danger text-sm" id="passwordErr"> @error('password'){{ $message }}  @enderror</span>

                </div>

                <div class="col-sm-12 mt-3">
                    <div class="col mt-3 ">

                        <button type="submit" class="btn btn-success w-100">Submit</button>

                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center">

                    <span class="text"> Don't have an account?
                        <a href="{{ route('students.create') }}" class="text-decoration-none">Register Now</a>
                    </span>
                </div>
            </div>



        </div>

    </form>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/login_validation.js') }}"></script>
@endsection
