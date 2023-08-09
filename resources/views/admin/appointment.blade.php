@extends('layouts.admin')

@section('main')
    <h5>Pending <span class="bg-info text-light px-1 rounded">{{ count($pendingAppointments) }}</span></h5>
    <table class="table">
        <thead>
            <th>#</th>
            <th>Nama</th>
            <th>Institusi</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Keperluan</th>
            <th>Tanggal Kedatangan</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($pendingAppointments as $i => $appointment)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $appointment->visitor->name }}</td>
                    <td>{{ $appointment->visitor->institution }}</td>
                    <td>{{ $appointment->visitor->email }}</td>
                    <td>{{ $appointment->visitor->phone }}</td>
                    <td>{{ $appointment->purpose }}</td>
                    <td>{{ $appointment->arrival_date }}</td>
                    <td>
                        <form action="{{ route('admin.approve', ['appointment' => $appointment]) }}" method="POST">
                            @csrf
                            <button class="btn btn-success" onclick="return confirm('Approve?')">Approve</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.deny', ['appointment' => $appointment]) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Deny?')">Deny</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5>Approved <span class="bg-success text-light px-1 rounded">{{ count($approvedAppointments) }}</span></h5>
    <table class="table">
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
            @foreach ($approvedAppointments as $i => $appointment)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $appointment->visitor->name }}</td>
                    <td>{{ $appointment->visitor->institution }}</td>
                    <td>{{ $appointment->visitor->email }}</td>
                    <td>{{ $appointment->visitor->phone }}</td>
                    <td>{{ $appointment->purpose }}</td>
                    <td>{{ $appointment->arrival_date }}</td>
                    <td class="fw-bold text-success">{{ $appointment->status }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5>Denied <span class="bg-danger text-light px-1 rounded">{{ count($deniedAppointments) }}</span></h5>
    <table class="table">
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
            @foreach ($deniedAppointments as $i => $appointment)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $appointment->visitor->name }}</td>
                    <td>{{ $appointment->visitor->institution }}</td>
                    <td>{{ $appointment->visitor->email }}</td>
                    <td>{{ $appointment->visitor->phone }}</td>
                    <td>{{ $appointment->purpose }}</td>
                    <td>{{ $appointment->arrival_date }}</td>
                    <td class="fw-bold text-danger">{{ $appointment->status }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
