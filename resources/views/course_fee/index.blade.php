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
                            Course Fees
                        </h5>
                        <a href="{{route('course_fee.create')}}" class="btn btn-primary ms-auto">
                            Add Course Fee
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                <th>ID</th>
                                <th>Course</th>
                                <th>Description</th>
                                <th>Level</th>
                                <th>FeeType</th>
                                <th>Amount</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach($courseFees as $courseFee)
                                    <tr>
                                        <td>{{$courseFee->id}}</td>
                                        <td>{{$courseFee->course}}</td>
                                        <td>{{$courseFee->description}}</td>
                                        <td>{{$courseFee->level}}</td>
                                        <td>{{$courseFee->fee_type}}</td>
                                        <td>{{$courseFee->amount}}</td>
                                        <td><a class="btn btn-warning" href="{{route('course_fee.edit' , [$courseFee])}}">Edit</a></td>
                                        <td>
                                            <form action="{{ route('course_fee.destroy', [$courseFee]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course_fee?');">
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

    @push('scripts')
        <script src="{{asset('assets/jquery.js')}}"></script>
        <script src="{{asset('assets/datatables.js')}}"></script>

        <script>
            $("#table").DataTable();
        </script>
    @endpush

@endsection
