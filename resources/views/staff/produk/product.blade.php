@extends('layout.master_dashboard')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex flex-row justify-content-between">
            <h1>Daftar Produk</h1>
            <a class="btn btn-primary my-3" href="/produk/create">Tambah Produk</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Product
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Condition (%)</th>
                            <th>Quantity</th>
                            <th>Year</th>
                            <th>Best Seller</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Verified By</th>
                            <th>Verified At</th>
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
                                    <a class="btn btn-primary" href="{{ route('staff.showProduct', $d->id) }}">Detail</a>
                                </td>
                                <td>{{ $d->categories_name }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->description }}</td>
                                <td>{{ $d->price }}</td>
                                <td>{{ $d->condition_scale }}</td>
                                <td>{{ $d->qty }}</td>
                                <td>{{ $d->year }}</td>
                                <td>
                                    @if ($d->is_best == 0)
                                        No
                                    @else
                                        Yes
                                    @endif
                                </td>
                                <td><img src="{{ asset('storage/products/' . $d->img) }}" class="w-100 rounded"
                                        alt="product-images">
                                </td>
                                <td>{{ $d->status }}</td>
                                <td>{{ $d->created_by }}</td>
                                <td>{{ $d->verified_by }}</td>
                                <td>{{ $d->verified_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection