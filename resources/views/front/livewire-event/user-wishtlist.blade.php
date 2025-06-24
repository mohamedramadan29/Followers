<!-- =========================== Most Requested Services Section Start ========================== -->
<section class="py-5 most-ordered-section">
    <div class="container">
        <div class="most-ordered-slider position-relative">
            <div class="row">
                <!-- كرر هذا البلوك لكل خدمة -->
                @foreach ($wishlist as $index => $service)
                    <div class="col-6 col-md-4 col-lg-3" wire:key="wishlist-{{ $service->product_id }}">
                        <div class="text-center service-card">
                            <div class="text-center">
                                <div class="mb-3 service-card__icon" style="position:relative">
                                    <div class="wishlist-heart">
                                        <button wire:click="removeFromWishlist({{ $service->product_id }})" class="active">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </div>
                                    <img src="{{ $service->product->Image() }}" class="service-icon-img"
                                        alt="{{ $service->product->name }}">
                                </div>
                                <div class="most-ordered-title">
                                    <a href="{{ url('product/' . $service->product->slug) }}" class="link">
                                        {{ str($service->product->name)->limit(30) }}
                                    </a>
                                </div>
                                <div class="most-ordered-desc-card">{!! str($service->product->description)->limit(50) !!}</div>
                                <div class="mt-2 mb-1 most-ordered-rating">
                                    <span>({{ $service->product->Reviews->count() }})</span>
                                    <span class="stars ms-1">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $service->product->Reviews->avg('rate'))
                                                <i class="fa fa-star text-warning"></i>
                                            @else
                                                <i class="fa fa-star text-gray" style="color: #bcbbbb"></i>
                                            @endif
                                        @endfor
                                    </span>
                                </div>
                                <div class="most-ordered-price">
                                    <span style="color: #5D5FED">
                                        {{ $service->product->getServiceDataFromProvider($service->product->Provider, $service->product->service_id)->rate + ($service->profit_percentage / 100) * $service->product->getServiceDataFromProvider($service->product->Provider, $service->product->service_id)->rate }}
                                        $
                                    </span>
                                    <img src="{{ asset('assets/front/uploads/sar-price.svg') }}" alt=""> /
                                    {{ $service->product->getServiceDataFromProvider($service->product->Provider, $service->product->service_id)->min }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .wishlist-heart {
            position: absolute;
            left: 0;
            top: -23px;
            background: #ebe6e6;
            padding: 10px;
            border-radius: 50%;
            color: red
        }

        .wishlist-heart i {
            color: red
        }
    </style>
</section>
<!-- =========================== Most Requested Services Section End ========================== -->

 