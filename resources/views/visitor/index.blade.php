@extends('layouts.app')

@section('content')
    <div class="text-center mb-5">
        <a href="{{ route('index') }}"><img src="img/ITTS-logo.png" alt="" width="200"></a>
        <h1 class="fw-bold">BUKU TAMU</h1>
        <h2>INSTITUT TEKNOLOGI TANGERANG SELATAN</h2>
    </div>


    <div class="row justify-content-center mb-3">
        <div class="col-md-6 border p-3">
            @include('layouts.alert')
            <form action="{{ route('checkIn') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda"
                        required>
                    <label for="name" class="text-center">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="institution" name="institution"
                        placeholder="Asal Institusi" required>
                    <label for="institution" class="text-center">Institusi</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email Anda"
                        required>
                    <label for="email" class="text-center">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Telepon"
                        required>
                    <label for="phone" class="text-center">Nomor Telepon</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Keperluan"
                        required>
                    <label for="purpose" class="text-center">Keperluan</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="arrival_date" name="arrival_date"
                        placeholder="Tanggal Kedatangan" required>
                    <label for="arrival_date" class="text-center">Tanggal Kedatangan</label>
                </div>
                <button class="btn btn-primary w-100" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
