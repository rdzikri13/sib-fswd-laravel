@extends('layout.master_dashboard')

@section('title', 'Daftar Slider')

@section('content')
    <div class="container-fluid px-4">
        @if (session('success'))
            <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="d-flex flex-row justify-content-between">
            <h1>Daftar Slider</h1>
            <a class="btn btn-primary my-3" href="slider/create">Tambah Slider</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Slider
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Image</th>
                            <th>Url</th>
                            <th>Status</th>
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
                                                        href="{{ route('slider.edit', $d->id) }}">Edit</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('slider.show', $d->id) }}">Detail</a></li>
                                                <li>
                                                    <form class='mt-2' onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('slider.destroy', $d->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type='submit' class='btn btn-danger'>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            @else
                                                <li><a class="dropdown-item"
                                                        href="{{ route('slider.show', $d->id) }}">Detail</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $d->title }}</td>
                                <td>{{ $d->text }}</td>
                                <td><img src="{{ asset('storage/sliders/' . $d->image) }}" alt="slider_image"
                                        class="w-25 rounded">
                                </td>
                                <td>{{ $d->url }}</td>
                                <td>
                                    @if ($d->is_active == 0)
                                        Not Active
                                    @else
                                        Active
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection