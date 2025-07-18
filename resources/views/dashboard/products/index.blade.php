@extends('layouts.dashboard')
@section('title-url','Products')
@section('title-page','Products')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Products</li>
@endsection
@section('content')
    <div class="mb-5">
        <a href="{{ route('dashboard.products.create') }}" class="btn btn-sm btn-outline-primary mr-2">Create</a>
        {{-- <a href="{{ route('dashboard.products.trash') }}" class="btn btn-sm btn-outline-dark">Trash</a> --}}
    </div>
    @if (session()->has('success'))
    <div class="alert bg-success text-white">
        {{session('success')}}
        </div>
    @endif
    @if (session()->has('error'))
    <div class="alert bg-danger text-white">
        {{session('error')}}
        </div>
    @endif
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-3">
        <input type="text" name="name" placeholder="Name" class="form-control mx-2" :value="request('name')">
        <select name="status" class="form-control mx-2">
            <option value="">All</option>
            <option value="active" @selected(request('status' == 'active'))>Active</option>
            <option value="archived" @selected(request('status' == 'archived'))>Archived</option>
        </select>
        <button class="btn btn-dark mx-2">Filter</button>
    </form>
    <table class="table text-center">
        <thead>
            <tr>
                <th>IMG</th>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Store</th>
                <th>Status</th>
                <th>Created At</th>
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td><img src="{{ asset('storage/' . $product->image) }}" alt="" height="60"></td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->store->name }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->created_at }}</td>
                <td class="d-inline-flex gap-3 text-center">
                    <a href="{{ route('dashboard.products.edit',$product->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    
                    <form action="{{ route('dashboard.products.destroy',$product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr class="bg-warning">
                <td colspan="8"><h5 class="text-center mt-5 mb-5"> No products defined. </h5></td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$products->withQueryString()->links()}}
@endsection