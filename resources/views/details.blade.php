@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection
@section('title', $data->name)

@section('content')
    <div class="container my-5 py-5">
        <a href="/products"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512">
                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path
                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg></a>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $data->name }}</h3>
                <h6 class="card-subtitle">{{ $cat->name->name }}</h6>
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