@extends('students.layout')
@section('title', 'users list')

@section('content')
<nav class="navbar navbar-expand-sm navbar-dark bg-dark" id ="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
        </ul>
        <form class="d-flex">
        <div class = "info text-white">
            {{ Auth::user()->first_name }}
            {{ Auth::user()->last_name }}
           <a href="{{ route('logout') }}" class="btn btn-danger" id="logout-link">Logout</a>
        </form>
      </div>
    </div>
  </nav>
  @if(session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

 {{ session('success') }}

  </div>
  @endif
<div class="container-sm mt-3">
    <div class="row justify-content-center flex-wrap">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Dob</th>
                                <th>number</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->dob }}</td>
                                <td>{{ $user->contact_number }}</td>

                                <td> <img src="{{ asset('storage/app/public/' . $user->profile_picture) }}"> </td>
                                <td>
                                    <a href="{{ route('students.edit', $user->id) }}" class="btn btn-primary ">Edit</a>
                                    <a href="{{ route('students.destroy', $user->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                    {{-- <form action="{{ route('students.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
