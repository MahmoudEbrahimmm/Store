@extends('layouts.dashboard')
@section('title-url','Roles')
@section('title-page','Roles')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Roles</li>
@endsection
@section('content')
    <div class="mb-5">
        
            <a href="{{ route('dashboard.roles.create') }}" class="btn btn-sm btn-outline-primary mr-2">Create</a>
    
        {{-- <a href="{{ route('dashboard.roles.trash') }}" class="btn btn-sm btn-outline-dark">Trash</a> --}}
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
    {{-- <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-3">
        <input type="text" name="name" placeholder="Name" class="form-control mx-2" :value="request('name')">
        <select name="status" class="form-control mx-2">
            <option value="">All</option>
            <option value="active" @selected(request('status' == 'active'))>Active</option>
            <option value="archived" @selected(request('status' == 'archived'))>Archived</option>
        </select>
        <button class="btn btn-dark mx-2">Filter</button>
    </form> --}}
    <table class="table text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th colspan="3">Operation</th>
            </tr>
        </thead>
        <tbody>
            @forelse($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->created_at }}</td>

                <td class="d-inline-flex gap-3 text-center">
                    <a href="{{ route('dashboard.roles.show',$role->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-eye"></i></a>
                    
                        <a href="{{ route('dashboard.roles.edit',$role->id) }}" class="btn btn-sm btn-success">
                            <i class="fa-solid fa-pen-to-square"></i></a>
                    

                    
                        <form action="{{ route('dashboard.roles.destroy',$role->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    
                </td>
            </tr>
            @empty
            <tr class="bg-warning">
                <td colspan="4"><h5 class="text-center mt-5 mb-5"> No Roles defined. </h5></td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$roles->withQueryString()->links()}}
@endsection