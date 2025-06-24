@extends('front.layouts.master')
@section('title', ' طلباتي ')
@section('css')
    {{--    <!-- DataTables CSS --> --}}
    <script
        src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}&currency=USD&components=buttons,funding-eligibility">
    </script>

    <style>
        #paypal-button-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #paypal-button-container .paypal-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #paypal-button-container .paypal-button {
            width: 100%;
            padding: 10px;
            background-color: #ffc439;
            border: none;
            color: #000;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        #paypal-button-container .card-button {
            background-color: #000;
            color: #fff;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div id="paypal-button-container"></div>
    </div>
@endsection
@section('js')
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $amount }}',
                            currency_code: 'USD'
                        }
                    }],
                    application_context: {
                        shipping_preference: 'NO_SHIPPING'
                    }
                });
            },
            // onApprove: function(data, actions) {
            //     return actions.order.capture().then(function(details) {
            //         window.location.href = '{{ route('payment.paypal.success') }}?token=' + details.id;
            //     });
            // },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    window.location.href = '{{ route('payment.card.success') }}?orderID=' + data
                        .orderID;
                });
            },
            onCancel: function(data) {
                window.location.href = '{{ route('payment.card.cancel') }}';
            },
            onError: function(err) {
                console.error('خطأ في الدفع:', err);
                window.location.href = '{{ route('payment.card.cancel') }}';
            }
        }).render('#paypal-button-container');

        paypal.Buttons({
            fundingSource: paypal.FUNDING.CARD,
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $amount }}',
                            currency_code: 'USD'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    window.location.href = '{{ route('payment.card.success') }}?orderID=' + data
                        .orderID;
                });
            },
            onCancel: function(data) {
                window.location.href = '{{ route('payment.card.cancel') }}';
            },
            onError: function(err) {
                console.error('خطأ في الدفع:', err);
                window.location.href = '{{ route('payment.card.cancel') }}';
            }
        }).render('#paypal-button-container');
    </script>

@endsection
