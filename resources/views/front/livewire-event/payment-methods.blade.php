<form wire:submit.prevent="pay">
    <div class="payments">
        <!-- خيارات الدفع -->
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

        <!-- حقول شحن البطاقة -->
        <div class="recharge-box {{ $paymentMethod == 'card' ? 'active' : '' }}" wire:click="setPaymentMethod('card')">
            <h4>بطاقة شحن رصيد</h4>
            <label>رقم البطاقة</label>
            <input type="text" wire:model="card_number" placeholder="أدخل رقم البطاقة" />
            @error('card_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @if (session()->has('error_no_card'))
                <span class="text-danger">
                    {{ session('error_no_card') }}
                </span>
            @endif

            <label style="display: block">قيمة البطاقة</label>
            <input type="text" wire:model="card_value" placeholder="مثال: 950" />
            @error('card_value')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @if (session()->has('error_no_value'))
            <span class="text-danger">
                {{ session('error_no_value') }}
            </span>
        @endif


            <p style="font-size: 14px; color: green; margin-top: 10px;">
                لشراء بطاقة شحن لحسابك , الدخول الي موقع شراء الشحن في متجر نايف <a href="https://nayefstor.com/recharge-balance/p512525813">https://nayefstor.com/recharge-balance/p512525813</a>
            </p>
        </div>

        <!-- ملخص الدفع -->
        <div class="summary">
            <h2>شحن الرصيد</h2>
            <div><span>المبلغ</span><span>{{ $amount }} $</span></div>
            <div><span>رسوم بوابة الدفع</span><span>1.15 $</span></div>
            <div class="total">
                <span>الإجمالي</span><span>{{ $amount + 1.15 }} $</span>
            </div>
        </div>

        <!-- زر الدفع -->
        @if ($paymentMethod == 'master')
            <button type="button" class="btn payment-buttom" data-bs-toggle="modal" data-bs-target="#masterpayment">
                الانتقال إلى الدفع <i class="bi bi-arrow-left"></i>
            </button>
        @else
            <button type="submit" class="btn payment-buttom">
                الانتقال إلى الدفع <i class="bi bi-arrow-left"></i>
            </button>
        @endif

        <!-- الأخطاء -->
        <div class="mt-2 errors">
            @error('paymentMethod')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- التعليمات -->
        <div class="summary notes">
            <h2>تعليمات</h2>
            <ul>
                <li>إذا واجهتك أي مشكلة في عملية الدفع، أو لم تحصل على الخدمة المقدمة <a href="#">تواصل معنا
                        مباشرةً</a></li>
                <li>بإتمامك لعملية الدفع فإنك توافق على <a href="#">شروط الاستخدام</a></li>
            </ul>
        </div>
    </div>
</form>
