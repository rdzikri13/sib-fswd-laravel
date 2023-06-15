@extends('layout.master_dashboard')

@section('title', 'Daftar Staff')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex flex-row justify-content-between">
            <h1>Daftar User</h1>
            <a class="btn btn-primary my-3" href="user/create">Tambah User</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Users
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Address</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot> --}}
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('staff.showUsers', $d->id) }}">Detail</a>
                                </td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td><img src="{{ asset('storage/avatar/' . $d->avatar) }}" alt="user-avatar"
                                        class="w-25 rounded">
                                </td>
                                <td>{{ $d->address }}</td>
                                <td>{{ $d->role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection