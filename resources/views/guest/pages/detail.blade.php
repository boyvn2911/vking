@extends('guest.layout')

@section('css')
    <link rel="stylesheet" href="/resources/assets/css/goosefeathers.css">
    <link rel="stylesheet" href="/resources/assets/css/detail.css">
@stop

@section('script')
    <script>
        $(document).ready(function () {
            var hook = $('.detail').parent();
            $(window).scroll(function () {
                console.log($(window).scrollTop());
                console.log( hook.offset().top + hook.height() - 30) ;
                if ($(window).scrollTop() > ( hook.offset().top + hook.height() - $(window).height() + 450 ) ){
                    $('.detail').css({'position': 'absolute', 'bottom': 0, 'top': 'unset'});
                } else {
                    $('.detail').css({'bottom': 'unset', 'top': 'unset'});
                    if ($(window).scrollTop() > (hook.offset().top) - 30) {
                        $('.detail').css('position', 'fixed');
                    } else {
                        $('.detail').css('position', 'unset');
                    }
                }
            });
        });
    </script>
@stop

@section('main')
    <section>
        <div class="container">
            @include('guest.partials.goosefeathers')

            <div class="row mt-5 pb-5">
                <div class="col-12 col-md-4">
                    <div class="img">
                        <img src="https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg">
                        <img src="https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg">
                        <img src="https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg">
                        <img src="https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg">
                    </div>
                </div>

                <div class="col-12 col-md-7 offset-md-1">
                    <div class="detail">
                        <h1>Fine-knit cardigan</h1>
                        <div class="prc">1.000.999 vnd</div>

                        <div class="size">
                            <div class="a">SIZE</div>
                            <div class="b">
                                <span class="active">S</span>
                                <span class="ba">|</span>
                                <span>M</span>
                                <span class="ba">|</span>
                                <span>L</span>
                                <span class="ba">|</span>
                                <span>XL</span>
                            </div>
                        </div>

                        <div class="desc">
                            Loose-fitting sweatshirt with a high neck, hood and long sleeves. Features a front pouch
                            pocket
                            with contrasting band and asymmetric hem with side vents.
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="similar">
                SIMILAR TYPE
            </div>

            <div class="row mt-4">
                <div class="col-12 col-md-4">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="det">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <span class="price-org">999.000</span>
                                <span class="price-vking">800.000</span>
                                <span class="price-sale">400.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="det">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <span class="price-org">999.000</span>
                                <span class="price-vking">800.000</span>
                                <span class="price-sale">400.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="det">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <span class="price-org">999.000</span>
                                <span class="price-vking">800.000</span>
                                <span class="price-sale">400.000</span>
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