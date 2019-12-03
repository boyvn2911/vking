@if( isset($product) )
    <div class="goosefeathers">
        <a href="/">VKingAuthentic.Com</a>
        /
        <a href="{{ asset('brand/'.($product->brand->slug ?? '').'/'.$product->brand->id ) }}">{{$product->brand->name ?? ''}}</a>
        /
        <a class="active">{{$product->name ?? ''}}</a>
    </div>
@endif
@if( isset($products) )
    <div class="goosefeathers">
        <a href="/">VKingAuthentic.Com</a>
        /
        <a href="">{{ Request::segment('2') }}</a>
    </div>
@endif