@extends('admin.layouts.master')
@section('title', 'اسئلة وتدريب البوت')
@section('chatboot-active', 'active')
@section('chatboot-collapse', 'show')
@section('css')
    {{--    <!-- DataTables CSS --> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <div class="row">
                @if ($faqs->isEmpty())
                    <div class="empty-data">
                        <div class="row">
                            <div class="empty-image">
                                <img src="{{ asset('assets/admin/images/empty.png') }}" alt="">
                            </div>
                            <div class="empty-info">
                                <h4> لا توجد مقالات جديدة في الوقت الحالي </h4>
                                <p>
                                    نعمل على تحديث المقالات بشكل مستمر. تابعنا لتحصل على آخر التحديثات قريبًا! , "نحن نعد
                                    العدة لتقديم محتوى المقالات مميز وشامل."
                                    <br>
                                    "ترقبوا آخر البيانات قريبًا!"
                                </p>
                                <a href="{{ url('admin/bootfaq/add') }}" class="btn btn-sm btn-primary">
                                    اضافة سؤال جديد
                                    <i class="ti ti-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="gap-1 card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title flex-grow-1"> اسئلة وتدريب البوت </h4>
                               @livewire('admin.boot-faq.active-status')
                                <a href="{{ url('admin/bootfaq/add') }}" class="btn btn-sm btn-primary">
                                    اضافة سؤال جديد
                                    <i class="ti ti-plus"></i>
                                </a>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table id="table-search"
                                        class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                        <thead class="bg-light-subtle table-primary-custome">
                                            <tr>
                                                <th># </th>
                                                <th> السوال </th>
                                                <th> الاجابة </th>
                                                <th> الكلمات المفتاحية </th>
                                                <th> عدد الاستخدامات </th>
                                                <th> العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($faqs as $faq)
                                                <tr>
                                                    <td> {{ $loop->iteration }} </td>
                                                    <td> {{ $faq['question'] }} </td>
                                                    <td> {!! $faq['answer'] !!} </td>
                                                    <td>
                                                        @if ($faq['keywords'] == null)
                                                            <span class="badge badge-danger">لا يوجد</span>
                                                        @else
                                                        @php
                                                            $keywords = explode(',', $faq['keywords']);
                                                        @endphp
                                                            @foreach ($keywords as $keyword)
                                                                <span class="badge badge-primary bg-success">{{ $keyword }}</span>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td> {!! $faq['usage_count'] !!} </td>
                                                    <td>
                                                        <div class="gap-2 d-flex">
                                                            <a href="{{ url('admin/bootfaq/update/' . $faq['id']) }}"
                                                                class="color-primary">
                                                                <i class="ti ti-edit"></i>
                                                            </a>
                                                            <button type="button" class="color-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete_bootfaq_{{ $faq['id'] }}">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                @include('admin.BootFaqs.delete')
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
        <!-- End Container Fluid -->

    </div>
    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->

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
@endsection
