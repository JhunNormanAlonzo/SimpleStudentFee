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
                        <form action="{{route('payment.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <select name="student_id" class="form-select" id="">
                                        <option disabled selected>-- Select Student --</option>
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">{{$student->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 mb-3">
                                    <select name="course_fee_id" class="form-select" id="">
                                        <option disabled selected>-- Select Course Fee --</option>
                                        @foreach($courseFees as $courseFee)
                                            <option value="{{$courseFee->id}}">{{$courseFee->course . " | " . $courseFee->level . " | " . $courseFee->amount}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" name="amount" placeholder="amount">
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" name="remarks" placeholder="remarks">
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="date" class="form-control" name="payment_date" placeholder="payment_date">
                                </div>

                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
