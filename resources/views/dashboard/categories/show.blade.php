@extends('layouts.dashboard')
@section('title-url','Show')
@section('title-page',$category->name)
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">{{ $category->name }}</li>
@endsection
@section('content')
    <table class="table text-center">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Store</th>
                <th>Status</th>
                <th>Created At</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($category->products as $product)
            <tr>
                <td><img src="{{ asset('storage/' . $product->image) }}" alt="" height="60"></td>
                
                <td>{{ $product->name }}</td>
                <td>{{ $product->store->name }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->created_at }}</td>
                <td class="d-inline-flex gap-3 text-center">
                    <a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-house"></i></a>
                </td>
            </tr>
            @empty
            <tr class="bg-warning">
                <td colspan="6"><h5 class="text-center mt-5 mb-5"> No products defined. </h5></td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
