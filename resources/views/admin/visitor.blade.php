@extends('layouts.admin')

@section('main')
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
                        <span class="fw-bold {{ $appointment->status == 'approved' ? 'text-success' : 'text-danger' }}">
                            {{ $appointment->status }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
