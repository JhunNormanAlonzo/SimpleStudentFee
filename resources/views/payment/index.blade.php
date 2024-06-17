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
                            Payment
                        </h5>
                        <a href="{{route('payment.create')}}" class="btn btn-primary ms-auto">
                            Add Payment
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                <th>ID</th>
                                <th>Student</th>
                                <th>EFNumber</th>
                                <th>Course</th>
                                <th>Level</th>
                                <th>Amount</th>
                                <th>Remarks</th>
                                <th>PaymentDate</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{$payment->id}}</td>
                                        <td>{{$payment->student->name}}</td>
                                        <td>{{$payment->courseFee->id}}</td>
                                        <td>{{$payment->courseFee->course}}</td>
                                        <td>{{$payment->courseFee->level}}</td>
                                        <td>{{$payment->amount}}</td>
                                        <td>{{$payment->remarks}}</td>
                                        <td>{{$payment->payment_dateg}}</td>
                                        <td><a class="btn btn-warning" href="{{route('payment.edit' , [$payment])}}">Edit</a></td>
                                        <td>
                                            <form action="{{ route('payment.destroy', [$payment]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment?');">
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
