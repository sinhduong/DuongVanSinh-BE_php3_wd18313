@extends('layoutadmin')

@section('title', 'Thêm mới sản phẩm')

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Product Name" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" placeholder="10000" required value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="100" required value="{{ old('quantily') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image" required value="{{ old('image') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" value="{{ old('catagory') }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a class="btn btn-light" href="{{ route('products.index') }}">Quay lại danh sách</a>
    </form>
@endsection
