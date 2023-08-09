@extends('layouts.admin')

@section('main')
    <!-- Add Admin Button -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAdmin">
        <i class="fa-solid fa-add"></i> Add Admin
    </button>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Username</th>
        </thead>
        <tbody>
            @foreach ($users as $i => $user)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<!-- Add Admin Modal -->
<div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addAdminLabel">Add Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.registerAdmin') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Admin Name">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Admin Username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Admin Password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
