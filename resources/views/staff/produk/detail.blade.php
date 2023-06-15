@extends('layout.master_dashboard')

@section('title', 'Detail Produk')
@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard/produk/detail.css') }}">
@endsection
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $data->name }}</h3>
                <h6 class="card-subtitle">{{ $cat->name }}</h6>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center"><img src="{{ asset('storage/products/' . $data->img) }}"
                                class="img-responsive w-75"></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Product description</h4>
                        <p>{{ $data->description }}</p>
                        <h2 class="mt-5">
                            Rp. {{ $data->price }}
                            <small class="text-success">Quantity : {{ $data->qty }}</small>
                        </h2>
                        <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title=""
                            data-original-title="Add to cart">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <button class="btn btn-primary btn-rounded">Buy Now</button>
                        <h3 class="box-title mt-5">Product Detail</h3>
                        <ul class="list-unstyled">
                            <li>Condition : {{ $data->condition_scale }}%</li>
                            <li>Year : {{ $data->year }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection