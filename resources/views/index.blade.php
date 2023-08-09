@extends('layouts.app')

@section('content')
    <div class="text-center mb-5">
        <img src="img/ITTS-logo.png" alt="" width="200">
        <h1 class="fw-bold">BUKU TAMU</h1>
        <h2>INSTITUT TEKNOLOGI TANGERANG SELATAN</h2>
    </div>

    @include('layouts.alert')

    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card text-center">
                <div class="card-body p-5 pb-3">
                    <span class="p-4 rounded-circle bg-danger text-center text-light">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <h4 class="mt-5">Admin</h4>
                </div>
                <div class="card-footer p-0">
                    <button class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-center">
                <div class="card-body p-5 pb-3">
                    <span class="p-4 rounded-circle bg-primary text-center text-light">
                        <i class="fa-solid fa-users"></i>
                    </span>
                    <h4 class="mt-5">Visitor</h4>
                </div>
                <div class="card-footer p-0">
                    <a href="{{ route('visitor') }}" class="btn btn-dark w-100">Login <i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Login Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Username Anda" required>
                        <label for="username" class="text-center">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Admin Password" required>
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
