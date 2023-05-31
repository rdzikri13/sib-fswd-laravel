@extends('dashboard.layouts.main')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Table Categories</h1>
<p class="mb-4">Table Category data stored in the database, this data can be input via the create data form.</p>
<a href="/dashboard/categories/create" class="btn btn-success btn-icon-split mb-3">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Add new Data</span>
</a>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dzikri store</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->code }}</td>
                        <td>
                            <a href="/dashboard/product-categories/{{ $category->id }}" type="button"
                                class="btn btn-outline-secondary btn-sm">show</a>
                            <a href="/dashboard/product-categories/{{ $category->id }}/edit" type="button"
                                class="btn btn-outline-secondary btn-sm">edit</a>
                            <form action="/dashboard/product-categories/{{ $category->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-secondary btn-sm"
                                    onclick="return confirm('Are you sure?')">delete<span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection