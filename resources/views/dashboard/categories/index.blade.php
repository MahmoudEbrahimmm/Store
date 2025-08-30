@extends('layouts.dashboard')
@section('title-url','Categories')
@section('title-page','Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection
@section('content')
    <div class="mb-5">
        @if(Auth::user()->can('categories.create'))
            <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-outline-primary mr-2">Create</a>
        @endif
        <a href="{{ route('dashboard.categories.trash') }}" class="btn btn-sm btn-outline-dark">Trash</a>
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
    @if (session()->has('info'))
    <div class="alert bg-info text-white">
        {{session('info')}}
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
                <th>IMAGE</th>
                <th>ID</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Product #</th>
                <th>Status</th>
                <th>Created At</th>
                <th colspan="3">Operation</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td><img src="{{ asset('storage/' . $category->image) }}" alt="" height="60"></td>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent->name }}</td>
                <td>{{ $category->products_count }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->created_at }}</td>

                <td class="d-inline-flex gap-3 text-center">
                    <a href="{{ route('dashboard.categories.show',$category->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-eye"></i></a>
                    @can('categories.update')
                        <a href="{{ route('dashboard.categories.edit',$category->id) }}" class="btn btn-sm btn-success">
                            <i class="fa-solid fa-pen-to-square"></i></a>
                    @endcan

                    @can('categories.delete')
                        <form action="{{ route('dashboard.categories.destroy',$category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    @endcan
                </td>
            </tr>
            @empty
            <tr class="bg-warning">
                <td colspan="8"><h5 class="text-center mt-5 mb-5"> No Categories defined. </h5></td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$categories->withQueryString()->links()}}
@endsection