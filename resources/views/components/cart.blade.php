@props(['color' => 'gray', 'size' => 35])

@php
    switch ($color) {
        case 'gray':
            $col = "#374151";
            break;
        case 'white':
            $col = "#ffffff";
            break;
    
        default:
            $col = "#374151";
            break;
    }
@endphp

<svg xmlns="http://www.w3.org/2000/svg" width="{{$size}}" height="{{$size}}" viewBox="0 0 24 24" fill="none" stroke="currentColor"
    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" >
    <circle color="{{$col}}" cx="9" cy="21" r="1" ></circle>
    <circle color="{{$col}}" cx="20" cy="21" r="1" ></circle>
        <path color="{{$col}}" d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
</svg>
