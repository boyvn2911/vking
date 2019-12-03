@extends('guest.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('resources/assets/css/goosefeathers.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/detail.css') }}">
@stop

@section('script')
    <script>
        $(document).ready(function () {
            if ($(window).width() > 768) {
                var hook = $('.detail').parent();
                $(window).scroll(function () {
                    console.log($(window).scrollTop());
                    console.log(hook.offset().top + hook.height() - 30);
                    if ($(window).scrollTop() > (hook.offset().top + hook.height() - $(window).height() + 150)) {
                        $('.detail').css({'position': 'absolute', 'bottom': 0, 'top': 'unset'});
                    } else {
                        $('.detail').css({'bottom': 'unset', 'top': '130px'});
                        if ($(window).scrollTop() > (hook.offset().top) - 30) {
                            $('.detail').css('position', 'fixed');
                        } else {
                            $('.detail').css('position', 'unset');
                        }
                    }
                });
            }
        });
    </script>
@stop

@section('title'){{ $product->name ?? 'Vking Authentic' }}@stop
@section('image'){{asset('storage/upload/'.@unserialize($product->image)[0])}}@stop
@section('description'){{ strip_tags($product->description) }}@stop

@section('main')
    <section>
        <div class="container">
            @include('guest.partials.goosefeathers')

            <div class="row mt-5 pb-5">
                <div class="col-12 col-md-4">
                    <div class="img">
                        @foreach(@unserialize($product->image) as $key => $image)
                            <img src="{{ asset('storage/upload/'.$image) }}">
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-md-7 offset-md-1">
                    <div class="detail">
                        <h1>{{$product->name ?? ''}}</h1>
                        {{--<div class="prc prc-org">{{number_format($product->price_org ?? 0)}} VNĐ</div>--}}
                        {{--@if( $product->price_sale == null )--}}
                        {{--<div class="prc prc-vking">{{number_format($product->price_vking ?? 0)}} VNĐ</div>--}}
                        {{--@else--}}
                        {{--<div class="prc prc-sale">{{number_format($product->price_sale ?? 0)}} VNĐ</div>--}}
                        {{--@endif--}}
                        <div class="prc prc-vking">Giá: <a target="_blank" href="https://www.messenger.com/t/authentic14ths">LIÊN HỆ</a>
                        </div>
                        @if($size != null)
                            <div class="size">
                                <div class="a">SIZE</div>
                                <div class="b">
                                    @foreach($size as $key => $sz)
                                        <span @if( in_array( ($key+1), @unserialize($product->size) ?? []) ) class="active" @endif>{{$sz}}</span>
                                        @if($key < 3)<span class="ba">|</span>@endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="desc">
                            {!! $product->description ?? '' !!}
                        </div>

                        <div>
                            <a target="_blank" href="https://www.messenger.com/t/authentic14ths" class="buy-now">MUA
                                NGAY</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="similar">
                SIMILAR TYPE
            </div>

            <div class="row mt-4">
                @foreach($similars as $product)
                    <div class="col-12 col-md-4">
                        <div class="item @if($product->price_sale != null) sale @endif">
                            <a href="{{ asset('detail/'.$product->slug.'/'.$product->id) }}" class="image"
                               style="background-image: url({{ asset('storage/upload/'.@unserialize($product->image)[0]) }});"></a>
                            <div class="det">
                                <div class="name">{{$product->name}}</div>
                                <div class="brand"><span class="ribbon">{{$product->brand->name}}</span></div>
                                <div class="price">
                                    {{--<span class="price-org">{{number_format($product->price_org ?? '')}}</span>--}}
                                    {{--@if($product->price_sale == null)--}}
                                    {{--<span class="price-vking">{{number_format($product->price_vking ?? '')}}</span>--}}
                                    {{--@else--}}
                                    {{--<span class="price-sale">{{number_format($product->price_sale ?? '')}}</span>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-right mt-5 mb-4">
                <a id="to-top"><i class="fas fa-chevron-up"></i> BACK TO TOP</a>
            </div>
        </div>

    </section>
@stop