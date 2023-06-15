@extends('layout.master')

@section('title', 'Home')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <header class="bg-gradient text-white px-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slider as $s)
                    <div class="carousel-item active">
                        <img class="w-100 h-50 img-fluid rounded" src="{{ asset('storage/sliders/' . $s->image) }}"
                            alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 pt-5">
                                        <h1 class="display-4 text-white mb-4 animated slideInDown">{{ $s->title }}</h1>
                                        <p class="fs-5 text-body mb-4 pb-2 mx-sm-5 animated slideInDown">{{ $s->text }}
                                        </p>
                                        <a href="{{ $s->url }}"
                                            class="btn btn-primary py-3 px-5 animated slideInDown">Explore
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
    <!-- About section-->
    <section id="product mt-0">
        <div class="container px-4">
            <h1 class="text-center" id="best-seller">Best Products</h2>
                <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4">
                    @foreach ($products as $produk)
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
                                        <p class="align-items-center">Amount : {{ $produk->qty }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <p class="text-center">
                    <a class="btn text-white text-center" href="/products" style="background-color : #09757a">See More
                        Products</a>
                </p>
        </div>
    </section>
    <!-- Contact section-->
    <section id="contact">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>Contact us</h2>
                    <p class="lead">
                    <ul>
                        <li>Email : dzikrinurfauzij@gmail.com</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection