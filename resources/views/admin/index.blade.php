@extends('layouts.admin')

@section('main')
    <div class="row gx-2 text-light text-center">
        <div class="col-md-4">
            <div class="bg-success rounded p-5">
                <h4>Total Visitor</h4>
                <h1>{{ count($visitors) }}</h1>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-primary rounded p-5">
                <h4>Total Appointment</h4>
                <h1>{{ count($appointments) }}</h1>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-danger rounded p-5">
                <h4>Pending Appointment</h4>
                <h1>{{ count($appointments->where('status', 'pending')) }}</h1>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="d-flex justify-content-between">
            <h5>Appointment Lists</h5>
            <div class="btn-toolbar">
                <div class="input-group">
                    <input class="form-control" type="date" name="date" id="inputDate">
                    <button class="btn btn-sm btn-outline-secondary" onclick="filterDate()">Filter</button>
                    <button class="btn btn-sm btn-outline-secondary" onclick="resetFilter()">Reset</button>
                </div>
            </div>
        </div>
        <table class="table" id="appointmentTable">
            <thead>
                <th>#</th>
                <th>Nama</th>
                <th>Institusi</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Keperluan</th>
                <th>Tanggal Kedatangan</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($appointments as $i => $appointment)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $appointment->visitor->name }}</td>
                        <td>{{ $appointment->visitor->institution }}</td>
                        <td>{{ $appointment->visitor->email }}</td>
                        <td>{{ $appointment->visitor->phone }}</td>
                        <td>{{ $appointment->purpose }}</td>
                        <td>{{ $appointment->arrival_date }}</td>
                        <td>
                            <span
                                class="fw-bold {{ $appointment->status == 'approved' ? 'text-success' : 'text-danger' }}">
                                {{ $appointment->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
