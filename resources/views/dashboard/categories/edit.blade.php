@extends('layout.master_dashboard')

@section('title', 'Edit Kategori')
@section('content')
    <div class="container">
        <h1 class="my-4">Tambah Kategori</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categories.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $data->name }}">
            <button type="submit" name="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
    </div>

@section('script')
    <script>
        function getValue(val) {
            document.getElementById('rangeValue').textContent = val;
        }
    </script>
@endsection
@endsection