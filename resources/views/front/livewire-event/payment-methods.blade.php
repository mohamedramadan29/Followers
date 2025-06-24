<form action="" wire:submit.prevent="pay">
    <div class="payments">
        <div class="payment-option {{ $paymentMethod == 'master' ? 'active' : '' }}"
            wire:click="setPaymentMethod('master')">
            <input id="payment1" type="radio" name="payment" {{ $paymentMethod == 'master' ? 'checked' : '' }} />
            <label for="payment1">
                <img src="{{ asset('assets/front/uploads/payments/master-visa1.png') }}" alt="">
            </label>
        </div>
        <div class="payment-option {{ $paymentMethod == 'paypal' ? 'active' : '' }}"
            wire:click="setPaymentMethod('paypal')">
            <input id="payment2" type="radio" name="payment" {{ $paymentMethod == 'paypal' ? 'checked' : '' }} />
            <label for="payment2">
                <img src="{{ asset('assets/front/uploads/payments/paypal.png') }}" alt="">
            </label>
        </div>
        <div class="payment-option {{ $paymentMethod == 'usdt' ? 'active' : '' }}"
            wire:click="setPaymentMethod('usdt')">
            <input id="payment3" type="radio" name="payment" {{ $paymentMethod == 'usdt' ? 'checked' : '' }} />
            <label for="payment3">
                <img src="{{ asset('assets/front/uploads/payments/usdt1.png') }}" alt="">
            </label>
        </div>
        <div class="recharge-box {{ $paymentMethod == 'card' ? 'active' : '' }}" wire:click="setPaymentMethod('card')">
            <h4>بطاقة شحن رصيد</h4>
            <label>رقم البطاقة</label>
            <input type="text" placeholder="أدخل رقم البطاقة" />

            <label>قيمة البطاقة</label>
            <input type="text" placeholder="مثال: 950" />

            <p style="font-size: 14px; color: green; margin-top: 10px;">
                (+) لشحن بطاقة شحن لحسابك، الدخول إلى موقع الشحن من منصة منجز
            </p>

            <button>شحن رصيد</button>
        </div>

        <div class="summary">
            <h2> شحن الرصيد </h2>
            <div><span>المبلغ</span><span>{{ $amount }} $ </span></div>
            <div><span>رسوم بوابة الدفع</span><span> 1.15 $</span></div>
            <div class="total">
                <span>الإجمالي</span><span>{{ $amount + 1.15 }} $ </span>
            </div>
        </div>
        @if ($paymentMethod == 'master')
            {{--   Model Card Payment --}}
                <button type="button" class="btn payment-buttom" data-bs-toggle="modal"
                    data-bs-target="#masterpayment">
                    الانتقال الي الدفع <i class="bi bi-arrow-left"></i>
                </button>
        @else
            <button type="submit" class="btn payment-buttom"> الانتقال الي الدفع <i class="bi bi-arrow-left"></i>
            </button>
        @endif
        <div class="mt-2 errors">
            @error('paymentMethod')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="summary notes">
            <h2> تعليمات </h2>
            <ul>
                <li> اذا واجهتك أي مشكلة في عملية الدفع، أو لم تحصل على الخدمة المقدمة <a href='#'> تواصل معنا
                        مباشرةً
                    </a> </li>
                <li> بإتمامك لعملية الدفع فإنك توافق على <a href="#"> شروط الاستخدام </a> </li>
            </ul>
        </div>
    </div>
</form>
