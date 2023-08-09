<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        return back()->with(['error' => 'Login Failed']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }

    public function index()
    {
        $appointments = Appointment::orderBy('created_at', 'DESC')->get();
        $data = [
            'title' => 'Dashboard',
            'visitors' => $appointments->where('status', '!=', 'pending'),
            'appointments' => $appointments,
        ];
        return view('admin.index')->with($data);
    }

    public function visitor()
    {
        $appointments = Appointment::where('status', '=', 'approved')->orderBy('updated_at', 'DESC')->get();
        $data = [
            'title' => 'Visitors',
            'appointments' => $appointments,
        ];
        return view('admin.visitor')->with($data);
    }


    public function appointment()
    {
        $pendingAppointments = Appointment::where('status', '=', 'pending')->orderBy('updated_at', 'DESC')->get();
        $approvedAppointments = Appointment::where('status', '=', 'approved')->orderBy('updated_at', 'DESC')->get();
        $deniedAppointments = Appointment::where('status', '=', 'denied')->orderBy('updated_at', 'DESC')->get();
        $data = [
            'title' => 'Appointments',
            'pendingAppointments' => $pendingAppointments,
            'approvedAppointments' => $approvedAppointments,
            'deniedAppointments' => $deniedAppointments,
        ];
        return view('admin.appointment')->with($data);
    }


    public function manage()
    {
        $users = User::all();
        $data = [
            'title' => 'Manage Admin',
            'users' => $users,
        ];
        return view('admin.manage')->with($data);
    }

    public function registerAdmin(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ];

        $validated = $request->validate($rules);
        if ($validated) {
            $validated['password'] = bcrypt($validated['password']);
            User::create($validated);
            return redirect()->route('admin.manage')->with(['success' => 'Admin Added']);
        }
        return back()->with(['error' => 'Failed add admin']);
    }

    public function approve(Appointment $appointment)
    {
        $appointment->update([
            'status' => 'approved',
            'verified_by' => auth()->user()->name,
        ]);
        return redirect()->route('admin.appointment')->with(['success' => 'Appointment Approved']);
    }

    public function deny(Appointment $appointment)
    {
        $appointment->update([
            'status' => 'denied',
            'verified_by' => auth()->user()->name,
        ]);
        return redirect()->route('admin.appointment')->with(['error' => 'Appointment Denied']);
    }
}
