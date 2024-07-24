@extends('layoutadmin')

@section('title', 'Danh sách sản phẩm')

@section('content')
<a class="btn btn-primary" href="{{ route('products.create') }}">Thêm mới</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Image</th>
            <th scope="col">Category Name</th>
            <th scope="col">Status</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listPro as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    @if(!$item->image)
                        Không có hình ảnh
                    @else
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100">
                    @endif
                </td>
                <td>{{ $listCate[$item->category_id] }}</td>
                <td>{{ $item->status ? 'còn hàng' : 'hết hàng' }}</td>
                <td>
                    <button class="btn btn-primary">sửa</button>
                    <button class="btn btn-danger">xóa</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $listPro->links() }}
@endsection
