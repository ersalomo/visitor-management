<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\{
    StoreAppointmentRequest,
    UpdateAppointmentRequest
};

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.home.list-appointment', [
            // 'appointments' => Appointment::where('user_id', auth()->user()->id)->get(),
            'appointments' => auth()->user()->appointment()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.home.appointment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        $user =  auth()->user();
        $count_appointments = $user->appointment()
            ?->whereDate('created_at', now()->today())
            ->get(['id']) || false;

        if ($count_appointments) {
            $appointment = $user->appointment()->create([
                'purpose' => $request->purpose
            ]);
            if ($appointment) {
                return back()->with('success', 'berhasil');
            }
            return back()->with('error', 'kesalahan server');
        }
        return back()->with('error', 'tidak boleh membuat appointment lebih dari 5');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}