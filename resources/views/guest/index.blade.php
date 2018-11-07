@extends('guest.layout')

@section('css')
    <link rel="stylesheet" href="/resources/assets/css/index.css">
@stop

@section('script')
@stop

@section('main')
    <section id="banner">
        <div id="bann" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active"
                     style="background-image: url({{ asset('resources/assets/image/banner.png') }})">
                    <h3>New Arrival</h3>
                    <a href="" class="butt">XEM TIẾP <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="carousel-item"
                     style="background-image: url({{ asset('resources/assets/image/offer.png') }})">
                    <h3>New Arrival</h3>
                    <a href="" class="butt">XEM TIẾP <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="carousel-item"
                     style="background-image: url({{ asset('resources/assets/image/banner.png') }})">
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
                    ITEM HOT
                    <span class="line-decor"><i class="far fa-square"></i></span>
                </h2>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="detail">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <span class="price-sale">400.000 VNĐ</span>
                                <span class="price-org">999.000 VNĐ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="detail">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <span class="price-vking">800.000 VNĐ</span>
                                <span class="price-org">999.000 VNĐ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="detail">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <span class="price-sale">400.000 VNĐ</span>
                                <span class="price-org">999.000 VNĐ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="detail">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <a href="https://www.facebook.com/messages/t/authentic14ths">GIÁ LIÊN HỆ</a>
                            </div>
                        </div>
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
                        <h2>SPECIAL OFFER
                            <span class="line-decor"><i class="far fa-square"></i></span>
                        </h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, </p>

                        <a href="" class="butt">XEM TIẾP <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="new-arrival">
        <div class="container">
            <div class="text-center">
                <h2>
                    ITEM HOT
                    <span class="line-decor"><i class="far fa-square"></i></span>
                </h2>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="detail-real">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <span class="price-sale">400.000 VNĐ</span>
                                <span class="price-org">999.000 VNĐ</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="detail-real">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <a href="https://www.facebook.com/messages/t/authentic14ths">GIÁ LIÊN HỆ</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="detail-real">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <span class="price-sale">400.000 VNĐ</span>
                                <span class="price-org">999.000 VNĐ</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="detail-real">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <span class="price-sale">400.000 VNĐ</span>
                                <span class="price-org">999.000 VNĐ</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="item">
                        <div class="image"
                             style="background-image: url(https://cdn.raffaello-network.com/ti%E1%BA%BFng-vi%E1%BB%87t/fashion-details/461877/1541/gucci-qu%E1%BA%A7n-%C3%81o-tr%E1%BA%BB-em_gukclo-504253x9p07x9p07-4212-medium-1.jpg);"></div>
                        <div class="detail-real">
                            <div class="name">Áo Phông đen</div>
                            <div class="brand">Gucci</div>
                            <div class="price">
                                <span class="price-sale">400.000 VNĐ</span>
                                <span class="price-org">999.000 VNĐ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
