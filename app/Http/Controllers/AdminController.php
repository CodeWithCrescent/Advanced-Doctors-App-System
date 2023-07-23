<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\models\User;
use App\models\Doctor;
use App\models\Client;
use App\models\Department;
use App\models\Speciality;
use App\models\Office;
use App\models\Session;

class AdminController extends Controller
{
    /**
     * Display Pages of Admin Views.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::latest('created_at')->get();
        $doctors = Doctor::latest('created_at')->get();
        $appointments = Appointment::latest('created_at')->get();
        $clients = Client::latest('created_at')->get();
        return view('pages.admin.dashboard', compact('sessions', 'doctors', 'appointments', 'clients'));
    }

    public function viewDoctors()
    {
        $datas = DB::table('doctors')->join('users', 'doctors.user_id', '=', 'users.id')
                                    ->join('specialities', 'doctors.speciality_id', '=', 'specialities.speciality_id')
                                    ->join('departments', 'doctors.department_id', '=', 'departments.department_id')
                                    ->join('offices', 'doctors.office_id', '=', 'offices.office_id')
                                    ->select('doctors.*', 'users.*','offices.*','specialities.*','departments.*')
                                    ->latest('doctors.created_at')
                                    ->get();
        return view('pages.admin.view-doctors', compact('datas'));
    }

    public function viewSessions()
    {
        $datas = DB::table('sessions')->join('doctors', 'sessions.doctor_id', '=', 'doctors.doctor_id')
                                    ->join('users', 'users.id', '=', 'doctors.user_id')
                                    ->select('sessions.*', 'users.*')
                                    // ->latest('sessions.scheduled_date')
                                    ->get();
        return view('pages.admin.view-sessions', compact('datas'));
    }

    public function viewAppointments()
    {
        $datas = DB::table('clients')->join('users', 'clients.user_id', '=', 'users.id')
                                    ->join('appointments', 'appointments.client_id', '=', 'clients.user_id')
                                    ->select('clients.*', 'users.*', 'appointments.*')
                                    ->latest('clients.created_at')
                                    ->get();

        return view('pages.admin.view-appointments', compact('datas'));
    }

    public function overviewSettings()
    {
        $specialities = DB::table('specialities')->join('departments', 'specialities.department_id', '=', 'departments.department_id')
        ->select('departments.*', 'specialities.*')->latest('specialities.created_at')->get();

        $offices = DB::table('offices')->join('departments', 'offices.department_id', '=', 'departments.department_id')    
            ->select('departments.*', 'offices.*')->latest('offices.created_at')->get();

        $departments = Department::latest('created_at')->get();

        return view('pages.admin.overview-settings', compact('departments','specialities','offices'));
    }

    public function viewClients()
    {
        $datas = DB::table('clients')->join('users', 'clients.user_id', '=', 'users.id')
                                    ->select('clients.*', 'users.*')
                                    ->latest('clients.created_at')
                                    ->get();

        return view('pages.admin.clients', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addDoctorPage()
    {
        $departments = Department::latest('created_at')->get();
        $offices = Office::latest('created_at')->get();
        return view('pages.admin.add-doctor', compact('departments','offices'));
    }
    public function GetOffices($departmentId)
    {
        $department_offices = Office::where('department_id', $departmentId)->get();
        return response()->json($department_offices);
    }
    public function GetSpeciality($departmentId)
    {
        $department_specialities = Speciality::where('department_id', $departmentId)->get();
        return response()->json($department_specialities);
    }

    function addSessionPage() 
    {
        $doctors = DB::table('doctors')->join('users', 'doctors.user_id', '=', 'users.id')    
                                        ->select('users.*', 'doctors.*')->latest('doctors.created_at')->get();

        return view('pages.admin.add-session',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddDepartment(Request $request)
    {
        $request->validate([
            'department' => 'required',
        ]);

        $department = Department::create([
            'department_name' => $request->input('department'),
            'added_by' => Auth()->user()->firstname.' '.Auth()->user()->lastname,
        ]);
    
        return redirect()->back()->with('status', 'Department Added Successfully!');
    }
    public function AddSpeciality(Request $request)
    {
        $request->validate([
            'speciality_name' => 'required|unique:specialities|max:255',
            'department' => 'required|exists:departments,department_id',
        ]);

        $speciality = new Speciality([
            'speciality_name' => $request->input('speciality_name'),
            'department_id' => $request->input('department'),
            'added_by' => Auth()->user()->firstname.' '.Auth()->user()->lastname,
        ]);
        $speciality->save();
    
        return redirect()->back()->with('status', 'Speciality Added Successfully!');
    }
    public function AddOffice(Request $request)
    {
        $request->validate([
            'office_name' => 'required|unique:offices|max:255',
            'department' => 'required|exists:departments,department_id',
        ]);

        $office = Office::create([
            'office_name' => $request->input('office_name'),
            'department_id' => $request->input('department'),
            'added_by' => Auth()->user()->firstname.' '.Auth()->user()->lastname,
        ]);
    
        return redirect()->back()->with('status', 'Office Added Successfully!');
    }
    //---------- Add Doctor Action -------------//
    public function AddDoctor()
    {
        $departments = Department::latest('created_at')->get();
        $offices = Office::latest('created_at')->get();
        return view('pages.add-doctor',compact('departments','offices'));
    }

    public function AddSession()
    {
        $doctors = DB::table('doctors')->join('users', 'doctors.user_id', '=', 'users.id')    
                                        ->select('users.*', 'doctors.*')->latest('doctors.created_at')->get();

        return view('pages.add-session',compact('doctors'));
    }

    /**
     * Store a newly created Session in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddSessionAction(Request  $request)
    {
        $validate = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'maximum_bookings' => 'required|numeric|min:1',
            'doctor' => 'required|exists:doctors,doctor_id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $session = new Session([
            'scheduled_date' => $request->input('date'),
            'doctor_id' => $request->input('doctor'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'maximum_bookings' => $request->input('maximum_bookings'),
            'description' => $request->input('description'),
            'added_by' => Auth()->user()->firstname.' '.Auth()->user()->lastname,
        ]);

        $session->save();

        return redirect()->back()->with('status', 'Session Successfully Created!');
    }

    /**
     * Store a newly created Doctor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddDoctorAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'speciality_name' => 'required',
        ]);

        // Convert the request to an array
        $data = $request->input('name');

        $name = explode(' ', $request['name']);
        if (count($name) == 3) {
            $firstname = $name[0];
            $middlename = $name[1];
            $lastname = $name[2];
        } elseif (count($name) == 2) {
            $firstname = $name[0];
            $middlename = null;
            $lastname = $name[1];
        } elseif (count($name) == 1) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Invalid!']);
        } else {
            return redirect()->back()->withInput()->withErrors(['name' => 'Only maximum of three names required']);
        }

        $user = User::create([
            'role' => '1',
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'initial' => $request->input('initial'),
            // 'gender' => $request->input('gender'),
            'password' => Hash::make('123456'),
        ]);

        $doctor = new Doctor([
            'employee_no' => $request->input('employee_number'),
            'speciality_id' => $request->input('speciality_name'),
            'department_id' => $request->input('department'),
            'office_id' => $request->input('office_name'),
            'registered_by' => Auth()->user()->firstname.' '.Auth()->user()->lastname,
        ]);

        $user->doctor()->save($doctor);

        return redirect()->back()->with('status', 'Doctor Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
