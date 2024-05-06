@extends('students.layout')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Server Side Datatables </h3>
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
                            <th>profile_picture</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('datatable.getdata') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'email', name: 'email' },
            { data: 'dob', name: 'dob' },
            { data: 'contact_number', name: 'contact_number' },
            { data: 'image', name: 'image', orderable: false, searchable: false }

        ]
    });
});

</script>
@endsection
