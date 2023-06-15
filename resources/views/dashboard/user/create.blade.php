@extends('layout.master_dashboard')
@section('title', 'Tambah User')

@section('content')
    <div class="container mx-3">
        <h1 class="my-4">Tambah Data User</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" id="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" class="form-select form-control" aria-label="Default select example"
                            name="role">
                            <option selected>--Pilih Role--</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input class="form-control" type="password" name="password" id="name">
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Alamat Lengkap</label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control" id="inputGroupFile04" name="avatar"
                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-4">Tambah Data</button>
        </form>
    </div>
@endsection