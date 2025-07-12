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
            <input type="text" name="name" class="form-control mb-3" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <label class="mb-2">Category Parent</label>
            <select name="parent_id" class="form-select mb-3">
                <option value="">Primary Category</option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}" @selected($category->parent_id == $parent->id)>{{ $parent->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="mb-2">Category Description</label>
            <textarea type="text" name="description" class="form-control mb-3">{{ $category->description }}</textarea>
        </div>
        <div class="form-group">
            <label class="mb-2">Category Image</label>
            <input type="file" name="image" class="form-control mb-3">
            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="" height="60">
            @endif
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
        </div>
        {{-- End Category Status --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </div>
    </form>
@endsection
