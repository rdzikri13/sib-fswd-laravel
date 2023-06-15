@extends('layout.master_dashboard')

@section('title', 'Daftar User')

@section('content')
    <div class="container-fluid px-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
                                    <div class="dropdown">
                                        <button class="btn btn-warning dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            @if (auth()->user()->role == 'admin')
                                                <li><a class="dropdown-item"
                                                        href="{{ route('user.edit', $d->id) }}">Edit</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('user.show', $d->id) }}">Detail</a>
                                                </li>
                                                <li>
                                                    <form class='mt-2' onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('user.destroy', $d->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type='submit' class='btn btn-danger'>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            @else
                                                <li><a class="dropdown-item"
                                                        href="{{ route('user.show', $d->id) }}">Detail</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
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