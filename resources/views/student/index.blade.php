@extends('layouts.app')

@push('styles')
    <link href="{{asset('assets/datatables.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <br><br><br><br>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header d-flex">
                        <h5 class="card-title">
                            Students
                        </h5>
                        <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addStudent">
                            Add Student
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->id_number}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->contact_number}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->address}}</td>
                                        <td><a class="btn btn-warning" href="{{route('student.edit' , [$student])}}">Edit</a></td>
                                        <td>
                                            <form action="{{ route('student.destroy', [$student]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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

    <form action="{{route('student.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="modal fade" id="addStudent">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Add Student
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="ID Number" name="id_number">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Contact Number" name="contact_number">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Address" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
        <script src="{{asset('assets/jquery.js')}}"></script>
        <script src="{{asset('assets/datatables.js')}}"></script>

        <script>
            $("#table").DataTable();
        </script>
    @endpush

@endsection
