<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Buku Tamu ITTS',
        ];
        return view('visitor.index')->with($data);
    }

    public function store(Request $request)
    {
        $visitorRules = [
            'name' => 'required',
            'institution' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];

        $appointmentRules = [
            'purpose' => 'required',
            'arrival_date' => 'required',
        ];

        $visitor = null;

        $validatedVisitor = $request->validate($visitorRules);
        if ($validatedVisitor) {
            $visitor = Visitor::create($validatedVisitor);
        }

        if ($visitor) {
            $validatedAppointment = $request->validate($appointmentRules);
            if ($validatedAppointment) {
                $validatedAppointment['visitor_id'] = $visitor->id;
                Appointment::create($validatedAppointment);
                return redirect()->route('visitor')->with(['success' => 'Check-in Berhasil']);
            }
        }

        return back()->with(['error' => 'Check-in Gagal']);
    }
}
