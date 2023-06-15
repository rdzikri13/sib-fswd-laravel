@extends('layout.master_dashboard')
@section('title', 'Daftar Produk')

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
                            <th>Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Condition (%)</th>
                            <th>Quantity</th>
                            <th>Year</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Verified By</th>
                            <th>Verified At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $user)
                            <tr>
                                <td>{{ $user->categories_name }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->description }}</td>
                                <td>{{ $user->price }}</td>
                                <td>{{ $user->condition_scale }}</td>
                                <td>{{ $user->year }}</td>
                                <td>{{ $user->qty }}</td>
                                <td><img class="w-100 rounded" src="/storage/products/{{ $user->img }}" alt="profil-users">
                                </td>
                                <td>{{ $user->status }}</td>
                                <td>{{ $user->created_by }}</td>
                                <td>{{ $user->verified_by }}</td>
                                <td>{{ $user->verified_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection