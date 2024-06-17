<?php

namespace App\Http\Controllers;

use App\Models\CourseFee;
use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Student;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $courseFees = CourseFee::all();
        return view('payment.create', compact('students', 'courseFees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $studentId = $request->student_id;
        $student = Student::find($studentId);
        $courseFee = CourseFee::find($request->course_fee_id);

        Payment::create([
            'student_id' => $student->id,
            'course_fee_id' => $courseFee->id,
            'student_ef_number' => $courseFee->id,
            'amount' => $request->amount,
            'remarks' => $request->remarks,
            'payment_date' => $request->payment_date,
        ]);
        return redirect()->route('payment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        return view('payment.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update([
            'student_id' => $request->student_id,
            'course_fee_id' => $request->course_fee_id,
            'student_ef_number' => $request->student_ef_number,
            'amount' => $request->amount,
            'remarks' => $request->remarks,
            'payment_date' => $request->payment_date,
        ]);
        return redirect()->route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payment.index');
    }
}
