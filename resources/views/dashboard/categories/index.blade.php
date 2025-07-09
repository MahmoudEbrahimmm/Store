@extends('layouts.dashboard')
@section('title-url','Categories')
@section('title-page','Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection
@section('content')
    <div class="mb-5">
        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-primary">Create Category</a>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
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
                <td>
                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                
                
                    {{-- <form action="{{ route('categories.destory',$category->id) }}" method="post">
                        @csrf
                        @method('delete') --}}
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                    {{-- </form> --}}
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