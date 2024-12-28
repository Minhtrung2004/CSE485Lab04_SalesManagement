@extends('admin.common.home-page')

@section('content')
    <h1>Chỉnh sửa Sản Phẩm</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}"
                required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control"
                value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng tồn kho</label>
            <input type="number" name="quantity" id="quantity" class="form-control"
                value="{{ old('quantity', $product->quantity) }}" required>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Cập nhật
            </button>
        </div>
    </form>
@endsection
