@extends('layout.master_dashboard')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex flex-row justify-content-between">
            <h1>Daftar Kategori</h1>
            <a class="btn btn-primary my-3" href="slider/create">Tambah Kategori</a>
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
                                    <a class="btn btn-primary" href="{{ route('categories.show', $d->id) }}">Detail</a>
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