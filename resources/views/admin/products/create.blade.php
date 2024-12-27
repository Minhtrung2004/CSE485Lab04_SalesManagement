@extends('admin.common.home-page')

@section('content')
    <h1>Thêm mới Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control"
                value="{{ old('price') }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng tồn kho</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
