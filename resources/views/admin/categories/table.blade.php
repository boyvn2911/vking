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
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->position ?? 'STT' }}</td>
            <td>{{ $category->name ?? 'TÊN' }}</td>
            <td>
                <form method="post" action="{{ asset('admin/category/updateStatus/'.$category->id) }}">
                    {{csrf_field()}}
                    @if($category->active)
                        <button onclick="return confirm('Vô hoạt phân loại này sẽ ẩn tất cả sản phẩm của nó. Bạn có đồng ý không?');"
                                type="submit" class="btn btn-success btn-block">Active
                        </button>
                    @else
                        <button onclick="return confirm('Kích hoạt phân loại này sẽ hiện tất cả sản phẩm của nó. Bạn có đồng ý không?');"
                                type="submit" class="btn btn-danger btn-block">Inactive
                        </button>
                    @endif
                </form>
            </td>
            <td>
                <button data-name="{{$category->name}}" data-size="{{$category->size}}" data-id="{{$category->id}}" data-toggle="modal"
                        data-target="#modal-default" class="btn btn-primary btn-block">Sửa tên
                </button>
            </td>
            <td>
                <a onclick="return confirm('Bạn có chắc muốn xóa phân loại này?')"
                   href="{{ asset('admin/category/delete/'.$category->id) }}"><i
                            class="fa fa-trash"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-change-name" method="post" action="{{ asset('admin/category/changeName/'.$category->id) }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Sửa tên danh mục</h4>
                </div>
                <div class="modal-body">
                    <input id="change-name" class="form-control" required type="text" name="name"
                           placeholder="Điền tên mới">
                    <div class="form-group">
                        <label>Loại size</label>
                        <div id="modal-radio" class="form-group">
                            <input type="radio" name="size" id="0" value="0"> Không <br>
                            <input type="radio" name="size" id="1" value="1"> 44-46-48-50 <br>
                            <input type="radio" name="size" id="2" value="2"> XS-S-M-L <br>
                            <input type="radio" name="size" id="3" value="3"> 39-40-41-42 <br>
                            <input type="radio" name="size" id="4" value="4"> 85-90-95-100 <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>