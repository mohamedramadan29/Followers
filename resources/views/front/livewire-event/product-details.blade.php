<form action="{{ route('make_order') }}" autocomplete="off" method="post" class="form-select-product-details">
    @csrf
    <p class="product-title"> {{ $service['meta_description'] }} </p>
    @if ($service->Reviews->count() > 0)
        <span class="gap-1 d-flex align-items-center stars">
            <span class="star-rating">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < $service->Reviews->avg('rate'))
                        <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                    @else
                        <span class="star-rating__item font-11" style="color: #bcbbbb"><i class="fas fa-star"></i></span>
                    @endif
                @endfor
            </span>
            <span class="star-rating__text text-body"> (
                {{ $service->Reviews->count() }} تقيم ) </span>
        </span>
    @endif
    <div class="mb-3 col-sm-12 col-xs-12">

        <input type="hidden" name="product_id" value="{{ $service->id }}" id="">
        <input style="display: none" wire:model.live='website_serv_id' type="text" name="website_serv_id">
        <input style="display: none" required wire:model.live='main_service' type="text" name="main_service">
        <input style="display: none" type="text" wire:model.live='provider_id' required name="provider_id">
        <input style="display: none" type="text" wire:model.live ='service_refill' name="service_refill">
        <input style="display: none" type="text" wire:model.live='service_cancel' name="service_cancel">
        <input style="display: none" type="text" name="service_type" id="" wire:model.live='service_type'>
        <label for="Stateee" class="mb-2 form-label font-18 font-heading fw-600">
            حدد
            الخدمة </label>
        <div class="select-has-icon">
            <select class="border common-input" wire:model.live="sub_service_id" name="sub_service_id">
                <option selected wire:click="returnToMainService" value="{{ $service->provider_service_id }}">
                    {{ $service->name }} </option>
                @if ($service->SubServices->count() > 0)
                    @foreach ($service->SubServices as $subservice)
                        <option wire:click="updatedSubServiceId({{ $subservice['id'] }})"
                            value="{{ $subservice['id'] }}">
                            {{ $subservice['name'] }} </option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="mb-3 col-sm-12 col-xs-12">
        <div class="service_price">
            <p> السعر لكل <span>{{ $min }}</span>
            </p>
            <h6>
                {{ number_format($final_price, 4) }} $
            </h6>
        </div>
    </div>
    <div class="mb-3 col-sm-12 col-xs-12">
        <label for="account_link" class="mb-2 form-label font-18 font-heading fw-600">
            الرابط </label>
        <input required type="url" name="account_link" class="border common-input common-input--grayBg"
            id="account_link" placeholder=" ضع رابط القناة أو الجروب هنا... ">
    </div>
    <div class="mb-3 col-sm-12 col-xs-12">
        <label for="follower_num" class="mb-2 form-label font-18 font-heading fw-600">
            الكمية
        </label>
        <input type="number" required min="{{ $min }}" max="{{ $max }}" name="followers_num"
            wire:model.live="followers_num" class="common-input" id="follower_num" placeholder="ادخل العدد المطلوب">
        @if ($followers_num < $min)
            <span class="text text-danger">
                الحد الأدنى لطلب الخدمة هو {{ $min }}
            </span>
        @endif
        <div class="min_max_quantity">
            <p> الحد الأدنى لطلب الخدمة هو <span>{{ $min }}</span>
            </p>
            <p> الحد الأقصى لطلب الخدمة هو <span>{{ $max }}</span>
            </p>
        </div>
    </div>
    <!-- New Speed -->
    <!---- ########################## New Speed Average Calc ######################## --->
    @if ($average_execution_time)
        <div class="col-sm-12 col-xs-12">
            <label for="account_link" class="mb-2 form-label font-18 font-heading fw-600">
                السرعة </label>
        </div>
        <div class="mb-3 col-sm-12 col-xs-12">
            <div class="price_section">
                <h4 class="price">

                    <span>{{ $average_execution_time }}</span>
                    <span> دقيقة </span>
                </h4>
            </div>
            <div class="min_max_quantity">
                <p> متوسط مدة التنفيذ بناءً على آخر 10 طلبات </p>
            </div>
        </div>
    @endif
    <!---- ################# End New Speed Average Calc  ########################--->
    <!-- End New Speed  -->
    <div class="col-sm-12 col-xs-12">
        <label for="account_link" class="mb-2 form-label font-18 font-heading fw-600">
            السعــر </label>
    </div>
    <div class="mb-3 col-sm-12 col-xs-12 last_price">
        <div class="price_section">
            <h4 class="price">
                <span>{{ number_format($final_price, 4) }}</span>
                <span> $ </span>
            </h4>
            <input style="display: none" type='text' wire:model.live="final_price" name="final_price">
            <input style="display: none" type="text" wire:model.live="provider_final_price" name="provider_final_price">
        </div>
    </div>
    <button type="submit" wire:loading.class="disabled"
        class="gap-2 mt-32 btn btn-main d-flex w-100 justify-content-center align-items-center pill px-sm-5">
        تأكيد الطلب
        <img width="20px" src="{{ asset('assets/front/') }}/images/icons/shopping.png" alt="">
    </button>
    <div class="service_advantages">
        <div class="row">
            <div class="col-lg-3 col-6">
                @if ($speed_active == 1)
                    <div class="info">
                        <i class="bi bi-lightning"></i>
                        <p> السرعة </p>
                        <h5> {{ $speed_active_text }} </h5>
                    </div>
                @else
                    <div class="info disabled">
                        <i class="bi bi-lightning"></i>
                        <p> السرعة </p>
                        <h5> غير متاح </h5>
                    </div>
                @endif
            </div>
            <div class="col-lg-3 col-6">
                @if ($start_time == 1)
                    <div class="info">
                        <i class="bi bi-alarm"></i>
                        <p> وقت البدء </p>
                        <h5> {{ $start_time_text }} </h5>
                    </div>
                @else
                    <div class="info disabled">
                        <i class="bi bi-alarm"></i>
                        <p> وقت البدء </p>
                        <h5> غير متاح </h5>
                    </div>
                @endif
            </div>
            <div class="col-lg-3 col-6">
                @if ($security == 1)
                    <div class="info">
                        <i class="bi bi-trophy"></i>
                        <p> الضمان </p>
                        <h5> <i style="font-size: 12px;color:#23B120" class="fa fa-check-circle"></i>
                            {{ $security_text }} </h5>
                    </div>
                @else
                    <div class="info disabled">
                        <i class="bi bi-trophy"></i>
                        <p> الضمان </p>
                        <h5> غير متاح </h5>
                    </div>
                @endif
            </div>
            <div class="col-lg-3 col-6">
                @if ($quality_status == 1)
                    <div class="info">
                        <i class="bi bi-check-square"></i>
                        <p> الجودة </p>
                        <div class="progress" role="progressbar" aria-label="Basic example"
                            aria-valuenow="{{ $quality_percentage }}" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: {{ $quality_percentage }}%">
                            </div>
                        </div>
                    </div>
                @else
                    <div class="info disabled">
                        <i class="bi bi-check-square"></i>
                        <p> الجودة </p>
                        <h5> غير متاح </h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</form>
