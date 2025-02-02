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
            <div class="row">
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
            </div>
            <!--############# Start LastUsers  ############### -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="mb-0 card-title">احدث المستخدمين</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-nowrap">
                                    <thead>
                                    <tr>
                                        <th style="width: 20px;">
                                        </th>
                                        <th> الاسم </th>
                                        <th> البريد الالكتروني </th>
                                        <th> رقم الهاتف </th>
                                        <th> الرصيد </th>
                                        <th> عدد الطلبات </th>
                                        <th> حالة الحساب </th>
                                        <th> العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lastUsers as $user)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td> {{ $user['name'] }} </td>
                                                <td> {{ $user['email'] }} </td>
                                                <td> {{ $user['phone'] }} </td>
                                                <td> {{ $user['balance'] }} دولار </td>
                                                <td> {{ $user['total_orders'] }} </td>
                                                <td> {{ $user['account_status'] }} </td>
                                                <td>
                                                    <div class="gap-2 d-flex">
                                                        <a href="{{ url('admin/user/show/' . $user['id']) }}"
                                                            class="btn btn-success btn-sm">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
