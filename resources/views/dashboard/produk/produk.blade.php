@extends('layout.master_dashboard')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container-fluid px-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex flex-row justify-content-between">
            <h1>Daftar Produk</h1>
            <a class="btn btn-primary my-3" href="produk/create">Tambah Produk</a>
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
                                    <div class="dropdown">
                                        <button class="btn btn-warning dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            @if (auth()->user()->role == 'admin')
                                                <li><a class="dropdown-item"
                                                        href="{{ route('produk.edit', $d->id) }}">Edit</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('produk.show', $d->id) }}">Detail</a></li>
                                                <li>
                                                    <form class='mt2' onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('produk.destroy', $d->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type='submit' class='btn btn-danger'>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('produk.show', $d->id) }}">Detail</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
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