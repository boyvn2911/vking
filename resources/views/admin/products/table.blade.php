<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th width="100px">STT</th>
        <th>Tên</th>
        <th>Thương hiệu</th>
        <th>Phân loại</th>
        <th>Giá</th>
        <th width="100px">Trạng thái</th>
        <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->position ?? 'STT' }}</td>
            <td><a href="{{asset('admin/product/edit/'.$product->id)}}">{{ $product->name ?? 'TÊN' }}</a></td>
            <td>{{ $product->brand->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->price_vking }}</td>
            <td>
                <form method="post" action="{{ asset('admin/product/updateStatus/'.$product->id) }}">
                    {{csrf_field()}}
                    @if($product->active)
                        <button type="submit" class="btn btn-success btn-block">Active</button>
                    @else
                        <button type="submit" class="btn btn-danger btn-block">Inactive</button>
                    @endif
                </form>
            </td>
            <td>
                <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"
                   href="{{ asset('admin/product/delete/'.$product->id) }}"><i
                            class="fa fa-trash"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->links() }}