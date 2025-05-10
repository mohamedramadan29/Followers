@extends('admin.layouts.master')
@section('title')
    الرئيسية
@endsection
@section('content')
    <!-- ==================================================== -->
    <!-- Start right Content here -->
    <!-- ==================================================== -->
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <!-- Start here.... -->
            <div class="row main-statistics">
                <div class="col-12">
                    <h5> إحصائيات الشهر <span> ( شهر فبراير ) </span> </h5>
                    <p> ملخص الشهر </p>
                </div>
                <div class="stat-details">
                    <div class="info" style="background-color: #B2FFE8">
                        <i class="bi bi-bag-fill" style="background-color: #25FFBD"></i>
                        <h4> 5353 </h4>
                        <p> الزيارات </p>
                    </div>
                    <div class="info" style="background-color: #FFF4DE">
                        <i class="bi bi-file-text-fill" style="background-color: #FF947A"></i>
                        <h4> {{ count(\App\Models\front\Order::all()) }} </h4>
                        <p> الطلبات </p>
                    </div>
                    <div class="info" style="background-color: #E6DBF3">
                        <i class="bi bi-person-add" style="background-color: #BF83FF"></i>
                        <h4> 5353 </h4>
                        <p> عملاء جدد </p>
                    </div>
                    <div class="info" style="background-color: #CAD5FF">
                        <i class="bi bi-person-vcard" style="background-color: #7993FF"></i>
                        <h4> 1230 </h4>
                        <p> المستخدمين النشطين </p>
                    </div>
                    <div class="info" style="background-color: #D9EFFE">
                        <i class="bi bi-file-earmark-bar-graph-fill" style="background-color: #63BEFC"></i>
                        <h4> 7,568 </h4>
                        <p> إجمالي المبيعات </p>
                    </div>
                    <div class="info" style="background-color: #DFCFFF">
                        <i class="bi bi-cash-coin" style="background-color: #B48FFE"></i>
                        <h4> 5353 </h4>
                        <p> صافي الربح </p>
                    </div>
                    <div class="info" style="background-color: #DCFCE7">
                        <i class="bi bi-wallet2" style="background-color: #3CD856"></i>
                        <h4> 5353 </h4>
                        <p> رصيد العملاء </p>
                    </div>
                </div>
            </div>
            <div class="empty-data">
                <div class="row">
                    <div class="empty-image">
                        <img src="{{ asset('assets/admin/images/empty.png') }}" alt="">
                    </div>
                    <div class="empty-info">
                        <h4> لا توجد بيانات جديدة في الوقت الحالي </h4>
                        <p> هذه الصفحة لا تحتوي على أي بيانات في الوقت الحالي، ولكننا نعمل على إثرائها بأفضل المحتوى قريبًا.
                            نحن نسعى لتقديم بيانات مميزة ومفيدة تلبي اهتماماتك. </br> ترقب جديدنا قريبًا ونتمنى لك تجربة
                            ممتعة معنا! </p>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <!---------------------------------- Start Users Count --------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-people avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> عدد المستخدمين </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\front\User::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-------------------------------------- End Users Count --------------->
                <!-------------------------------------- Start Provider Count --------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-server avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> مزودي الخدمات </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\admin\Provider::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------------- End Provider Count --------------->
                <!---------------------------- Start Services Counter -------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-hdd-stack-fill avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> الخدمات </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\admin\Product::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------- End Services Counter --------------->
                <!---------------------------- Start Orders Counter -------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-bag-fill avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> الطلبات </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\front\Order::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------- End Orders Counter --------------->
                <!---------------------------- Start Categories Counter -------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-tags-fill avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> الاقسام </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\admin\MainCategory::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------- End Categories Counter --------------->
                <!---------------------------- Start Employees Counter -------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-person avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> الموظفين </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\admin\Admin::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------- End Employees Counter --------------->
                <!---------------------------- Start Roles  Counter -------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-ui-checks avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> الصلاحيات </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\admin\Role::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------- End Roles  Counter --------------->
                <!---------------------------- Start Last News  -------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-brush avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> احدث الاخبار </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\admin\LastNew::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------- End Last News  --------------->
                <!---------------------------- Start Articles   -------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-diagram-3-fill avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> المقالات </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\admin\Blog::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------- End Articles  --------------->
                <!---------------------------- Start Faqs    -------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-patch-question-fill avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> الاسئلة الشائعة </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\admin\Faq::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------- End Faqs  --------------->
                <!---------------------------- Start Faqs    -------------->
                <div class="col-md-3">
                    <div class="overflow-hidden card dashboard_info">
                        <div class="row">
                            <div class="col-2">
                                <div class="avatar-md" style="background-color:#016797">
                                    <i class="bi bi-person-raised-hand avatar-title fs-30"></i>
                                </div>
                            </div>
                            <div class="text-center col-10">
                                <p class="mb-0 text-muted"> اراء العملاء </p>
                                <h3 class="mt-1 mb-0 text-dark"> {{ count(\App\Models\admin\Review::all()) }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------- End Faqs  --------------->
            </div> --}}

            <!--############# Start LastUsers  ############### -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="mb-0 card-title"> آخر عمليات الدفع </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-nowrap table-bordered">
                                    <thead class="table-primary-custome">
                                        <tr>
                                            <th> رقم الحوالة </th>
                                            <th> بوابة الدفع </th>
                                            <th> المستخدم </th>
                                            <th> مبلغ الدفع </th>
                                            <th> نسبة الرسوم </th>
                                            <th> تاريخ / وقت البدء </th>
                                            <th> حالة الحوالة </th>
                                            <th> التفاصيل </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td> 2 </td>
                                            <td>  paypal </td>
                                            <td> Mohamed   </td>
                                            <td> 20 دولار </td>
                                            <td> 4 % </td>
                                            <td>  2025 / 02 / 08
                                                05:30 PM </td>
                                            <td> <span class="badge badge-success bg-success"> تم البدء </span> </td>
                                            <td>
                                                <div class="gap-2 d-flex">
                                                    <a href="#"
                                                        class="btn-sm">
                                                        <i style="color: #3CD856" class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--############# End  LastUsers  ############### -->
            </div>
        </div>
        <!-- ==================================================== -->
        <!-- End Page Content -->
        <!-- ==================================================== -->
    @endsection

    @section('js')
        <script src="{{ asset('assets/admin/js/components/apexchart-column.js') }}"></script>
    @endsection
