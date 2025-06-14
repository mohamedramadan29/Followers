@extends('admin.layouts.master')
@section('title')
    تعديل الخدمة
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            @if (Session::has('Success_message'))
                @php
                    toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
                @endphp
            @endif
            @if (Session::has('Error_message'))
                @php
                    toastify()->error(\Illuminate\Support\Facades\Session::get('Error_message'));
                @endphp
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    @php
                        echo '<div class="alert alert-danger">' . $error . '</div>';
                    @endphp
                @endforeach
            @endif
            <form method="post" action="{{ url('admin/product/update/' . $product['slug']) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> تعديل الخدمة </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label"> حدد القسم الرئيسي </label>
                                            <select required class="form-control" id="category_id" data-choices
                                                data-choices-groups data-placeholder="Select Categories" name="category_id">
                                                <option value=""> -- حدد القسم --</option>
                                                @foreach ($MainCategories as $maincat)
                                                    <option @if ($product['category_id'] == $maincat['id']) selected @endif
                                                        value="{{ $maincat['id'] }}">{{ $maincat['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="sub_category_id" class="form-label"> حدد القسم الفرعي </label>
                                            <select class="form-control" id="sub_category_id"
                                                data-placeholder="Select Categories" name="sub_category_id">
                                                <option value=""> -- حدد القسم الفرعي --</option>
                                                @if ($product['sub_category_id'] != '')
                                                    <option selected value="{{ $product['sub_category_id'] }}">
                                                        {{ $product['Sub_Category']['name'] }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            $('#category_id').on('change', function() {
                                                var categoryId = $(this).val();
                                                if (categoryId) {
                                                    $.ajax({
                                                        url: '{{ route('admin.get.subcategories') }}', // تأكد من استخدام المسار الصحيح
                                                        type: "GET",
                                                        data: {
                                                            category_id: categoryId
                                                        },
                                                        success: function(data) {
                                                            $('#sub_category_id').empty();
                                                            if (data.message) {
                                                                $('#sub_category_id').append('<option value="">' + data
                                                                    .message + '</option>');
                                                            } else {
                                                                $('#sub_category_id').append(
                                                                    '<option value=""> -- حدد القسم الفرعي --</option>');
                                                                $.each(data, function(key, value) {
                                                                    $('#sub_category_id').append('<option value="' +
                                                                        key + '">' + value + '</option>');
                                                                });
                                                            }
                                                        }
                                                    });
                                                } else {
                                                    $('#sub_category_id').empty();
                                                    $('#sub_category_id').append('<option value=""> -- حدد القسم الفرعي --</option>');
                                                }
                                                $.trigger();
                                            });
                                        });
                                    </script>
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="best_services" class="form-label"> العرض في افضل الخدمات </label>
                                            <select required class="form-control" id="best_services" data-choices
                                                data-choices-groups data-placeholder="Select Categories"
                                                name="best_services">
                                                <option value="1"
                                                    {{ $product['best_services'] == 1 ? 'selected' : '' }}> فعال </option>
                                                <option value="0"
                                                    {{ $product['best_services'] == 0 ? 'selected' : '' }}> غير فعال
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="newest_service" class="form-label"> العرض في احدث الخدمات </label>
                                            <select required class="form-control" id="newest_service" data-choices
                                                data-choices-groups data-placeholder="Select Categories"
                                                name="newest_service">
                                                <option value="1"
                                                    {{ $product['newest_service'] == 1 ? 'selected' : '' }}> فعال </option>
                                                <option value="0"
                                                    {{ $product['newest_service'] == 0 ? 'selected' : '' }}> غير فعال
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="bg-white col-lg-4 custome_image">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image"
                                                id="single-image-edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label"> وصف الخدمة </label>
                                            <textarea class="form-control bg-light-subtle tinymce" id="description" rows="7" placeholder=""
                                                name="description">{!! $product['description'] !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> خدمة رئيسية جديدة </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> اسم الخدمة </label>
                                            <input required type="text" id="name" name="name"
                                                class="form-control" placeholder="" value="{{ $product['name'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="provider_id" class="form-label"> حدد مزود الخدمة </label>
                                            <select required class="form-control" id="provider_id" data-choices
                                                data-choices-groups data-placeholder="Select Categories" name="provider_id">
                                                <option value=""> -- حدد --</option>
                                                @foreach ($providers as $provider)
                                                    <option @if ($product['provider_id'] == $provider['id']) selected @endif
                                                        value="{{ $provider['id'] }}">{{ $provider['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="service_id" class="form-label"> رقم الخدمة </label>
                                            <input required type="number" id="service_id" name="service_id"
                                                class="form-control" placeholder=""
                                                value="{{ $product['service_id'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="profit_percentage " class="form-label"> نسبة الربح (٪) </label>
                                            <input required type="number" step=".01" id="profit_percentage"
                                                name="profit_percentage" class="form-control" placeholder=""
                                                value="{{ $product['profit_percentage'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="form-check form-switch">
                                            <label for="main_speed_active"> السرعة </label>
                                            <input name="speed_active" class="form-check-input" type="checkbox"
                                                role="switch" id="main_speed_active"
                                                @if ($product['speed_active'] == 1) checked @endif>
                                        </div>
                                        <div class="mt-2 mb-3 {{ $product['speed_active'] == 1 ? '' : 'd-none' }}"
                                            id="main_speed_input_container">
                                            <label for="speed_active_text" class="form-label">ادخل السرعة</label>
                                            <input type="text" id="speed_active_text" name="speed_active_text"
                                                class="form-control" placeholder=""
                                                value="{{ $product['speed_active_text'] }}">
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const speedCheckbox = document.getElementById('main_speed_active');
                                                const speedInputContainer = document.getElementById('main_speed_input_container');

                                                // Toggle visibility based on checkbox status
                                                speedCheckbox.addEventListener('change', function() {
                                                    if (this.checked) {
                                                        speedInputContainer.classList.remove('d-none');
                                                    } else {
                                                        speedInputContainer.classList.add('d-none');
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="form-check form-switch">
                                            <label for="main_quality_status"> الجودة </label>
                                            <input name="quality_status" class="form-check-input" type="checkbox"
                                                role="switch" id="main_quality_status"
                                                @if ($product['quality_status'] == 1) checked @endif>
                                        </div>
                                        <div class="mt-2 mb-3 {{ $product['quality_status'] == 1 ? '' : 'd-none' }}"
                                            id="main_quality_input_container">
                                            <label for="quality_percentage" class="form-label">ادخل نسبة الجودة </label>
                                            <input type="number" min="1" max="100" id="quality_percentage"
                                                name="quality_percentage" class="form-control" placeholder=""
                                                value="{{ $product['quality_percentage'] }}">
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const qualityCheckbox = document.getElementById('main_quality_status');
                                                const qualityInputContainer = document.getElementById('main_quality_input_container');

                                                // Toggle visibility based on checkbox status
                                                qualityCheckbox.addEventListener('change', function() {
                                                    if (this.checked) {
                                                        qualityInputContainer.classList.remove('d-none');
                                                    } else {
                                                        qualityInputContainer.classList.add('d-none');
                                                    }
                                                });
                                            });
                                        </script>

                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="form-check form-switch">
                                            <label for="main_security"> الضمان </label>
                                            <input name="security" class="form-check-input" type="checkbox"
                                                role="switch" id="main_security"
                                                @if ($product['security'] == 1) checked @endif>
                                        </div>
                                        <div class="mt-2 mb-3 {{ $product['security'] == 1 ? '' : 'd-none' }}"
                                            id="main_security_container">
                                            <label for="security_text" class="form-label"> ادخل الضمان </label>
                                            <input type="text" id="security_text" name="security_text"
                                                class="form-control" placeholder=""
                                                value="{{ $product['security_text'] }}">
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const securityCheckbox = document.getElementById('main_security');
                                                const securityInputContainer = document.getElementById('main_security_container');

                                                // Toggle visibility based on checkbox status
                                                securityCheckbox.addEventListener('change', function() {
                                                    if (this.checked) {
                                                        securityInputContainer.classList.remove('d-none');
                                                    } else {
                                                        securityInputContainer.classList.add('d-none');
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="form-check form-switch">
                                            <label for="main_start_time"> وقت البدء </label>
                                            <input name="start_time" class="form-check-input" type="checkbox"
                                                role="switch" id="main_start_time"
                                                @if ($product['start_time'] == 1) checked @endif>
                                        </div>
                                        <div class="mt-2 mb-3 {{ $product['start_time'] == 1 ? '' : 'd-none' }}"
                                            id="main_start_time_container">
                                            <label for="start_time_text" class="form-label"> ادخل وقت البدء </label>
                                            <input type="text" id="start_time_text" name="start_time_text"
                                                class="form-control" placeholder=""
                                                value="{{ $product['start_time_text'] }}">
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const start_timeCheckbox = document.getElementById('main_start_time');
                                                const start_timeInputContainer = document.getElementById('main_start_time_container');

                                                // Toggle visibility based on checkbox status
                                                start_timeCheckbox.addEventListener('change', function() {
                                                    if (this.checked) {
                                                        start_timeInputContainer.classList.remove('d-none');
                                                    } else {
                                                        start_timeInputContainer.classList.add('d-none');
                                                    }
                                                });
                                            });
                                        </script>

                                    </div>


                                </div>
                            </div>
                        </div>
                        {{-- <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">الخدمات الفرعية</h4>
                            </div>
                            <div class="card-body">
                                <div id="sub_services_container">
                                    @foreach ($product['SubServices'] as $index => $subserv)
                                        <div class="mb-3 row">
                                            <h5>الخدمة الفرعية</h5>
                                            <div class="col-lg-3 col-6">
                                                <label for="sub_serv_name" class="form-label">اسم الخدمة</label>
                                                <input type="text"
                                                    name="sub_services[{{ $index }}][sub_serv_name]"
                                                    class="form-control"
                                                    value="{{ old('sub_services.' . $index . '.sub_serv_name', $subserv['name']) }}">
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <div class="mb-3">
                                                    <label for="sub_provider_id_0" class="form-label">حدد مزود
                                                        الخدمة</label>
                                                    <select required class="form-control" id="sub_provider_id_0"
                                                        data-choices data-choices-groups
                                                        data-placeholder="Select Categories"
                                                        name="sub_services[{{ $index }}][sub_provider_id]">
                                                        <option value="">-- حدد --</option>
                                                        @foreach ($providers as $provider)
                                                            <option
                                                                {{ old('sub_services.' . $index . '.sub_provider_id', $subserv['provider_id']) == $provider['id'] ? 'selected' : '' }}
                                                                value="{{ $provider['id'] }}">{{ $provider['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <label for="sub_serv_number" class="form-label">رقم الخدمة</label>
                                                <input type="number"
                                                    name="sub_services[{{ $index }}][sub_serv_number]"
                                                    class="form-control"
                                                    value="{{ old('sub_services.' . $index . '.sub_serv_number', $subserv['provider_service_id']) }}">
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <label for="sub_profit_percentage" class="form-label">نسبة الربح
                                                    (٪)
                                                </label>
                                                <input required type="number" step=".01"
                                                    name="sub_services[{{ $index }}][sub_profit_percentage]"
                                                    class="form-control" placeholder=""
                                                    value="{{ old('sub_services.' . $index . '.sub_profit_percentage', $subserv['profit_percentage']) }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-primary" id="add_sub_service">إضافة خدمة فرعية
                                    جديدة</button>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // تفعيل السويتشات للخدمة الفرعية الأولى
                                    const toggleSwitch = (checkboxId, containerId) => {
                                        const checkbox = document.getElementById(checkboxId);
                                        const container = document.getElementById(containerId);
                                        if (checkbox && container) {
                                            checkbox.addEventListener('change', function() {
                                                container.classList.toggle('d-none', !this.checked);
                                            });
                                        }
                                    };

                                    toggleSwitch('sub_speed_active_0', 'sub_speed_input_container_0');
                                    toggleSwitch('sub_quality_status_0', 'sub_quality_input_container_0');
                                    toggleSwitch('sub_security_0', 'sub_security_container_0');
                                    toggleSwitch('sub_start_time_0', 'sub_start_time_container_0');
                                    document.getElementById('add_sub_service').addEventListener('click', function() {
                                        const container = document.getElementById('sub_services_container');
                                        const index = container.children.length; // حساب عدد العناصر الحالية
                                        const uniqueId = Date.now();
                                        const newRow = `
                                            <div class="mb-3 row">
                                                <div class="col-lg-1 col-1">
                                                    <button style="margin-top:20px" type="button" class="btn btn-danger btn-sm remove-sub-service"> <i class="bx bx-trash"></i> </button>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <label for="sub_serv_name" class="form-label">اسم الخدمة</label>
                                                    <input type="text" name="sub_services[${index}][sub_serv_name]" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-lg-2 col-5">
                                                    <label class="form-label">حدد مزود الخدمة</label>
                                                    <select required class="form-control" name="sub_services[${index}][sub_provider_id]">
                                                        <option value="">-- حدد --</option>
                                                        @foreach ($providers as $provider)
                                                            <option value="{{ $provider['id'] }}">{{ $provider['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <label for="sub_serv_number" class="form-label">رقم الخدمة</label>
                                                    <input type="number" name="sub_services[${index}][sub_serv_number]" class="form-control" placeholder="">
                                                </div>
                                                 <div class="col-lg-3 col-6">
                                                    <label class="form-label">نسبة الربح (٪)</label>
                                                    <input required type="number" step=".01" name="sub_services[${index}][sub_profit_percentage]" class="form-control">
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-check form-switch">
                                                        <label for="sub_speed_active_${uniqueId}">السرعة</label>
                                                        <input name="sub_services[${index}][sub_speed_active]" class="form-check-input" type="checkbox" role="switch" id="sub_speed_active_${uniqueId}">
                                                    </div>
                                                    <div class="mt-2 mb-3 d-none" id="sub_speed_input_container_${uniqueId}">
                                                        <label class="form-label">ادخل السرعة</label>
                                                        <input type="text" name="sub_services[${index}][sub_speed_active_text]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-check form-switch">
                                                        <label for="sub_quality_status_${uniqueId}">الجودة</label>
                                                        <input name="sub_services[${index}][sub_quality_status]" class="form-check-input" type="checkbox" role="switch" id="sub_quality_status_${uniqueId}">
                                                    </div>
                                                    <div class="mt-2 mb-3 d-none" id="sub_quality_input_container_${uniqueId}">
                                                        <label class="form-label">ادخل نسبة الجودة</label>
                                                        <input type="number" min="1" max="100" name="sub_services[${index}][sub_quality_percentage]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-check form-switch">
                                                        <label for="sub_security_${uniqueId}">الضمان</label>
                                                        <input name="sub_services[${index}][sub_security]" class="form-check-input" type="checkbox" role="switch" id="sub_security_${uniqueId}">
                                                    </div>
                                                    <div class="mt-2 mb-3 d-none" id="sub_security_container_${uniqueId}">
                                                        <label class="form-label">ادخل الضمان</label>
                                                        <input type="text" name="sub_services[${index}][sub_security_text]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-check form-switch">
                                                        <label for="sub_start_time_${uniqueId}">وقت البدء</label>
                                                        <input name="sub_services[${index}][sub_start_time]" class="form-check-input" type="checkbox" role="switch" id="sub_start_time_${uniqueId}">
                                                    </div>
                                                    <div class="mt-2 mb-3 d-none" id="sub_start_time_container_${uniqueId}">
                                                        <label class="form-label">ادخل وقت البدء</label>
                                                        <input type="text" name="sub_services[${index}][sub_start_time_text]" class="form-control">
                                                    </div>
                                                </div>

                                            </div>`;
                                        container.insertAdjacentHTML('beforeend', newRow);

                                        // تفعيل السويتشات للخدمة الفرعية الجديدة
                                        setTimeout(() => {
                                            toggleSwitch(`sub_speed_active_${uniqueId}`,
                                                `sub_speed_input_container_${uniqueId}`);
                                            toggleSwitch(`sub_quality_status_${uniqueId}`,
                                                `sub_quality_input_container_${uniqueId}`);
                                            toggleSwitch(`sub_security_${uniqueId}`, `sub_security_container_${uniqueId}`);
                                            toggleSwitch(`sub_start_time_${uniqueId}`,
                                                `sub_start_time_container_${uniqueId}`);
                                        }, 100);

                                        // تحديث حالة زر الحذف
                                        updateRemoveButtons();
                                    });

                                    // إدارة حذف الخدمات الفرعية
                                    function updateRemoveButtons() {
                                        const container = document.getElementById('sub_services_container');
                                        const subServiceRows = container.querySelectorAll('.sub-service-row');
                                        const removeButtons = container.querySelectorAll('.remove-sub-service');

                                        // إخفاء زر الحذف للخدمة الأولى إذا كان هناك خدمة واحدة فقط
                                        // if (subServiceRows.length <= 1) {
                                        //     removeButtons.forEach(button => button.classList.add('d-none'));
                                        // } else {
                                        //     removeButtons.forEach(button => button.classList.remove('d-none'));
                                        // }

                                        // إضافة حدث الحذف لكل زر
                                        removeButtons.forEach(button => {
                                            button.removeEventListener('click',
                                                removeLastSubService); // إزالة الأحداث القديمة لتجنب التكرار
                                            button.addEventListener('click', removeLastSubService);
                                        });
                                    }

                                    function removeLastSubService() {
                                        const container = document.getElementById('sub_services_container');
                                        const subServiceRows = container.querySelectorAll('.sub-service-row');
                                        if (subServiceRows.length > 1) {
                                            subServiceRows[subServiceRows.length - 1].remove(); // حذف آخر خدمة فرعية
                                            updateRemoveButtons(); // تحديث حالة الأزرار
                                        }
                                    }

                                    // تحديث حالة الأزرار عند تحميل الصفحة
                                    updateRemoveButtons();

                                });
                            </script>
                        </div> --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">الخدمات الفرعية</h4>
                            </div>
                            <div class="card-body">
                                <div id="sub_services_container">
                                    @foreach ($product['SubServices'] as $index => $subserv)
                                        <div class="mb-3 row sub-service-row">
                                            <div class="col-lg-1 col-1">
                                                <button style="margin-top:20px" type="button"
                                                    class="btn btn-danger btn-sm remove-sub-service">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <label for="sub_serv_name_{{ $index }}" class="form-label">اسم
                                                    الخدمة</label>
                                                <input type="text"
                                                    name="sub_services[{{ $index }}][sub_serv_name]"
                                                    class="form-control"
                                                    value="{{ old('sub_services.' . $index . '.sub_serv_name', $subserv['name']) }}">
                                            </div>
                                            <div class="col-lg-2 col-5">
                                                <label class="form-label">حدد مزود الخدمة</label>
                                                <select required class="form-control"
                                                    name="sub_services[{{ $index }}][sub_provider_id]">
                                                    <option value="">-- حدد --</option>
                                                    @foreach ($providers as $provider)
                                                        <option
                                                            {{ old('sub_services.' . $index . '.sub_provider_id', $subserv['provider_id']) == $provider['id'] ? 'selected' : '' }}
                                                            value="{{ $provider['id'] }}">{{ $provider['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <label for="sub_serv_number_{{ $index }}" class="form-label">رقم
                                                    الخدمة</label>
                                                <input type="number"
                                                    name="sub_services[{{ $index }}][sub_serv_number]"
                                                    class="form-control"
                                                    value="{{ old('sub_services.' . $index . '.sub_serv_number', $subserv['provider_service_id']) }}">
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <label for="sub_profit_percentage_{{ $index }}"
                                                    class="form-label">نسبة الربح (٪)</label>
                                                <input required type="number" step=".01"
                                                    name="sub_services[{{ $index }}][sub_profit_percentage]"
                                                    class="form-control"
                                                    value="{{ old('sub_services.' . $index . '.sub_profit_percentage', $subserv['profit_percentage']) }}">
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <div class="form-check form-switch">
                                                    <label for="sub_speed_active_{{ $index }}">السرعة</label>
                                                    <input name="sub_services[{{ $index }}][sub_speed_active]"
                                                        class="form-check-input" type="checkbox" role="switch"
                                                        id="sub_speed_active_{{ $index }}"
                                                        {{ old('sub_services.' . $index . '.sub_speed_active', $subserv['speed_active'] ?? false) ? 'checked' : '' }}>
                                                </div>
                                                <div class="mt-2 mb-3 {{ old('sub_services.' . $index . '.sub_speed_active', $subserv['speed_active'] ?? false) ? '' : 'd-none' }}"
                                                    id="sub_speed_input_container_{{ $index }}">
                                                    <label class="form-label">ادخل السرعة</label>
                                                    <input type="text"
                                                        name="sub_services[{{ $index }}][sub_speed_active_text]"
                                                        class="form-control"
                                                        value="{{ old('sub_services.' . $index . '.sub_speed_active_text', $subserv['speed_active_text'] ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <div class="form-check form-switch">
                                                    <label for="sub_quality_status_{{ $index }}">الجودة</label>
                                                    <input name="sub_services[{{ $index }}][sub_quality_status]"
                                                        class="form-check-input" type="checkbox" role="switch"
                                                        id="sub_quality_status_{{ $index }}"
                                                        {{ old('sub_services.' . $index . '.sub_quality_status', $subserv['quality_status'] ?? false) ? 'checked' : '' }}>
                                                </div>
                                                <div class="mt-2 mb-3 {{ old('sub_services.' . $index . '.sub_quality_status', $subserv['quality_status'] ?? false) ? '' : 'd-none' }}"
                                                    id="sub_quality_input_container_{{ $index }}">
                                                    <label class="form-label">ادخل نسبة الجودة</label>
                                                    <input type="number" min="1" max="100"
                                                        name="sub_services[{{ $index }}][sub_quality_percentage]"
                                                        class="form-control"
                                                        value="{{ old('sub_services.' . $index . '.sub_quality_percentage', $subserv['quality_percentage'] ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <div class="form-check form-switch">
                                                    <label for="sub_security_{{ $index }}">الضمان</label>
                                                    <input name="sub_services[{{ $index }}][sub_security]"
                                                        class="form-check-input" type="checkbox" role="switch"
                                                        id="sub_security_{{ $index }}"
                                                        {{ old('sub_services.' . $index . '.sub_security', $subserv['security'] ?? false) ? 'checked' : '' }}>
                                                </div>
                                                <div class="mt-2 mb-3 {{ old('sub_services.' . $index . '.sub_security', $subserv['security'] ?? false) ? '' : 'd-none' }}"
                                                    id="sub_security_container_{{ $index }}">
                                                    <label class="form-label">ادخل الضمان</label>
                                                    <input type="text"
                                                        name="sub_services[{{ $index }}][sub_security_text]"
                                                        class="form-control"
                                                        value="{{ old('sub_services.' . $index . '.sub_security_text', $subserv['security_text'] ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <div class="form-check form-switch">
                                                    <label for="sub_start_time_{{ $index }}">وقت البدء</label>
                                                    <input name="sub_services[{{ $index }}][sub_start_time]"
                                                        class="form-check-input" type="checkbox" role="switch"
                                                        id="sub_start_time_{{ $index }}"
                                                        {{ old('sub_services.' . $index . '.sub_start_time', $subserv['start_time'] ?? false) ? 'checked' : '' }}>
                                                </div>
                                                <div class="mt-2 mb-3 {{ old('sub_services.' . $index . '.sub_start_time', $subserv['start_time'] ?? false) ? '' : 'd-none' }}"
                                                    id="sub_start_time_container_{{ $index }}">
                                                    <label class="form-label">ادخل وقت البدء</label>
                                                    <input type="text"
                                                        name="sub_services[{{ $index }}][sub_start_time_text]"
                                                        class="form-control"
                                                        value="{{ old('sub_services.' . $index . '.sub_start_time_text', $subserv['start_time_text'] ?? '') }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-primary" id="add_sub_service">إضافة خدمة فرعية
                                    جديدة</button>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // دالة لتفعيل السويتشات
                                    const toggleSwitch = (checkboxId, containerId) => {
                                        const checkbox = document.getElementById(checkboxId);
                                        const container = document.getElementById(containerId);
                                        if (checkbox && container) {
                                            checkbox.addEventListener('change', function() {
                                                container.classList.toggle('d-none', !this.checked);
                                            });
                                        }
                                    };

                                    // تفعيل السويتشات للخدمات الفرعية الموجودة
                                    @foreach ($product['SubServices'] as $index => $subserv)
                                        toggleSwitch('sub_speed_active_{{ $index }}',
                                            'sub_speed_input_container_{{ $index }}');
                                        toggleSwitch('sub_quality_status_{{ $index }}',
                                            'sub_quality_input_container_{{ $index }}');
                                        toggleSwitch('sub_security_{{ $index }}', 'sub_security_container_{{ $index }}');
                                        toggleSwitch('sub_start_time_{{ $index }}',
                                            'sub_start_time_container_{{ $index }}');
                                    @endforeach

                                    // إضافة خدمة فرعية جديدة
                                    document.getElementById('add_sub_service').addEventListener('click', function() {
                                        const container = document.getElementById('sub_services_container');
                                        const index = container.children.length;
                                        const uniqueId = index; // استخدام المؤشر كمعرف

                                        const newRow = `
                                            <div class="mb-3 row sub-service-row">
                                                <div class="col-lg-1 col-1">
                                                    <button style="margin-top:20px" type="button" class="btn btn-danger btn-sm remove-sub-service">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <label for="sub_serv_name_${uniqueId}" class="form-label">اسم الخدمة</label>
                                                    <input type="text" name="sub_services[${index}][sub_serv_name]" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-lg-2 col-5">
                                                    <label class="form-label">حدد مزود الخدمة</label>
                                                    <select required class="form-control" name="sub_services[${index}][sub_provider_id]">
                                                        <option value="">-- حدد --</option>
                                                        @foreach ($providers as $provider)
                                                            <option value="{{ $provider['id'] }}">{{ $provider['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <label for="sub_serv_number_${uniqueId}" class="form-label">رقم الخدمة</label>
                                                    <input type="number" name="sub_services[${index}][sub_serv_number]" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <label for="sub_profit_percentage_${uniqueId}" class="form-label">نسبة الربح (٪)</label>
                                                    <input required type="number" step=".01" name="sub_services[${index}][sub_profit_percentage]" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-check form-switch">
                                                        <label for="sub_speed_active_${uniqueId}">السرعة</label>
                                                        <input name="sub_services[${index}][sub_speed_active]" class="form-check-input" type="checkbox" role="switch" id="sub_speed_active_${uniqueId}">
                                                    </div>
                                                    <div class="mt-2 mb-3 d-none" id="sub_speed_input_container_${uniqueId}">
                                                        <label class="form-label">ادخل السرعة</label>
                                                        <input type="text" name="sub_services[${index}][sub_speed_active_text]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-check form-switch">
                                                        <label for="sub_quality_status_${uniqueId}">الجودة</label>
                                                        <input name="sub_services[${index}][sub_quality_status]" class="form-check-input" type="checkbox" role="switch" id="sub_quality_status_${uniqueId}">
                                                    </div>
                                                    <div class="mt-2 mb-3 d-none" id="sub_quality_input_container_${uniqueId}">
                                                        <label class="form-label">ادخل نسبة الجودة</label>
                                                        <input type="number" min="1" max="100" name="sub_services[${index}][sub_quality_percentage]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-check form-switch">
                                                        <label for="sub_security_${uniqueId}">الضمان</label>
                                                        <input name="sub_services[${index}][sub_security]" class="form-check-input" type="checkbox" role="switch" id="sub_security_${uniqueId}">
                                                    </div>
                                                    <div class="mt-2 mb-3 d-none" id="sub_security_container_${uniqueId}">
                                                        <label class="form-label">ادخل الضمان</label>
                                                        <input type="text" name="sub_services[${index}][sub_security_text]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <div class="form-check form-switch">
                                                        <label for="sub_start_time_${uniqueId}">وقت البدء</label>
                                                        <input name="sub_services[${index}][sub_start_time]" class="form-check-input" type="checkbox" role="switch" id="sub_start_time_${uniqueId}">
                                                    </div>
                                                    <div class="mt-2 mb-3 d-none" id="sub_start_time_container_${uniqueId}">
                                                        <label class="form-label">ادخل وقت البدء</label>
                                                        <input type="text" name="sub_services[${index}][sub_start_time_text]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>`;
                                        container.insertAdjacentHTML('beforeend', newRow);

                                        // تفعيل السويتشات للخدمة الفرعية الجديدة
                                        setTimeout(() => {
                                            toggleSwitch(`sub_speed_active_${uniqueId}`,
                                                `sub_speed_input_container_${uniqueId}`);
                                            toggleSwitch(`sub_quality_status_${uniqueId}`,
                                                `sub_quality_input_container_${uniqueId}`);
                                            toggleSwitch(`sub_security_${uniqueId}`, `sub_security_container_${uniqueId}`);
                                            toggleSwitch(`sub_start_time_${uniqueId}`,
                                                `sub_start_time_container_${uniqueId}`);
                                        }, 100);

                                        // تحديث حالة أزرار الحذف
                                        updateRemoveButtons();
                                    });

                                    // إدارة حذف الخدمات الفرعية
                                    function updateRemoveButtons() {
                                        const container = document.getElementById('sub_services_container');
                                        const rows = container.querySelectorAll('.sub-service-row');
                                        const removeButtons = container.querySelectorAll('.remove-sub-service');

                                        // إخفاء زر الحذف إذا كان هناك خدمة فرعية واحدة فقط
                                        if (rows.length === 1) {
                                            removeButtons.forEach(button => button.classList.add('d-none'));
                                        } else {
                                            removeButtons.forEach(button => button.classList.remove('d-none'));
                                        }

                                        // إعادة ربط أحداث الحذف
                                        removeButtons.forEach(button => {
                                            button.removeEventListener('click', handleRemove);
                                            button.addEventListener('click', handleRemove);
                                        });
                                    }

                                    function handleRemove(event) {
                                        const container = document.getElementById('sub_services_container');
                                        const rows = container.querySelectorAll('.sub-service-row');
                                        if (rows.length > 1) {
                                            event.target.closest('.sub-service-row').remove();
                                            updateRemoveButtons();
                                        }
                                    }

                                    // تحديث حالة الأزرار عند تحميل الصفحة
                                    updateRemoveButtons();
                                });
                            </script>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">تحسينات السيو ( SEO )</h4>
                            </div>
                            <div class="card-body" style="background-color:#F2F2F8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label">عنوان صفحة المنتج (Page
                                                Title)</label>
                                            <input type="text" id="meta_title" class="form-control" name="meta_title"
                                                placeholder="ادخل العنوان هنا"
                                                value="{{ old('meta_title', $product['meta_title']) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_url" class="form-label">رابط صفحة المنتج (SEO PAGE
                                                URL)</label>
                                            <input type="text" id="meta_url" class="form-control" name="meta_url"
                                                placeholder="أدخل رابط المنتج"
                                                value="{{ old('meta_url', $product['meta_url']) }}">
                                            <!-- حقل مخفي لتخزين الرابط النهائي -->
                                            <input type="hidden" name="meta_url_final" id="meta_url_final"
                                                value="{{ old('meta_url', $product['meta_url']) }}">
                                            <!-- معاينة الرابط -->
                                            <div class="mt-2">
                                                <small class="text-muted">معاينة الرابط: </small>
                                                <span id="urlPreview" class="text-primary">{{ url('/product/') }}/<span
                                                        id="slugPreview">{{ old('meta_url', $product['meta_url']) }}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_description" class="form-label">وصف صفحة المنتج (Page
                                                Description)</label>
                                            <textarea class="form-control" id="meta_description" rows="7" name="meta_description"
                                                placeholder="وصف صفحة المنتج">{{ old('meta_description', $product['meta_description']) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_keywords" class="form-label">الكلمات المفتاحية</label>
                                            <div class="input-group">
                                                <input type="text" id="meta_keywords" class="form-control"
                                                    placeholder="أدخل الكلمات المفتاحية">
                                                <!-- حقل مخفي لتخزين الكلمات -->
                                                <input type="hidden" name="meta_keywords" id="hidden_keywords"
                                                    value="{{ old('meta_keywords', $product['meta_keywords']) }}">
                                            </div>
                                            <div id="keywordList" class="mt-2">
                                                @if (old('meta_keywords', $product['meta_keywords']))
                                                    @foreach (explode(',', old('meta_keywords', $product['meta_keywords'])) as $keyword)
                                                        <span class="mb-2 text-white badge bg-primary me-2"
                                                            data-keyword="{{ $keyword }}">
                                                            {{ $keyword }} <span class="ms-2 text-danger"
                                                                onclick="removeKeyword(this)">×</span>
                                                        </span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-info" role="alert">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <p class="mb-0">حساب تيك توك للبيع k 23 ، تعرف على متجر زيادة التفاعل
                                                        وزيد تأثيرك فوراً</p>
                                                    <p class="mb-0 text-muted">امتلك حساب تيك توك k 23 متاح للبيع بسهولة
                                                        وسرعة، خمس خطوات على المنصة وتمتع بتفاعل مضمون، دون قلق.</p>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <a href="https://www.facebook.com/username/videos/987654321"
                                                    class="text-primary"
                                                    target="_blank">https://www.facebook.com/username/videos/987654321</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 mb-3 rounded bg-light">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <a href="{{ url('admin/products') }}" class="btn btn-primary w-100"> رجوع </a>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100"> حفظ <i
                                            class='bx bxs-save'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Container Fluid -->

    </div>

@endsection

@section('js')
    <script>
        // دالة لتحديث الحقل المخفي
        function updateHiddenKeywords() {
            let keywords = [];
            document.querySelectorAll('#keywordList .badge').forEach(badge => {
                keywords.push(badge.getAttribute('data-keyword'));
            });
            document.getElementById('hidden_keywords').value = keywords.join(',');
        }

        // دالة لإزالة الكلمة وتحديث الحقل المخفي
        function removeKeyword(element) {
            element.parentElement.remove();
            updateHiddenKeywords();
        }

        // إضافة كلمة عند الضغط على Enter
        document.getElementById('meta_keywords').addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && this.value.trim()) {
                e.preventDefault();
                let keyword = this.value.trim();
                let keywordList = document.getElementById('keywordList');
                let badge = document.createElement('span');
                badge.className = 'mb-2 text-white badge bg-primary me-2';
                badge.setAttribute('data-keyword', keyword);
                badge.innerHTML =
                    `${keyword} <span class="ms-2 text-danger" onclick="removeKeyword(this)">×</span>`;
                keywordList.appendChild(badge);
                this.value = '';
                updateHiddenKeywords();
            }
        });
    </script>
    <script>
        // دالة لتحويل النص إلى slug
        function toSlug(text) {
            return text
                .toLowerCase()
                .trim()
                .replace(/[\s+]/g, '-') // استبدال المسافات بـ -
                .replace(/[^\w\-]+/g, '') // إزالة الرموز غير المرغوب فيها
                .replace(/\-\-+/g, '-'); // إزالة الـ - المكررة
        }

        // عرض معاينة الرابط أثناء الكتابة
        document.getElementById('meta_url').addEventListener('input', function() {
            let input = this.value;
            let slug = toSlug(input);
            document.getElementById('slugPreview').textContent = slug || 'عنوان-المنتج';
            document.getElementById('meta_url_final').value = slug; // تحديث الحقل المخفي
        });
    </script>


    <!-- Start file Input  -->
    <script>
        var lang = "{{ app()->getLocale() }}";
        $("#single-image-edit").fileinput({
            theme: 'bs5',
            allowedFileTypes: ['image'],
            language: lang,
            maxFileCount: 1,
            enableResumableUpload: false,
            showUpload: false,
            initialPreviewAsData: true,
            initialPreview: [
                "{{ asset($product->Image()) }}"
            ],
        });
    </script>
@endsection
