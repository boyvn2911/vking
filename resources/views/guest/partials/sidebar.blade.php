<div id="sidebar">
    @if( Request::segment(1) == 'category' )
        <h4>Category</h4>
    @elseif( Request::segment(1) == 'brand' )
        <h4>Brand</h4>
    @endif

    <a href="{{asset('new-list')}}">NEW ARRIVALS</a>
    <a href="{{asset('hot-list')}}">HOT ITEMS</a>
    <a href="{{asset('sale-list')}}">SALE ITEMS</a>
</div>