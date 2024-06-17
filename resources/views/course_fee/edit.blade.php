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
                            Course Fee
                        </h5>

                    </div>
                    <div class="card-body">
                        <form action="{{route('course_fee.update', [$courseFee->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" value="{{$courseFee->course}}" name="course" placeholder="course">
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" value="{{$courseFee->description}}" name="description" placeholder="description">
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" value="{{$courseFee->level}}" name="level" placeholder="level">
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" value="{{$courseFee->fee_type}}" name="fee_type" placeholder="fee_type">
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" value="{{$courseFee->amount}}" name="amount" placeholder="amount">
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
