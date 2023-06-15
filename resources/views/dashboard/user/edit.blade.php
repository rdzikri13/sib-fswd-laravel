@extends('layout.master_dashboard')
@section('title', 'Edit User')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Data User</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input class="form-control" type="hidden" name="id" id="id" value="{{ $data['id'] }}">
            <label for="name">Nama Lengkap</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $data['name'] }}">
            <div class="row g-2">
                <div class="col">
                    <label for="role">Role</label>
                    <select id="role" class="form-select form-control" aria-label="Default select example"
                        name="role">
                        <option selected><b>--Pilih Role--</b></option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="col">
                    <label for="">Password</label>
                    <input class="form-control" type="password" name="password" id="name"
                        value="{{ $data['password'] }}">
                </div>
            </div>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="{{ $data['email'] }}">
            <label for="address">Alamat Lengkap</label>
            <textarea class="form-control" name="address" id="address" cols="30" rows="3">{{ $data['address'] }}</textarea>
            <label for="avatar">Avatar</label>
            <input type="file" class="form-control" id="inputGroupFile04" name="avatar"
                aria-describedby="inputGroupFileAddon04" aria-label="Upload">

            <button type="submit" name="submit" class="btn btn-primary mt-4">Edit Data</button>
        </form>
    </div>
@endsection