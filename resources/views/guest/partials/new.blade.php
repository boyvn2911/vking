@foreach($products as $product)
    <div class="col-6 col-md-6 col-lg-4">
        <div class="item @if($product->price_sale != null) sale @endif">
            <a href="{{ asset('detail/'.$product->slug.'/'.$product->id) }}" class="image"
               style="background-image: url({{ asset('storage/upload/resized-'.@unserialize($product->image)[0]) }});"></a>
            <a href="{{ asset('detail/'.($product->slug ?? '').'/'.($product->id ?? '')) }}" class="detail">
                <div class="name">{{$product->name ?? ''}}</div>
                <div class="brand"><span class="ribbon">{{$product->brand->name ?? ''}}</span></div>
                <div class="price">
                    {{--<span class="price-org">{{number_format($product->price_org ?? '')}}</span>--}}
                    {{--@if($product->price_sale == null)--}}
                        {{--<span class="price-vking">{{number_format($product->price_vking ?? '')}}</span>--}}
                    {{--@else--}}
                        {{--<span class="price-sale">{{number_format($product->price_sale ?? '')}}</span>--}}
                    {{--@endif--}}
                </div>
            </a>
        </div>
    </div>
@endforeach