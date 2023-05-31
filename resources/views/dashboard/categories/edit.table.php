@extends('dashboard.layouts.main')

@section('content')
<!-- Page Heading -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/dashboard/product-categories/{{ $category->id }}" class="mb-5"
                            enctype="multipart/form-data">
                            <h4 class="card-title">Edit Product form</h4>
                            <form class="forms-sample">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" required value="{{ old('name', $category->name) }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="code" class="form-label">Code</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                        id="code" name="code" required
                                        value="{{ old('code', $category->code) }}">
                                    @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection