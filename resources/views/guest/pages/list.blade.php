@extends('guest.layout')

@section('css')
    <link rel="stylesheet" href="/resources/assets/css/goosefeathers.css">
    <link rel="stylesheet" href="/resources/assets/css/sidebar.css">
    <link rel="stylesheet" href="/resources/assets/css/list.css">
@stop

@section('script')
    <script>
        $(document).ready(function () {
            var hook = $('#sidebar').parent();
            $(window).scroll(function () {
                if ($(window).scrollTop() > ( hook.offset().top) - 30 ){
                    $('#sidebar').css('position', 'fixed');
                } else {
                    $('#sidebar').css('position', 'unset');
                }
            });
        });
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
                        <h2>
                            ITEM HOT
                            <span class="line-decor"><i class="far fa-square"></i></span>
                        </h2>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="item">
                                <div class="image"
                                     style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                                <div class="detail">
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
                                <div class="detail">
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
                                <div class="detail">
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
                                <div class="detail">
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
                                <div class="detail">
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
                                <div class="detail">
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

                    <div class="row">
                        <div class="col-12">
                            <div class="load-more">
                                <a href="" class="butt">LOAD MORE <i class="fas fa-arrow-right"></i></a>
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