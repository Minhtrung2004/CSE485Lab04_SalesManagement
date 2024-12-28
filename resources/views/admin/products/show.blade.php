@extends('admin.common.home-page')

@section('content')
    <h1>Thông tin Sản phẩm</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tên sản phẩm: {{ $product->name }}</h5>
            <p class="card-text"><strong>Mô tả:</strong> {{ $product->description }}</p>
            <p class="card-text"><strong>Giá:</strong> {{ $product->price }}</p>
            <p class="card-text"><strong>Số lượng:</strong> {{ $product->quantity }}</p>
        </div>
    </div>

    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning mt-3">Chỉnh sửa</a>
    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;"
        onsubmit="return confirmDelete();">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Xóa</button>
    </form>

    <script>
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');
        }
    </script>
@endsection
