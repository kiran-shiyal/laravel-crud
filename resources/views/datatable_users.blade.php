@extends('students.layout')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3"> Datatables </h3>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered data-table" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Dob</th>
                            <th>number</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $user)
                        <tr class="">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td> {{ date('d-m-Y', strtotime($user->dob)) }}</td>
                            <td>{{ $user->contact_number }}</td>

                            <td>

                              <img width="100" height="100" src="{{ url('storage/'.$user->profile_picture) }}" width="40%">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

<script>
    $(document).ready(function () {
     $("#table").dataTable();

      });

</script>
@endsection
