@extends('layouts.dashboard')
@section('title-url','Trashed-Categories')
@section('title-page','Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Trash</li>
@endsection
@section('content')
    <div class="mb-5">
        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
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
                <th>Status</th>
                <th>Deleted At</th>
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td><img src="{{ asset('storage/' . $category->image) }}" alt="" height="60"></td>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->deleted_at }}</td>
                <td class="d-inline-flex gap-3 text-center">
                    
                    <form action="{{ route('dashboard.categories.restore',$category->id) }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-sm btn-outline-info">Restore</button>
                    </form>
                    <form action="{{ route('dashboard.categories.force-delete',$category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr class="bg-warning">
                <td colspan="6"><h5 class="text-center mt-5 mb-5"> No Categories defined. </h5></td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$categories->withQueryString()->links()}}
@endsection