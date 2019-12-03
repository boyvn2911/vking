@extends('guest.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/assets/css/index.css') }}">
@stop

@section('title','VKing Authentic')
@section('image'){{asset('resources/assets/image/logo-circle.png')}}@stop
@section('description')
    Cam kết trọn đời hàng hiệu 100% authentic chính hãng xách tay UK, EU, US.
@stop
@section('script')
    <script>
        var hot_page=2;var new_page=2;$.ajax({url:'{{ asset('hot') }}',type:'GET',}).done(function(result){if(result.length<10){$('#load-more.hot').hide()}else{$('#hot').append(result)}});var load_hot=function(){$.ajax({url:'{{ asset('hot') }}?page='+hot_page,type:'GET',}).done(function(result){console.log(result.length);if(result.length<10){$('#load-more.hot').hide()}else{hot_page+=1;$('#hot').append(result)}})}
        $.ajax({url:'{{ asset('new') }}',type:'GET',}).done(function(result){if(result.length<10){$('#load-more.new').hide()}else{$('#new').append(result)}});var load_new=function(){$.ajax({url:'{{ asset('new') }}?page='+new_page,type:'GET',}).done(function(result){if(result.length<10){$('#load-more.new').hide()}else{new_page+=1;$('#new').append(result)}})}
    </script>
@stop

@section('main')
    <section id="banner">
        <div id="bann" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active"
                     style="background-image: url({{ asset('resources/assets/image/banner.jpg') }})">
                    <div class="fade-bg"></div>
                    <h3>New Arrival</h3>
                    <a href="" class="butt">XEM TIẾP <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="carousel-item"
                     style="background-image: url({{ asset('resources/assets/image/offer.png') }})">
                    <div class="fade-bg"></div>
                    <h3>New Arrival</h3>
                    <a href="" class="butt">XEM TIẾP <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="carousel-item"
                     style="background-image: url({{ asset('resources/assets/image/banner.png') }})">
                    <div class="fade-bg"></div>
                    <h3>New Arrival</h3>
                </div>
            </div>
            <a class="carousel-control-prev" href="#bann" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#bann" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section id="item-hot">
        <div class="container">
            <div class="text-center">
                <h2>
                    HÀNG MỚI VỀ
                    <span class="line-decor"><i class="far fa-square"></i></span>
                </h2>
            </div>

            <div id="new" class="row">
                {{--ajax new item--}}
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="load-more">
                        <button id="load-more" class="butt new" onclick="load_new()">XEM THÊM <i
                                    class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="special-offer">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-row-reverse">
                    <div class="spe-container text-center">
                        <h2>SẢN PHẨM SALE
                            <span class="line-decor"><i class="far fa-square"></i></span>
                        </h2>
                        <p>Hàng hot giá shock, số lượng còn sẵn cực kỳ hạn chế.</p>

                        <a href="{{asset('sale-list')}}" class="butt">XEM TIẾP <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="new-arrival">
        <div class="container">
            <div class="text-center">
                <h2>
                    NỔI BẬT
                    <span class="line-decor"><i class="far fa-square"></i></span>
                </h2>
            </div>

            <div id="hot" class="row">
                {{--ajax hot item--}}
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="load-more">
                        <button id="load-more" class="butt hot" onclick="load_hot()">XEM THÊM <i
                                    class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop
