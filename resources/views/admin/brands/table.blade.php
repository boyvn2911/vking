<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th width="100px">STT</th>
        <th>Tên</th>
        <th width="100px">Trạng thái</th>
        <th width="100px">Sửa tên</th>
        <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
    @foreach($brands as $brand)
        <tr>
            <td>{{ $brand->position ?? 'STT' }}</td>
            <td>{{ $brand->name ?? 'TÊN' }}</td>
            <td>
                <form method="post" action="{{ asset('admin/brand/updateStatus/'.$brand->id) }}">
                    {{csrf_field()}}
                    @if($brand->active)
                        <button onclick="return confirm('Vô hoạt thương hiệu này sẽ ẩn tất cả sản phẩm của nó. Bạn có đồng ý không?');"
                                type="submit" class="btn btn-success btn-block">Active
                        </button>
                    @else
                        <button onclick="return confirm('Kích hoạt thương hiệu này sẽ hiện tất cả sản phẩm của nó. Bạn có đồng ý không?');"
                                type="submit" class="btn btn-danger btn-block">Inactive
                        </button>
                    @endif
                </form>
            </td>
            <td>
                <button data-name="{{$brand->name}}" data-id="{{$brand->id}}" data-toggle="modal"
                        data-target="#modal-default" class="btn btn-primary btn-block">Sửa tên
                </button>
            </td>
            <td>
                <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu này?')"
                   href="{{ asset('admin/brand/delete/'.$brand->id) }}"><i
                            class="fa fa-trash"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-change-name" method="post" action="">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Sửa tên danh mục</h4>
                </div>
                <div class="modal-body">
                    <input id="change-name" class="form-control" required type="text" name="name"
                           placeholder="Điền tên mới">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>