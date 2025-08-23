<div class="modal fade" id="show_invoice_details_{{ $transaction->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    الايداع عن طريق
                    @if ($transaction->payment_method == 'paypal')
                        باي بال
                    @elseif($transaction->payment_method == 'card')
                        بطاقات الباي بال
                    @elseif($transaction->payment_method == 'usdt')
                        العملات الرقمية
                    @else
                        التحويل البنكي ({{ $transaction->payment_method }})
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p> التاريخ / الوقت </p>
                        <p> رقم الحوالة </p>
                        <p> اسم المستخدم </p>
                        <p> بوابة الدفع </p>
                        <p> المبلغ </p>
                        {{-- <p> نسبة الرسوم </p>
                        <p> المعدل </p> --}}
                        <p> صافي المبلغ </p>
                        <p> حالة الحوالة </p>
                    </div>
                    <div>
                        <p> {{ $transaction->created_at->format('Y-m-d H:i A') }} </p>
                        <p> {{ $transaction->id }} </p>
                        <p> {{ $transaction->user->name }} </p>
                        <p>
                            @if ($transaction->payment_method == 'paypal')
                                باي بال
                            @elseif($transaction->payment_method == 'card')
                                بطاقات الباي بال
                            @elseif($transaction->payment_method == 'usdt')
                                العملات الرقمية
                            @else
                                التحويل البنكي ({{ $transaction->payment_method }})
                            @endif </p>
                        <p> {{ $transaction->amount }} $ </p>
                        {{-- <p> {{ $transaction->commission }} % </p>
                        <p> {{ $transaction->exchange_rate }} ريال سعودي </p> --}}
                        <p> {{ $transaction->total_amount }} ريال سعودي </p>
                        <p> @if ($transaction->payment_status == 'pending')
                            <span class="badge badge-warning bg-warning">
                                معلق </span>
                        @else
                            <span class="badge badge-success bg-success">
                                {{ $transaction->payment_status == 'completed' ? 'مكتملة' : 'قيد الانتظار' }}
                            </span>
                        @endif </p>
                    </div>


                </div>
            </div>
        </div>
    </div>
