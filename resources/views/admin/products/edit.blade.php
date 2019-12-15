@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <style>
        .image-container .image {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            margin-bottom: 15px;
            position: relative;
        }

        .image-container .image:after {
            content: "";
            display: block;
            padding-top: 100%;
        }

        .image-container .add {
            background-image: url( {{asset('resources/assets/image/add.png')}} );
            background-size: auto;
            cursor: pointer;
            border: 2px dashed #dddfe2;
        }

        .image-container .image:not(.add) .remove {
            display: none;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .image-container .image:not(.add):hover .remove {
            display: block;
        }

        .image-container .image:not(.add) .remove a.makeAva {
            position: absolute;
            top: 5px;
            left: 10px;
            cursor: pointer;
            color: #FFF;
            font-size: 14px;
        }

        .image-container .image:not(.add) .remove a.delete {
            position: absolute;
            right: 10px;
            cursor: pointer;
            color: #FFF;
            font-size: 18px;
        }
    </style>
@stop

@section('javascript')
    <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
        $(function () {
            $('.textarea').wysihtml5();

            $('.image-container .image.add').click(function () {
                $('input[type="file"]').last().click();
            });

            $('input[type="file"]').last().change(function (event) {
                var files = event.target.files;
                $('.image-container.new .image:not(.add)').parent('div').remove();

                for (i = 0; i < files.length; i++) {
                    var image = files[i];
                    var reader = new FileReader();
                    reader.onload = function (file) {
                        console.log(file.target.result);
                        var div = "<div class='col-xs-4 col-md-2'><div class='image' style='background-image:url(" + file.target.result + ");'><div class='remove'><span>x</span></div></div></div>";
                        $('.image-container.new').prepend(div);
                    };
                    reader.readAsDataURL(image);
                }
                ;
            });

            //ajax size
            $.ajax({
                url: '{{ asset('size') }}',
                type: 'GET',
                data: {
                    id: $("select[name='category_id']").val(),
                    size: '{!! $product->size ?? '' !!}',
                },
            }).done(function (result) {
                $('#size').html(result);
            });

            $("select[name='category_id']").change(function () {
                $.ajax({
                    url: '{{ asset('size') }}',
                    type: 'GET',
                    data: {
                        id: $(this).val(),
                        size: '{!! $product->size ?? '' !!}',
                    },
                }).done(function (result) {
                    $('#size').html(result);
                });
            });
        })
    </script>
@stop

@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @if( isset($product) ) Sửa @else Thêm @endif
                <small>Sản phẩm</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Sản phẩm</a></li>
                <li class="active">@if( isset($product) ) Sửa @else Thêm @endif</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Thông tin sản phẩm</h3>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <label>Tên sản phẩm <span title="Thông tin bắt buộc">*</span></label>
                                    <input type="text" class="form-control" placeholder="Điền tên sản phẩm" name="name"
                                           required value="{{ $product->name ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Phân loại <span title="Thông tin bắt buộc">*</span></label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option @if($category->id == ($product->category_id ?? null) ) selected
                                                    @endif value="{{ $category->id }}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Thương hiệu <span title="Thông tin bắt buộc">*</span></label>
                                    <select class="form-control" name="brand_id">
                                        @foreach($brands as $brand)
                                            <option @if($brand->id == ($product->brand_id ?? null) ) selected
                                                    @endif value="{{ $brand->id }}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <label>Giá store</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       placeholder="Điền giá store (nếu có)" name="price_org"
                                                       value="{{ $product->price_org ?? '' }}">
                                                <span class="input-group-addon">VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <label>Giá VKing</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       placeholder="Điền giá VKing (nếu có)" name="price_vking"
                                                       value="{{ $product->price_vking ?? '' }}">
                                                <span class="input-group-addon">VNĐ</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <label>Giá sale</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       placeholder="Điền giá sale (nếu có)" name="price_sale"
                                                       value="{{ $product->price_sale ?? '' }}">
                                                <span class="input-group-addon">VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="size">
                                    {{--ajax size--}}
                                </div>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hot" value="1"
                                                   @if($product->hot ?? false) checked @endif>
                                            Nổi bật
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse"
                                            data-toggle="tooltip"
                                            title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-default btn-sm" data-widget="remove"
                                            data-toggle="tooltip"
                                            title="Remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body pad">
                                <textarea class="textarea" placeholder="Place some text here" name="description"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    {!! $product->description ?? '' !!}
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ảnh sản phẩm</h3>
                            </div>
                            <div class="box-body">
                                <div class="row image-container">
                                    @foreach( unserialize($product->image ?? serialize([])) as $key => $image )
                                        <div class='col-xs-4 col-md-2'>
                                            <div class='image'
                                                 style='background-image:url({{ asset('storage/upload/resized-'.$image) }});'>
                                                <div class='remove'>
                                                    @if($key != 0)
                                                        <a class="makeAva"
                                                           href="{{ asset('admin/product/makeAva/'.($product->id ?? '').'/'.$key ) }}"><i
                                                                    class="fa fa-key"></i></a>
                                                    @else
                                                        <a class="makeAva">Avatar</a>
                                                    @endif
                                                    <a class="delete"
                                                       href="{{ asset('admin/product/deleteImage/'.($product->id ?? '').'/'.$key) }}">x</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row image-container new">
                                    <div class="col-xs-4 col-md-2">
                                        <div class="image add"></div>
                                        <input style="display:none" type="file" name="image[]" multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-primary">@if( isset($product) ) Sửa @else Thêm @endif</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@stop