@extends('admin.layouts.master')
@section('title', ' بوابات يدوية ')
@section('wallet-active', 'active')
@section('wallet-collapse', 'show')
@section('css')
    {{--    <!-- DataTables CSS --> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <form action="#" method="get" class="d-flex" style="justify-content: space-between;align-items: center">
                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                        <li>
                            <a href="{{ url('admin/wallet/index') }}" class="all"> المحفظة </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/wallet/payments') }}" class="all"> سجل المدفوعات </a>
                        </li>
                        <li>
                            <a href="#" class="all active"> طرق الدفع </a>
                        </li>
                    </ul>
                </form>

                <form action="#" method="get" class="d-flex"
                    style="justify-content: space-between;align-items: center">
                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                        <li>
                            <a href="{{ url('admin/wallet/payment-methods') }}" class="all"> بوابات تلقائية </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/wallet/payments/card') }}" class="all"> انشاء بطاقة شحن </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/wallet/payments/hand') }}" class="all active"> بوابات يدوية </a>
                        </li>
                    </ul>
                </form>

                <div class="col-xl-12">
                    <div class="card">
                        <div class="gap-1 card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title flex-grow-1"> بوابات يدوية </h4>
                            <a type="button" class="btn btn-sm btn-primary"
                                href="{{ url('admin/wallet/payment/hand/store') }}">
                                اضافة بوابة جديدة
                                <i class="ti ti-plus"></i>
                            </a>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table id="table-search"
                                    class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                    <thead class="bg-light-subtle table-primary-custome">
                                        <tr>
                                            <th>#</th>
                                            <th> اسم البوابة </th>
                                            <th> حالة البوابة </th>
                                            <th> تاريخ الاضافة </th>
                                            <th> اجراءات متقدمة </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($handPayments as $payment)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td> {{ $payment->name }} </td>
                                                <td>
                                                    @if ($payment->status == 1)
                                                        <span class="badge bg-success"> مفعل </span>
                                                    @elseif($payment->status == 0)
                                                        <span class="badge bg-danger"> غير مفعل </span>
                                                    @endif
                                                </td>
                                                <td> {{ $payment->created_at->format('Y-m-d') }}
                                                </td>
                                                <td>
                                                    <div class="gap-2 d-flex">
                                                        @livewire('admin.wallet.hand-payment-change-status', ['handPayment' => $payment])
                                                        <a class="color-primary"
                                                            href="{{ url('admin/wallet/payment/hand/update', $payment->id) }}">
                                                            <i class="ti ti-edit"></i>
                                                        </a>
                                                        <button type="button" class="color-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_hand_{{ $payment->id }}">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            @include('admin.wallet.payment-methods.payment-hands._delete')
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--    <!-- DataTables JS --> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // تحقق ما إذا كان الجدول قد تم تهيئته من قبل
            if ($.fn.DataTable.isDataTable('#table-search')) {
                $('#table-search').DataTable().destroy(); // تدمير التهيئة السابقة
            }

            // تهيئة DataTables من جديد
            $('#table-search').DataTable({
                'ordering': false,
                "language": {
                    "search": "بحث:",
                    "lengthMenu": "عرض _MENU_ عناصر لكل صفحة",
                    "zeroRecords": "لم يتم العثور على سجلات",
                    "info": "عرض _PAGE_ من _PAGES_",
                    "infoEmpty": "لا توجد سجلات متاحة",
                    "infoFiltered": "(تمت التصفية من إجمالي _MAX_ سجلات)",
                    "paginate": {
                        "previous": "السابق",
                        "next": "التالي"
                    }
                }
            });
        });
    </script>

    <script>
        function copyToClipboard(button) {
            event.preventDefault();
            const input = document.getElementById("cardNumber");
            // نسخ النص
            navigator.clipboard.writeText(input.value).then(() => {
                // حفظ الأيقونة الأصلية
                const icon = button.querySelector('i');
                const originalClass = icon.className;

                // تغيير الأيقونة إلى علامة صح
                icon.className = 'fa fa-check text-success';

                // بعد ثانيتين، تعود الأيقونة
                setTimeout(() => {
                    icon.className = originalClass;
                }, 2000);
            });
        }
    </script>

@endsection
