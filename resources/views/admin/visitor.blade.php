@extends('layouts.admin')

@section('toolbar')
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="input-group">
            <input class="form-control" type="date" name="date" id="inputDate">
            <button class="btn btn-sm btn-outline-secondary"
                onclick="filterDate('inputDate', 'visitorTable')">Filter</button>
            <button class="btn btn-sm btn-outline-secondary" onclick="resetFilter('inputDate', 'visitorTable')">Reset</button>
        </div>
    </div>
@endsection

@section('main')
    <table class="table" id="visitorTable">
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
