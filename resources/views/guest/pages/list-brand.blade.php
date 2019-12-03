@extends('guest.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/assets/css/goosefeathers.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/list.css') }}">
@stop

@section('script')
    <script>
        $(document).ready(function () {
            if ($(window).width() > 768) {
                var hook = $('#sidebar').parent();
                $(window).scroll(function () {
                    if ($(window).scrollTop() > (hook.offset().top) - 30) {
                        $('#sidebar').css('position', 'fixed');
                    } else {
                        $('#sidebar').css('position', 'unset');
                    }
                });
            }
        });

        var page = 2;
        var id = '{{$brand->id}}';
        var load = function () {
            $.ajax({
                url: '/brand-more/slug/' + id + '?page=' + page,
                type: 'GET',
            }).done(function (result) {
                if(result.length === 1){
                    $('#load-more').hide();
                }else {
                    page += 1;
                    $('#list').append(result);
                }
            });
        }
    </script>

@stop

@section('main')
    <section>
        <div class="container">
            @include('guest.partials.goosefeathers')

            <div class="row">
                <div class="col-12 col-md-2 col-lg-2">
                    @include('guest.partials.sidebar')
                </div>
                <div class="col-12 col-md-10 col-lg-10">
                    <div class="text-center">
                        <h2 style="text-transform: uppercase;">
                            {{ $brand->name }}
                            <span class="line-decor"><i class="far fa-square"></i></span>
                        </h2>
                    </div>

                    <div id="list" class="row">
                        @include('guest.partials.list')
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="load-more">
                                <button id="load-more" class="butt" onclick="load()">XEM THÊM <i
                                            class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="text-right mt-5 mb-4">
                <a id="to-top"><i class="fas fa-chevron-up"></i> BACK TO TOP</a>
            </div>
        </div>
    </section>
@stop