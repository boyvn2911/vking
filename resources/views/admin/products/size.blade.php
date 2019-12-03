@if( $sizes )
    <label>Size <span title="Thông tin bắt buộc"> * </span></label>
    <div class="form-group">
        @foreach($sizes as $key => $size)
            <input name="size[]" @if( in_array( ($key+1),$current_sizes) ) checked @endif type="checkbox" value="{{$key + 1}}"> {{ $size }}
        @endforeach
    </div>
@endif