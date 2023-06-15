@extends('layout.master_dashboard')
@section('title', 'Daftar Admin')

@section('content')
    <div class="container-fluid px-4">
        <h1>Group Users</h1>

        <h3 class="my-4">Admin</h3>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Products
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Address</th>
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
                        @foreach ($admin as $user)
                            <tr>
                                <td>{{ $user['name'] }}</td>
                                <td><img class="w-25 rounded" src="/storage/avatar/{{ $user['avatar'] }}" alt="profil-users">
                                </td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['role'] }}</td>
                                <td>{{ $user['address'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection