@extends('layouts.dashboard')

@section('title', 'Edit Product')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Product</h2>

        <form action="{{ route('dashboard.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group mb-3">
                <label class="mb-2">Product Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @if ($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->image) }}" width="120" class="rounded shadow-sm">
                    </div>
                @endif
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="mb-2">Product Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-2">Product Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                    value="{{ old('description', $product->description) }}">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="mb-2">Product Price</label>
                <input type="text" name="price" class="form-control mb-3 @error('price') is-invalid @enderror"
                    value="{{ old('price', $product->price) }}">
                @error('price')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="mb-2">Product Compare_Price</label>
                <input type="text" name="compare_price"
                    class="form-control mb-3 @error('compare_price') is-invalid @enderror"
                    value="{{ old('compare_price', $product->compare_price) }}">
                @error('compare_price')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="mb-2">Product Quantity</label>
                <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                    value="{{ old('quantity', $product->quantity) }}">
                @error('quantity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="mb-2">Category</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="mb-2">Status</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active
                    </option>
                    <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Draft
                    </option>
                    <option value="archived" {{ old('status', $product->status) == 'archived' ? 'selected' : '' }}>Archived
                    </option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
