@extends('layouts.dashboard')
@section('title-url', 'Products Create')
@section('title-page', 'Products Create')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Create Product</li>
@endsection
@section('content')
    <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="mb-2">Product Name</label>
            <input type="text" name="name" class="form-control mb-3 @error('name') is-invalid @enderror"
                value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <select name="category_id" class="form-select mb-3 @error('category_id') is-invalid @enderror">
            <option value="">Select Category</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
            @endforeach
        </select>

                <div class="form-group">
            <label class="mb-2">Product Image</label>
            <input type="file" name="image" class="form-control mb-3 @error('image') is-invalid @enderror">
            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="mb-2">Product Description</label>
            <textarea type="text" name="description" class="form-control mb-3 @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="mb-2">Product Price</label>
            <input type="text" name="price" class="form-control mb-3 @error('price') is-invalid @enderror"
                value="{{ old('price') }}">
            @error('price')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Product Compare_Price</label>
            <input type="text" name="compare_price" class="form-control mb-3 @error('compare_price') is-invalid @enderror"
                value="{{ old('compare_price') }}">
            @error('compare_price')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Product Quantity</label>
            <input type="number" name="quantity" min="0"
       class="form-control mb-3 @error('quantity') is-invalid @enderror"
       value="{{ old('quantity') }}">

            @error('quantity')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- Start Product Status --}}
        <div class="form-group">
            <label class="mb-2">Product Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="active" checked>
                <label class="form-check-label">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="draft">
                <label class="form-check-label">
                    Draft
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="archived">
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
