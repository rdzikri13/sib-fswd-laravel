@extends('layout.master_dashboard')

@section('title', 'Tambah Produk')
@section('content')
    <div class="container">
        <h1 class="my-4">Tambah Data Product</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
            {{-- @method('put') --}}
            @csrf
            <input class="form-control" type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name">
            <div class="row g-2">
                <div class="col">
                    <label for="price">Price</label>
                    <input class="form-control" type="number" name="price" id="price">
                </div>
                <div class="col">
                    <label for="qty">Quantity</label>
                    <input class="form-control" type="number" name="qty" id="qty">
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <label for="condition">Condition (0-100%)</label>
                    <input type="range" class="form-range" min="0" max="100" id="condition"
                        name="condition_scale" onchange="getValue(this.value)">
                    <output for="condition" id="rangeValue"></output>
                </div>
                <div class="col">
                    <label for="year">Year</label>
                    <input class="form-control" type="year" name="year" id="year">
                </div>
            </div>
            <label for="categories">Category</label>
            <select id="categories" class="form-select form-control" aria-label="Default select example"
                name="categories_id">
                <option selected><b>--Choose Category--</b></option>
                @forelse ($cat as $row)
                    <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                @empty
                @endforelse
            </select>
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="address" cols="30" rows="3"></textarea>
            <label for="img">Product Image</label>
            <input type="file" class="form-control" id="img" name="img"
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