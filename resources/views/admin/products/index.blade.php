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

        .table-form-group {
            display: flex;
            flex-wrap: wrap;
        }

        .table-search, .table-select {
            margin-right: 15px;
            margin-bottom: 15px;
            flex: 0 0 300px;
        }

        @media (max-width: 767px) {
            .table-search, .table-select {
                flex: 0 0 100%;
            }
        }
    </style>
@stop

@section('javascript')
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#filterBrand').change(function () {
                $('#filterSearch input').val('');

                $.ajax({
                    url: '{{ asset('admin/product/filterBrand') }}/' + this.value,
                    type: 'GET',
                }).done(function (result) {
                    $('#table').html(result);
                });
            });
        });
    </script>
@stop

@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Danh sách sản phẩm
                {{--<small>advanced tables</small>--}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Danh sách sản phẩm</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách sản phẩm</h3>
                        </div>
                        <div class="box-body table-responsive">
                            <div class="form-group table-form-group">
                                <form id="filterSearch" action="{{ asset('admin/product/search') }}" method="post"
                                      class="table-search">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" required
                                               placeholder="Search..." value="{{ $search ?? '' }}">
                                        <span class="input-group-btn">
                                            <button id="search-btn" class="btn btn-flat">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                    {{ csrf_field() }}
                                </form>

                                <select id="filterBrand" class="form-control table-select" style="width: 100%;">
                                    <optgroup label="BRAND">
                                        <option value="0" selected>All</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>

                            <div id="table">
                                @include('admin.products.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop