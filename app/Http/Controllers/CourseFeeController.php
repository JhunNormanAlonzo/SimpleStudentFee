<?php

namespace App\Http\Controllers;

use App\Models\CourseFee;
use App\Http\Requests\StoreCourseFeeRequest;
use App\Http\Requests\UpdateCourseFeeRequest;

class CourseFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseFees = CourseFee::all();
        return view('course_fee.index', compact('courseFees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course_fee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseFeeRequest $request)
    {
        CourseFee::create([
            'course' => $request->course,
            'level' => $request->level,
            'description' => $request->description,
            'fee_type' => $request->fee_type,
            'amount' => $request->amount,
        ]);

        return redirect()->route('course_fee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseFee $courseFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseFee $courseFee)
    {
        return view('course_fee.edit', compact('courseFee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseFeeRequest $request, CourseFee $courseFee)
    {
        $courseFee->update([
            'course' => $request->course,
            'level' => $request->level,
            'description' => $request->description,
            'fee_type' => $request->fee_type,
            'amount' => $request->amount,
        ]);

        return redirect()->route('course_fee.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseFee $courseFee)
    {
        $courseFee->delete();
        return redirect()->route('course_fee.index');

    }
}
