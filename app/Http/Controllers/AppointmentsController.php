<?php

namespace BullsEye\Http\Controllers;

use BullsEye\Appointment;
use BullsEye\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use BullsEye\Http\Requests\StoreAppointmentsRequest;
use BullsEye\Http\Requests\UpdateAppointmentsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use BullsEye\Invoice;
use BullsEye\Employee;
use BullsEye\Em_service;
use BullsEye\Gpr_service;
use BullsEye\Cement_service;
use BullsEye\Pel;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of Appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (! Gate::allows('appointment_access')) {
//            return abort(401);
//        }

        $appointments = Appointment::all();

        if (Auth::id() == 2) //admin
        {

            /* $em = Em_service::orderBy('created_at', 'desc')->paginate(10);*/
            /*$em = DB::table('em_service')
                ->Join('users', 'em_service.user_id', '=', 'users.id')->leftJoin('employee', 'em_service.employee_id', '=', 'employee.id')->select('em_service.*','users.name','users.email','employee.employee_Name')
                ->orderBy('created_at', 'desc')
                ->paginate(10);*/
            $em = Em_service::orderBy('created_at', 'desc')->get();

            $cement = Cement_service::orderBy('created_at', 'desc')->get();
            $gpr = Gpr_service::orderBy('created_at', 'desc')->get();
            $pel = Pel::orderBy('created_at', 'desc')->get();
            //return view('admin.appointments.index', compact('em','cement','gpr'));
        }

        return view('admin.appointments.index', compact('appointments','em','cement','gpr','pel'));
    }

    /**
     * Show the form for creating new Appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if (! Gate::allows('appointment_create')) {
//            return abort(401);
//        }
        $relations = [
            'clients' => User::get()
        ];

        return view('admin.appointments.create', $relations);
    }

    /**
     * Store a newly created Appointment in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentsRequest $request)
    {
//        if (! Gate::allows('appointment_create')) {
//            return abort(401);
//        }

        $appointment = new Appointment;
        $appointment->client_id = $request->client_id;
        $appointment->start_time = "".$request->date." ".$request->starting_hour .":".$request->starting_minute.":00";
        $appointment->finish_time = "".$request->date." ".$request->finish_hour .":".$request->finish_minute.":00";
        $appointment->comments = $request->comments;
        $appointment->save();



        return redirect()->route('appointments.index');
    }


    /**
     * Show the form for editing Appointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        if (! Gate::allows('appointment_edit')) {
//            return abort(401);
//        }
        $relations = [
            'clients' => User::get()->pluck('name', 'id')->prepend('Please select', '')
        ];

        $appointment = Appointment::findOrFail($id);

        return view('admin.appointments.edit', compact('appointment') + $relations);
    }

    /**
     * Update Appointment in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentsRequest $request, $id)
    {
//        if (! Gate::allows('appointment_edit')) {
//            return abort(401);
//        }
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());



        return redirect()->route('appointments.index');
    }


    /**
     * Display Appointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        if (! Gate::allows('appointment_view')) {
//            return abort(401);
//        }
        $relations = [
            'clients' => User::get()->pluck('name', 'id')->prepend('Please select', '')
        ];

        $appointment = Appointment::findOrFail($id);

        return view('admin.appointments.show', compact('appointment') + $relations);
    }


    /**
     * Remove Appointment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        if (! Gate::allows('appointment_delete')) {
//            return abort(401);
//        }
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index');
    }

    /**
     * Delete all selected Appointment at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
//        if (! Gate::allows('appointment_delete')) {
//            return abort(401);
//        }
        if ($request->input('ids')) {
            $entries = Appointment::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
