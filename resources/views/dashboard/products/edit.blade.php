@extends('layouts.dashboard')
@section('title-url', 'Product Edit')
@section('title-page', 'Product Edit')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Product</li>
    <li class="breadcrumb-item active">Edit Product</li>
@endsection
@section('content')
    <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="mb-2">Product Name</label>
            <input type="text" name="name" class="form-control mb-3 @error('name') is-invalid @enderror"
                value="{{ old('name') ?? $product->name }}">
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="mb-2">Product Description</label>
            <textarea type="text" name="description" class="form-control mb-3 @error('description') is-invalid @enderror">{{ old('description') ?? $product->description }}</textarea>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Product Image</label>
            <input type="file" name="image" class="form-control mb-3 @error('image') is-invalid @enderror">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="" height="60">
            @endif
            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Price</label>
            <input type="text" name="price" class="form-control mb-3 @error('price') is-invalid @enderror"
                value="{{ old('price') ?? $product->price }}">
            @error('price')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Compare price</label>
            <input type="text" name="compare_price"
                class="form-control mb-3 @error('compare_price') is-invalid @enderror"
                value="{{ old('name') ?? $product->compare_price }}">
            @error('compare_price')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Tags</label>
            <input type="text" name="tags" class="form-control mb-3 @error('tags') is-invalid @enderror"
                value="{{ $tags }}">
            @error('tags')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- Start Product Status --}}
        <div class="form-group">
            <label class="mb-2">Product Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="active" @checked($product->status == 'active')>
                <label class="form-check-label">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="draft" @checked($product->status == 'draft')>
                <label class="form-check-label">
                    Draft
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="archived" @checked($product->status == 'archived')>
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
        {{-- End Product Status --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </div>
    </form>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css"/>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        var inputElm = document.querySelector('[name=tags]'),
    tagify = new Tagify (inputElm);
    </script>
@endpush
