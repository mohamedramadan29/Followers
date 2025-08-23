@extends('admin.layouts.master')
@section('title')
    الخدمات
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/product/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> اضافة خدمة جديدة </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label"> القسم الرئيسي </label>
                                            <select required class="form-control" id="category_id" data-choices
                                                data-choices-groups data-placeholder="Select Categories" name="category_id">
                                                <option value=""> -- حدد القسم --</option>
                                                @foreach ($MainCategories as $maincat)
                                                    <option value="{{ $maincat['id'] }}">{{ $maincat['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="sub_category_id" class="form-label"> القسم الفرعي </label>
                                            <select required class="form-control" id="sub_category_id"
                                                data-placeholder="Select Categories" name="sub_category_id">
                                                <option value=""> -- حدد القسم الفرعي --</option>
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
                                            });
                                        });
                                    </script>

                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="best_services" class="form-label"> العرض في افضل الخدمات </label>
                                            <select required class="form-control" id="best_services" data-choices
                                                data-choices-groups data-placeholder="Select Categories"
                                                name="best_services">
                                                <option value="1"> فعال </option>
                                                <option selected value="0"> غير فعال </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="newest_service" class="form-label"> العرض في احدث الخدمات </label>
                                            <select required class="form-control" id="newest_service" data-choices
                                                data-choices-groups data-placeholder="Select Categories"
                                                name="newest_service">
                                                <option value="1"> فعال </option>
                                                <option selected value="0"> غير فعال </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="bg-white col-lg-4 custome_image">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image" id="single-image">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label"> وصف الخدمة </label>
                                            <textarea class="form-control bg-light-subtle tinymce" id="description" rows="7" placeholder=""
                                                name="description">{{ old('description') }}</textarea>
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
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="main_title" class="form-label"> العنوان الرئيسي للخدمة  </label>
                                            <input required type="text" id="main_title" name="main_title"
                                                class="form-control" placeholder="" value="{{ old('main_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> اسم الخدمة </label>
                                            <input required type="text" id="name" name="name"
                                                class="form-control" placeholder="" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="provider_id" class="form-label"> حدد مزود الخدمة </label>
                                            <select required class="form-control" id="provider_id" data-choices
                                                data-choices-groups data-placeholder="Select Categories" name="provider_id">
                                                <option value=""> -- حدد --</option>
                                                @foreach ($providers as $provider)
                                                    <option value="{{ $provider['id'] }}">{{ $provider['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="service_id" class="form-label"> رقم الخدمة </label>
                                            <input required type="number" id="service_id" name="service_id"
                                                class="form-control" placeholder="" value="{{ old('service_id') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-3">
                                            <label for="profit_percentage " class="form-label"> نسبة الربح (٪) </label>
                                            <input required type="number" step=".01" id="profit_percentage"
                                                name="profit_percentage" class="form-control" placeholder=""
                                                value="{{ old('profit_percentage') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="form-check form-switch">
                                            <label for="main_speed_active"> السرعة </label>
                                            <input name="speed_active" class="form-check-input" type="checkbox"
                                                role="switch" id="main_speed_active">
                                        </div>
                                        <div class="mt-2 mb-3 d-none" id="main_speed_input_container">
                                            <label for="speed_active_text" class="form-label">ادخل السرعة</label>
                                            <input type="text" id="speed_active_text" name="speed_active_text"
                                                class="form-control" placeholder=""
                                                value="{{ old('speed_active_text') }}">
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
                                                role="switch" id="main_quality_status">
                                        </div>
                                        <div class="mt-2 mb-3 d-none" id="main_quality_input_container">
                                            <label for="quality_percentage" class="form-label">ادخل نسبة الجودة </label>
                                            <input type="number" min="1" max="100" id="quality_percentage"
                                                name="quality_percentage" class="form-control" placeholder=""
                                                value="{{ old('quality_percentage') }}">
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
                                                role="switch" id="main_security">
                                        </div>
                                        <div class="mt-2 mb-3 d-none" id="main_security_container">
                                            <label for="security_text" class="form-label"> ادخل الضمان </label>
                                            <input type="text" id="security_text" name="security_text"
                                                class="form-control" placeholder="" value="{{ old('security_text') }}">
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
                                                role="switch" id="main_start_time">
                                        </div>
                                        <div class="mt-2 mb-3 d-none" id="main_start_time_container">
                                            <label for="start_time_text" class="form-label"> ادخل وقت البدء </label>
                                            <input type="text" id="start_time_text" name="start_time_text"
                                                class="form-control" placeholder=""
                                                value="{{ old('start_time_text') }}">
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">الخدمات الفرعية</h4>
                            </div>
                            <div class="card-body" style="background-color: #F2F2F8">
                                <div id="sub_services_container">
                                    <div class="mb-3 row sub-service-row">
                                        <div class="col-lg-3 col-6">
                                            <label for="sub_serv_name_0" class="form-label">اسم الخدمة</label>
                                            <input type="text" name="sub_services[0][sub_serv_name]"
                                                class="form-control" placeholder=""
                                                value="{{ old('sub_services.0.sub_serv_name') }}">
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="mb-3">
                                                <label for="sub_provider_id_0" class="form-label">حدد مزود الخدمة</label>
                                                <select required class="form-control" id="sub_provider_id_0" data-choices
                                                    data-choices-groups data-placeholder="Select Categories"
                                                    name="sub_services[0][sub_provider_id]">
                                                    <option value="">-- حدد --</option>
                                                    @foreach ($providers as $provider)
                                                        <option
                                                            {{ old('sub_services.0.sub_provider_id') == $provider['id'] ? 'selected' : '' }}
                                                            value="{{ $provider['id'] }}">{{ $provider['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <label for="sub_serv_number_0" class="form-label">رقم الخدمة</label>
                                            <input type="number" name="sub_services[0][sub_serv_number]"
                                                class="form-control" placeholder=""
                                                value="{{ old('sub_services.0.sub_serv_number') }}">
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="mb-3">
                                                <label for="sub_profit_percentage_0" class="form-label">نسبة الربح
                                                    (٪)</label>
                                                <input required type="number" step=".01"
                                                    id="sub_profit_percentage_0"
                                                    name="sub_services[0][sub_profit_percentage]" class="form-control"
                                                    placeholder=""
                                                    value="{{ old('sub_services.0.sub_profit_percentage') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="form-check form-switch">
                                                <label for="sub_speed_active_0">السرعة</label>
                                                <input name="sub_services[0][sub_speed_active]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_speed_active_0">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_speed_input_container_0">
                                                <label for="sub_speed_active_text_0" class="form-label">ادخل
                                                    السرعة</label>
                                                <input type="text" id="sub_speed_active_text_0"
                                                    name="sub_services[0][sub_speed_active_text]" class="form-control"
                                                    placeholder=""
                                                    value="{{ old('sub_services.0.sub_speed_active_text') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="form-check form-switch">
                                                <label for="sub_quality_status_0">الجودة</label>
                                                <input name="sub_services[0][sub_quality_status]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_quality_status_0">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_quality_input_container_0">
                                                <label for="sub_quality_percentage_0" class="form-label">ادخل نسبة
                                                    الجودة</label>
                                                <input type="number" min="1" max="100"
                                                    id="sub_quality_percentage_0"
                                                    name="sub_services[0][sub_quality_percentage]" class="form-control"
                                                    placeholder=""
                                                    value="{{ old('sub_services.0.sub_quality_percentage') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="form-check form-switch">
                                                <label for="sub_security_0">الضمان</label>
                                                <input name="sub_services[0][sub_security]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_security_0">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_security_container_0">
                                                <label for="sub_security_text_0" class="form-label">ادخل الضمان</label>
                                                <input type="text" id="sub_security_text_0"
                                                    name="sub_services[0][sub_security_text]" class="form-control"
                                                    placeholder="" value="{{ old('sub_services.0.sub_security_text') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="form-check form-switch">
                                                <label for="sub_start_time_0">وقت البدء</label>
                                                <input name="sub_services[0][sub_start_time]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_start_time_0">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_start_time_container_0">
                                                <label for="sub_start_time_text_0" class="form-label">ادخل وقت
                                                    البدء</label>
                                                <input type="text" id="sub_start_time_text_0"
                                                    name="sub_services[0][sub_start_time_text]" class="form-control"
                                                    placeholder=""
                                                    value="{{ old('sub_services.0.sub_start_time_text') }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="button" class="mt-3 btn btn-primary" id="add_sub_service">إضافة خدمة فرعية
                                    جديدة</button>
                                <!-- زر الحذف للخدمة الفرعية الأولى (مخفي افتراضيًا) -->
                                <button type="button"
                                    class="btn btn-danger btn-sm remove-sub-service d-none">حذف</button>
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

                                    // إضافة خدمة فرعية جديدة
                                    document.getElementById('add_sub_service').addEventListener('click', function() {
                                        const container = document.getElementById('sub_services_container');
                                        const index = container.children.length;
                                        const uniqueId = Date.now();

                                        const newRow = `
                                            <div class="mb-3 row sub-service-row">
                                                <div class="col-lg-1 col-1">
                                                    <button style="margin-top:20px" type="button" class="btn btn-danger btn-sm remove-sub-service"> <i class="bx bx-trash"></i> </button>
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    <label class="form-label">اسم الخدمة</label>
                                                    <input type="text" name="sub_services[${index}][sub_serv_name]" class="form-control">
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
                                                    <label class="form-label">رقم الخدمة</label>
                                                    <input type="number" name="sub_services[${index}][sub_serv_number]" class="form-control">
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
                                            </div>
                                        `;
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
                                        if (subServiceRows.length <= 1) {
                                            removeButtons.forEach(button => button.classList.add('d-none'));
                                        } else {
                                            removeButtons.forEach(button => button.classList.remove('d-none'));
                                        }

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
                        </div>
                        <div class="card" style="background-color:#F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title">تحسينات السيو ( SEO )</h4>
                            </div>
                           @livewire('admin.seo.preview')
                        </div>
                        <div class="p-3 mb-3 rounded bg-light">
                            <div class="row justify-content-start g-2">
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-primary w-100"> حفظ <i
                                            class='bx bxs-save'></i></button>
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{ url('admin/products') }}" class="btn btn-danger w-100"> الغاء </a>
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
    {{-- <script>
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
    </script> --}}
@endsection
