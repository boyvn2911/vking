<div class="sub-header"></div>
<div id="header">
    <section id="header-top">
        <div class="container">
            <div class="row justify-content-center">
                HÀNG HIỆU AUTHENTIC - 14 TRƯƠNG HÁN SIÊU - <a href="tel:+84948181488"><b
                            style="margin-left:3px; font-weight: bold;">094 818 1488</b></a>
            </div>
        </div>
    </section>

    <section id="header-bot">
        <div class="container brik">
            <div class="row justify-content-between">
                <div id="social">
                    <a href="https://www.instagram.com/hoangnguyenauthentic/" class="social-icon"><i
                                class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/authentic14ths" class="social-icon"><i
                                class="fab fa-facebook-f"></i></a>
                </div>
                <div id="header-nav">
                    <ul>
                        <li class="brand">thương hiệu</li>
                        <li><a href="/"><img src="{{ asset('resources/assets/image/logo.png') }}"></a></li>
                        <li class="category">danh mục</li>
                    </ul>
                </div>
                <div id="search">
                    {{--<a><i class="fas fa-search"></i></a>--}}
                </div>
            </div>
        </div>

        <div class="container down">
            <div class="row">
                <a href="{{asset('new-list')}}" class="col-4 col-md-3">NEW ARRIVALS</a>
                <a href="{{asset('hot-list')}}" class="col-4 col-md-3">HOT ITEMS</a>
                <a href="{{asset('sale-list')}}" class="col-4 col-md-3">SALE ITEMS</a>
            </div>
            <hr>
            <div class="bran">
                <div class="row">
                    @foreach($brands as $brand)
                        <a href="{{ asset('brand/'.$brand->slug.'/'.$brand->id) }}"
                           class="col-6 col-md-3">{{$brand->name}}</a>
                    @endforeach
                </div>
            </div>

            <div class="cate">
                <div class="row">
                    @foreach($categories as $category)
                        <a href="{{ asset('category/'.$category->slug.'/'.$category->id) }}"
                           class="col-6 col-md-3">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>