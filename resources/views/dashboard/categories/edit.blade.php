@extends('layouts.dashboard')
@section('title-url', 'Categories Edit')
@section('title-page', 'Categories Edit')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">Edit Category</li>
@endsection
@section('content')
    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="mb-2">Category Name</label>
            <input type="text" name="name" class="form-control mb-3 @error('name') is-invalid @enderror"
                value="{{old('name') ?? $category->name }}">
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Category Parent</label>
            <select name="parent_id" class="form-select mb-3 @error('parent_id') is-invalid @enderror">
                <option value="">Primary Category</option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}" @selected($category->parent_id == $parent->id)>{{ $parent->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Category Description</label>
            <textarea type="text" name="description" class="form-control mb-3 @error('description') is-invalid @enderror">{{old('description') ?? $category->description }}</textarea>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Category Image</label>
            <input type="file" name="image" class="form-control mb-3 @error('image') is-invalid @enderror">
            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="" height="60">
            @endif
            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- Start Category Status --}}
        <div class="form-group">
            <label class="mb-2">Category Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="active" @checked($category->status == 'active')>
                <label class="form-check-label">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="archived" @checked($category->status == 'archived')>
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
        {{-- End Category Status --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </div>
    </form>
@endsection
