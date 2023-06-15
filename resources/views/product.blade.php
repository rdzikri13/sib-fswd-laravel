@extends('layout.master')

@section('title', 'Produk')
@section('style')
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endsection
@section('content')
    <section id="product mt-0">
        <div class="container px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-group">
                    <label for="price">By Price</label>
                    <div class="d-flex">
                        <form action="{{ url('/price') }}" method="get" class="d-flex">
                            <input class="form-range" type="range" name="price" id="price"
                                min="{{ $data[0]->min_price }}" max="{{ $data[0]->max_price }}"
                                onchange="getValue(this.value)">
                            <input type="hidden" value="{{ $data[0]->max_price }}" name="max">
                            <button type="submit" class="btn text-white" style="background-color: #09757a">Search</button>
                        </form>
                    </div>
                    <output for="price" id="harga"></output>
                </div>
                <h1 class="text-center" id="best-seller">Produk</h1>
                <div class="form-group">
                    <form action="{{ url('/search') }}" method="get" class="d-flex">
                        <input type="text" class="form-control" name="search" value="{{ old('search') }}">
                        <input type="submit" class="btn text-white" style="background-color: #09757a" value="Search">
                    </form>
                </div>
            </div>
            <div id="content" class="row row-cols-2 row-cols-md-3 row-cols-xl-4">
                @foreach ($products as $produk)
                    {{-- @if ($produk->price >= $min && $produk->price <= $max)
                    @endif --}}
                    <div class="col">
                        <div class="card my-5">
                            <img src="{{ asset('storage/products/' . $produk->img) }}" class="card-img-top w-auto h-50"
                                alt="...">
                            <div class="card-body">
                                <h2 class="card-title text-truncate">{{ $produk->name }}</h2>
                                <h6 class="card-subtitle my-1">{{ $produk->categories_name }}</h6>
                                <p>Rp. {{ $produk->price }}</p>
                                <p class="card-text text-truncate">{{ $produk->description }}</p>
                                <div class="d-flex justify-content-between">
                                    <a href="/products/{{ $produk->id }}" class="btn btn-primary">See More</a>
                                    <p class="align-items-center">Qty : {{ $produk->qty }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function getValue(val) {
            document.getElementById('harga').textContent = val;
        }
    </script>
@endsection