@extends('layouts.dashboard')
@section('title-url','Categories')
@section('title-page','Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection
@section('content')
    <div class="mb-5">
        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-outline-primary">Create Category</a>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success bg-success text-white">
        {{session('success')}}
        </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{session('error')}}
        </div>
    @endif
    <table class="table text-center">
        <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Created At</th>
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td></td>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_id }}</td>
                <td>{{ $category->created_at }}</td>
                <td class="d-inline-flex gap-3">
                    <a href="{{ route('dashboard.categories.edit',$category->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    
                    <form action="{{ route('dashboard.categories.destroy',$category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr class="bg-warning">
                <td colspan="7"><h5 class="text-center mt-5 mb-5"> No Categories defined. </h5></td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection