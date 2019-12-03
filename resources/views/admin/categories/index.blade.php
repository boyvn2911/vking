@extends('admin.layout')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>
@stop

@section('javascript')
    <!-- DataTables -->
    <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script>
        $(document).ready(function () {
            //Modal đổi tên danh mục
            $('button[data-toggle="modal"]').click(function (e) {
                e.preventDefault();
                $('#form-change-name').attr('action', '{{ asset('admin/category/changeName/') }}/' + $(this).attr('data-id'));
                $('input#change-name').val($(this).attr('data-name'));
                var a = $(this).attr('data-size');
                $('#'+ a).prop('checked', true);
            });
        });
    </script>
@stop

@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Danh mục phân loại
                {{--<small>advanced tables</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Danh mục phân loại</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm phân loại</h3>
                        </div>
                        <form class="form-horizontal" method="post" action=""
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Phân loại</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Điền phân loại">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Loại size</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="radio" name="size" value="0"> Không <br>
                                            <input type="radio" name="size" value="1"> 44-46-48-50 <br>
                                            <input type="radio" name="size" value="2"> XS-S-M-L <br>
                                            <input type="radio" name="size" value="3"> 39-40-41-42 <br>
                                            <input type="radio" name="size" value="4"> 85-90-95-100 <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách phân loại</h3>
                        </div>
                        <div class="box-body table-responsive">
                            @include('admin.categories.table')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop