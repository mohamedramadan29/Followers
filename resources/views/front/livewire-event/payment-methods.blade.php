<form wire:submit.prevent="pay">
    <div class="payments">
        <!-- خيارات الدفع -->
        <div class="payment-option {{ $paymentMethod == 'master' ? 'active' : '' }}"
            wire:click="setPaymentMethod('master')">
            <input style="display: none" id="payment1" type="radio" name="payment"
                {{ $paymentMethod == 'master' ? 'checked' : '' }} />
            <label for="payment1">
                <img src="{{ asset('assets/front/uploads/payments/master-visa1.png') }}" alt="">
            </label>
        </div>
        <div class="payment-option {{ $paymentMethod == 'paypal' ? 'active' : '' }}"
            wire:click="setPaymentMethod('paypal')">
            <input style="display: none" id="payment2" type="radio" name="payment"
                {{ $paymentMethod == 'paypal' ? 'checked' : '' }} />
            <label for="payment2">
                <img src="{{ asset('assets/front/uploads/payments/paypal.png') }}" alt="">
            </label>
        </div>
        <div class="payment-option {{ $paymentMethod == 'usdt' ? 'active' : '' }}"
            wire:click="setPaymentMethod('usdt')">
            <input style="display: none" id="payment3" type="radio" name="payment"
                {{ $paymentMethod == 'usdt' ? 'checked' : '' }} />
            <label for="payment3">
                <img src="{{ asset('assets/front/uploads/payments/usdt1.png') }}" alt="">
            </label>
        </div>
        <div class="payment-option {{ $paymentMethod == 'card' ? 'active' : '' }}"
            wire:click="setPaymentMethod('card')">
            <input style="display: none" id="payment4" type="radio" name="payment"
                {{ $paymentMethod == 'card' ? 'checked' : '' }} />
            <label for="payment4">
                بطاقة شحن رصيد
            </label>
        </div>
        <!-- حقول شحن البطاقة -->
        <div class="recharge-box" style="display: {{ $paymentMethod == 'card' ? 'block' : 'none' }}">
            <label>رقم البطاقة</label>
            <input type="text" wire:model.live="card_number" placeholder="أدخل رقم البطاقة" />
            @error('card_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @if (session()->has('error_no_card'))
                <span class="text-danger">
                    {{ session('error_no_card') }}
                </span>
            @endif

            <label style="display: block">قيمة البطاقة</label>
            <input readonly type="number" wire:model="card_value" placeholder="مثال: 950" />
            @error('card_value')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @if (session()->has('error_no_value'))
                <span class="text-danger">
                    {{ session('error_no_value') }}
                </span>
            @endif

            <p style="font-size: 14px; color: green; margin-top: 10px;">
                لشراء بطاقة شحن لحسابك، الدخول إلى موقع شراء الشحن في متجر نايف
                <a href="https://nayefstor.com/recharge-balance/p512525813">https://nayefstor.com/recharge-balance/p512525813</a>
            </p>
        </div>

        <div class="payment-option {{ $paymentMethod == 'bank' ? 'active' : '' }}"
            wire:click="setPaymentMethod('bank')">
            <input style="display: none" id="paymentbank" type="radio" name="payment"
                {{ $paymentMethod == 'bank' ? 'checked' : '' }} />
            <label for="paymentbank">
                تحويل بنكي    <img src="{{ asset('assets/front/uploads/payments/bank1.png') }}" alt=""> <img src="{{ asset('assets/front/uploads/payments/bank2.png') }}" alt="">
            </label>
        </div>
        <!-- حقول شحن البطاقة -->
        <div class="recharge-box" style="display: {{ $paymentMethod == 'bank' ? 'block' : 'none' }}">
            <label>  طريقة الدفع  </label>
            <select name="select_bank" id="select_bank" class="form-control" wire:model='select_bank' wire:change="getBankDetails">
                <option value="">اختر طريقة الدفع</option>
                @foreach ($banks as $bank)
                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                @endforeach
            </select>
            @error('select_bank')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div>
                <label for=""> صاحب الحساب  </label>
                <input readonly disabled type="text" wire:model.live="account_name" placeholder=" صاحب الحساب">
            </div>
            <div>
                <label for=""> رقم الحساب  </label>
                <input readonly disabled type="text" wire:model.live="account_number" placeholder=" رقم الحساب">
            </div>
            <div>
                <label for=""> الايبان  </label>
                <input readonly disabled type="text" wire:model.live="iban" placeholder=" الايبــان  ">
            </div>

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

        {{-- <!-- زر الدفع -->
        @if ($paymentMethod == 'master')
            <button type="button" class="btn payment-buttom" data-bs-toggle="modal" data-bs-target="#masterpayment">
                الانتقال إلى الدفع <i class="bi bi-arrow-left"></i>
            </button>
        @else
            <button type="submit" class="btn payment-buttom">
                الانتقال إلى الدفع <i class="bi bi-arrow-left"></i>
            </button>

        @endif --}}


        <!-- زر الدفع -->
        <div class="button-wrapper">
            @if ($paymentMethod == 'master')
                <button type="button" class="btn payment-buttom" data-bs-toggle="modal"
                    data-bs-target="#masterpayment">
                    الانتقال إلى الدفع <i class="bi bi-arrow-left"></i>
                    <span wire:loading wire:target="pay" class="spinner-border spinner-border-sm" role="status"
                        aria-hidden="true"></span>
                </button>
            @else
                <button wire:loading.attr="disabled" wire:loading.class="loading" type="submit"
                    class="btn payment-buttom">
                    <span wire:loading.remove>الانتقال إلى الدفع</span>
                    <span wire:loading wire:target="pay" class="spinner-border spinner-border-sm" role="status"
                        aria-hidden="true"></span>
                    <span wire:loading wire:target="pay">جارٍ التحميل...</span>
                    <i class="bi bi-arrow-left" wire:loading.remove wire:target="pay"></i>
                </button>
            @endif
        </div>
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
