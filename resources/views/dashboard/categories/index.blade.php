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
            <h1>Daftar Kategori</h1>
            <a class="btn btn-primary my-3" href="categories/create">Tambah Kategori</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Categories
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Name</th>
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
                                                        href="{{ route('categories.edit', $d->id) }}">Edit</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('categories.show', $d->id) }}">Detail</a></li>
                                                <li>
                                                    <form class='mt2' onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('categories.destroy', $d->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type='submit' class='btn btn-danger'>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            @else
                                                <li><a class="dropdown-item"
                                                        href="{{ route('categories.show', $d->id) }}">Detail</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $d->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection