@extends('layoutadmin')

@section('title', 'Thêm mới danh mục sản phẩm')

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" name="name" placeholder="Tên danh mục" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select class="form-select" name="status" required>
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Không hoạt động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a class="btn btn-light" href="{{ route('categories.index') }}">Quay lại danh sách</a>
    </form>
@endsection
