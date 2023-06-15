@extends('layout.master_dashboard')

@section('title', 'Tambah Slider')
@section('content')
    <div class="container">
        <h1 class="mt-5">Tambah Slider</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row g-2">
                <div class="col">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title">
                </div>
                <div class="col">
                    <label for="url">URL</label>
                    <input class="form-control" type="text" name="url" id="url">
                </div>
            </div>
            <label for="text">Text</label>
            <textarea class="form-control" name="text" id="text" cols="30" rows="3"></textarea>
            <label for="image">Slider Image</label>
            <input type="file" class="form-control" id="image" name="image"
                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
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