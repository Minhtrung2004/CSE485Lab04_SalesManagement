@extends('admin.common.home-page')

@section('content')
    <div class="col-lg-13">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Danh sách Sản phẩm</h5>
                <div class="ibox-tools">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm" title="Thêm Sản phẩm">
                        <i class="fa fa-plus"></i> Thêm
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover no-margins" style="border: 2px solid #ddd; border-collapse: collapse;">
                    @csrf
                    <thead>
                        <tr style="border-bottom: 2px solid #ccc;">
                            <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Tên sản phẩm</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Mô tả</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Giá</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Số lượng</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Ngày tạo</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Ngày cập nhật</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->id }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->name }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->description }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->price }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->quantity }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->created_at }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->updated_at }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; display: flex; gap: 10px">
                                    {{-- btn show --}}
                                    <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info btn-sm"
                                        title="Xem chi tiết">
                                        <i class="fa fa-eye"></i> Xem
                                    </a>

                                    {{-- btn edit --}}
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm"
                                        title="Chỉnh sửa">
                                        <i class="fa fa-edit"></i> Sửa
                                    </a>

                                    {{-- Form xóa --}}
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">
                                            <i class="fa fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div style="float: right; font-size: 14px;">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>

    <script>
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');
        }
    </script>
@endsection
