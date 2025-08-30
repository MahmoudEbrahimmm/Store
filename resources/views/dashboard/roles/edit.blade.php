@extends('layouts.dashboard')
@section('title-url', 'Roles Edit')
@section('title-page', 'Roles Edit')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Roles</li>
    <li class="breadcrumb-item active">Edit Role</li>
@endsection
@section('content')
    <form action="{{ route('dashboard.categories.update', $role->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="mb-2">Role Name</label>
            <input type="text" name="name" class="form-control mb-3 @error('name') is-invalid @enderror"
                value="{{old('name') ?? $role->name }}">
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Role Parent</label>
            <select name="parent_id" class="form-select mb-3 @error('parent_id') is-invalid @enderror">
                <option value="">Primary Role</option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}" @selected($role->parent_id == $parent->id)>{{ $parent->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Role Description</label>
            <textarea type="text" name="description" class="form-control mb-3 @error('description') is-invalid @enderror">{{old('description') ?? $role->description }}</textarea>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Role Image</label>
            <input type="file" name="image" class="form-control mb-3 @error('image') is-invalid @enderror">
            @if ($role->image)
                <img src="{{ asset('storage/' . $role->image) }}" alt="" height="60">
            @endif
            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- Start Role Status --}}
        <div class="form-group">
            <label class="mb-2">Role Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="active" @checked($role->status == 'active')>
                <label class="form-check-label">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="archived" @checked($role->status == 'archived')>
                <label class="form-check-label">
                    Archived
                </label>
            </div>
            @error('status')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- End Role Status --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </div>
    </form>
@endsection
