@extends('layout.master_dashboard')

@section('title', 'Tambah Produk')
@section('content')
    <div class="container">
        <h1 class="my-4">Update Data Product</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('produk.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <input class="form-control" type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $data['name'] }}">
            <div class="row g-2">
                <div class="col">
                    <label for="price">Price</label>
                    <input class="form-control" type="number" name="price" id="price" value="{{ $data['price'] }}">
                </div>
                <div class="col">
                    <label for="qty">Quantity</label>
                    <input class="form-control" type="number" name="qty" id="qty" value="{{ $data['qty'] }}">
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <label for="condition">Condition (0-100%)</label>
                    <input type="range" class="form-range" min="0" max="100" id="condition"
                        name="condition_scale" onchange="getValue(this.value)" value="{{ $data['condition_scale'] }}">
                    <output for="condition" id="rangeValue"></output>
                </div>
                <div class="col">
                    <label for="year">Year</label>
                    <input class="form-control" type="year" name="year" id="year" value="{{ $data['year'] }}">
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <label for="categories">Category</label>
                    <select id="categories" class="form-select form-control" aria-label="Default select example"
                        name="categories_id">
                        <option selected><b>--Choose Category--</b></option>
                        @forelse ($cat as $row)
                            <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="col">
                    <label for="status">Status</label>
                    <select id="status" class="form-select form-control" aria-label="Default select example"
                        name="status">
                        <option selected><b>--Pilih Status--</b></option>
                        <option value="waiting">Waiting</option>
                        <option value="rejected">Rejected</option>
                        <option value="accepted">Accepted</option>
                    </select>
                </div>
                <div class="col">
                    <label for="is_best">Best Product</label>
                    <select id="is_best" class="form-select form-control" aria-label="Default select example"
                        name="is_best" val>
                        <option selected><b>--Pilih Status--</b></option>
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                    </select>
                </div>
            </div>
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="address" cols="30" rows="3">{{ $data['description'] }}</textarea>
            <label for="img">Product Image</label>
            <input type="file" class="form-control" id="img" name="img"
                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <button type="submit" name="submit" class="btn btn-primary mt-4">Update Data</button>
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