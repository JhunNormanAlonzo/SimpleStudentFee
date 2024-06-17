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
                            course_fees
                        </h5>
                        <a href="{{route('course_fee.create')}}" class="btn btn-primary ms-auto">
                            Add Course Fee
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('course_fee.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" name="course" placeholder="course">
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" name="description" placeholder="description">
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" name="level" placeholder="level">
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" name="fee_type" placeholder="fee_type">
                                </div>
                                <div class="col-4 mb-3">
                                    <input type="text" class="form-control" name="amount" placeholder="amount">
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
