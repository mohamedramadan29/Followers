<div class="text-center most-ordered-card">
    <img src="{{ $service->Image() }}" class="mb-2 most-ordered-img" alt="{{ $service->name }}">
    <div class="most-ordered-title">
        <a href="{{ url('product/' . $service['slug']) }}" class="link">
            {{ $service->name }}
        </a>
    </div>
    <div class="most-ordered-desc-card">{!! str($service->description)->limit(50) !!}</div>
    <div class="mt-2 mb-1 most-ordered-rating">
        <span>({{ $service->Reviews->count() }})</span>
        <span class="stars ms-1">
            @for ($i = 0; $i < 5; $i++)
                @if ($i < $service->Reviews->avg('rate'))
                    <i class="fa fa-star text-warning"></i>
                @else
                    <i class="fa fa-star text-gray" style="color: #bcbbbb"></i>
                @endif
            @endfor
        </span>
    </div>
    @if(isset($service->getServiceDataFromProvider($service->Provider, $service->service_id)->rate))
    <div class="most-ordered-price"> <span style="color: #5D5FED">
        {{ $service->getServiceDataFromProvider($service->Provider, $service->service_id)->rate + ($service->profit_percentage / 100) * $service->getServiceDataFromProvider($service->Provider, $service->service_id)->rate }}
        $ </span> <img src="{{ asset('assets/front/uploads/sar-price.svg') }}" alt=""> /
    {{ $service->getServiceDataFromProvider($service->Provider, $service->service_id)->min }}
</div>
    @endif

</div>
