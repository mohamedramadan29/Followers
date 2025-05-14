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
            @if (Session::has('Success_message'))
                @php
                    toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
                @endphp
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    @php
                        toastify()->error($error);
                    @endphp
                @endforeach
            @endif
            <form method="post" action="{{ url('admin/product/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> اضافة خدمة جديدة </h4>
                            </div>
                            <div class="card-body" style="background-color: #F2F2F8">
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
                                    <div class="bg-white col-lg-4">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image" id="single-image">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label"> وصف الخدمة </label>
                                            <textarea required class="form-control bg-light-subtle tinymce" id="description" rows="7" placeholder=""
                                                name="description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> خدمة رئيسية جديدة </h4>
                            </div>
                            <div class="card-body" style="background-color: #F2F2F8">
                                <div class="row">
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
                                    <div class="mb-3 row">
                                        <div class="col-lg-3 col-6">
                                            <label for="sub_serv_name" class="form-label">اسم الخدمة</label>
                                            <input type="text" name="sub_services[0][sub_serv_name]"
                                                class="form-control" placeholder=""
                                                value="{{ old('sub_services.0.sub_serv_name') }}">
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="mb-3">
                                                <label for="provider_id" class="form-label"> حدد مزود الخدمة </label>
                                                <select required class="form-control" id="provider_id" data-choices
                                                    data-choices-groups data-placeholder="Select Categories"
                                                    name="sub_services[0][provider_id]">
                                                    <option value=""> -- حدد --</option>
                                                    @foreach ($providers as $provider)
                                                        <option
                                                            {{ old('sub_services.0.provider_id') == $provider['id'] ? 'selected' : '' }}
                                                            value="{{ $provider['id'] }}">{{ $provider['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <label for="sub_serv_number" class="form-label">رقم الخدمة</label>
                                            <input type="number" name="sub_services[0][sub_serv_number]"
                                                class="form-control" placeholder=""
                                                value="{{ old('sub_services.0.sub_serv_number') }}">
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="mb-3">
                                                <label for="profit_percentage " class="form-label"> نسبة الربح (٪)
                                                </label>
                                                <input required type="number" step=".01" id="profit_percentage"
                                                    name="sub_services[0][profit_percentage]" class="form-control"
                                                    placeholder="" value="{{ old('sub_services.0.profit_percentage') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="form-check form-switch">
                                                <label for="sub_speed_active"> السرعة </label>
                                                <input name="sub_services[0][speed_active]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_speed_active">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_speed_input_container">
                                                <label for="speed_active_text" class="form-label">ادخل السرعة</label>
                                                <input type="text" id="speed_active_text"
                                                    name="sub_services[0][speed_active_text]" class="form-control"
                                                    placeholder="" value="{{ old('sub_services.0.speed_active_text') }}">
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const speedCheckbox = document.getElementById('sub_speed_active');
                                                    const speedInputContainer = document.getElementById('sub_speed_input_container');

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
                                                <label for="sub_quality_status"> الجودة </label>
                                                <input name="sub_services[0][quality_status]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_quality_status">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_quality_input_container">
                                                <label for="quality_percentage" class="form-label">ادخل نسبة الجودة
                                                </label>
                                                <input type="number" min="1" max="100"
                                                    id="quality_percentage" name="sub_services[0][quality_percentage]"
                                                    class="form-control" placeholder=""
                                                    value="{{ old('sub_services.0.quality_percentage') }}">
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const qualityCheckbox = document.getElementById('sub_quality_status');
                                                    const qualityInputContainer = document.getElementById('sub_quality_input_container');

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
                                                <label for="sub_security"> الضمان </label>
                                                <input name="sub_services[0][security]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_security">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_security_container">
                                                <label for="security_text" class="form-label"> ادخل الضمان </label>
                                                <input type="text" id="security_text"
                                                    name="sub_services[0][security_text]" class="form-control"
                                                    placeholder="" value="{{ old('sub_services.0.security_text') }}">
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const securityCheckbox = document.getElementById('sub_security');
                                                    const securityInputContainer = document.getElementById('sub_security_container');

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
                                                <label for="sub_start_time"> وقت البدء </label>
                                                <input name="sub_services[0][start_time]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_start_time">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_start_time_container">
                                                <label for="start_time_text" class="form-label"> ادخل وقت البدء </label>
                                                <input type="text" id="start_time_text"
                                                    name="sub_services[0][start_time_text]" class="form-control"
                                                    placeholder="" value="{{ old('sub_services.0.start_time_text') }}">
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const start_timeCheckbox = document.getElementById('sub_start_time');
                                                    const start_timeInputContainer = document.getElementById('sub_start_time_container');

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
                                <button type="button" class="btn btn-primary" id="add_sub_service">إضافة خدمة فرعية
                                    جديدة</button>
                            </div>

                            <script>
                                document.getElementById('add_sub_service').addEventListener('click', function() {
                                    const container = document.getElementById('sub_services_container');
                                    const index = container.children.length;
                                    const uniqueId = Date.now(); // أو استخدم index إذا تفضل

                                    const newRow = `
                                    <div class="mb-3 row">
                                           <button type="button" class="top-0 m-2 btn btn-danger btn-sm position-absolute end-0 remove-sub-service">
        حذف
    </button>
                                        <div class="col-lg-3 col-6">
                                            <label class="form-label">اسم الخدمة</label>
                                            <input type="text" name="sub_services[${index}][sub_serv_name]" class="form-control">
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <label class="form-label"> حدد مزود الخدمة </label>
                                            <select required class="form-control" name="sub_services[${index}][provider_id]">
                                                <option value=""> -- حدد --</option>
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
                                            <label class="form-label"> نسبة الربح (٪) </label>
                                            <input required type="number" step=".01" name="sub_services[${index}][profit_percentage]" class="form-control">
                                        </div>

                                        <div class="col-lg-3 col-6">
                                            <div class="form-check form-switch">
                                                <label for="sub_speed_active_${uniqueId}"> السرعة </label>
                                                <input name="sub_services[${index}][speed_active]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_speed_active_${uniqueId}">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_speed_input_container_${uniqueId}">
                                                <label class="form-label">ادخل السرعة</label>
                                                <input type="text" name="sub_services[${index}][speed_active_text]" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-6">
                                            <div class="form-check form-switch">
                                                <label for="sub_quality_status_${uniqueId}"> الجودة </label>
                                                <input name="sub_services[${index}][quality_status]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_quality_status_${uniqueId}">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_quality_input_container_${uniqueId}">
                                                <label class="form-label">ادخل نسبة الجودة</label>
                                                <input type="number" min="1" max="100" name="sub_services[${index}][quality_percentage]" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-6">
                                            <div class="form-check form-switch">
                                                <label for="sub_security_${uniqueId}"> الضمان </label>
                                                <input name="sub_services[${index}][security]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_security_${uniqueId}">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_security_container_${uniqueId}">
                                                <label class="form-label">ادخل الضمان</label>
                                                <input type="text" name="sub_services[${index}][security_text]" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-6">
                                            <div class="form-check form-switch">
                                                <label for="sub_start_time_${uniqueId}"> وقت البدء </label>
                                                <input name="sub_services[${index}][start_time]" class="form-check-input"
                                                    type="checkbox" role="switch" id="sub_start_time_${uniqueId}">
                                            </div>
                                            <div class="mt-2 mb-3 d-none" id="sub_start_time_container_${uniqueId}">
                                                <label class="form-label">ادخل وقت البدء</label>
                                                <input type="text" name="sub_services[${index}][start_time_text]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    `;
                                    container.insertAdjacentHTML('beforeend', newRow);
                                    // تفعيل السويتشات الجديدة
                                    setTimeout(() => {
                                        const speedCheckbox = document.getElementById(`sub_speed_active_${uniqueId}`);
                                        const speedInputContainer = document.getElementById(
                                        `sub_speed_input_container_${uniqueId}`);
                                        if (speedCheckbox) {
                                            speedCheckbox.addEventListener('change', function() {
                                                speedInputContainer.classList.toggle('d-none', !this.checked);
                                            });
                                        }

                                        const qualityCheckbox = document.getElementById(`sub_quality_status_${uniqueId}`);
                                        const qualityInputContainer = document.getElementById(
                                            `sub_quality_input_container_${uniqueId}`);
                                        if (qualityCheckbox) {
                                            qualityCheckbox.addEventListener('change', function() {
                                                qualityInputContainer.classList.toggle('d-none', !this.checked);
                                            });
                                        }

                                        const securityCheckbox = document.getElementById(`sub_security_${uniqueId}`);
                                        const securityInputContainer = document.getElementById(
                                        `sub_security_container_${uniqueId}`);
                                        if (securityCheckbox) {
                                            securityCheckbox.addEventListener('change', function() {
                                                securityInputContainer.classList.toggle('d-none', !this.checked);
                                            });
                                        }

                                        const startTimeCheckbox = document.getElementById(`sub_start_time_${uniqueId}`);
                                        const startTimeInputContainer = document.getElementById(
                                            `sub_start_time_container_${uniqueId}`);
                                        if (startTimeCheckbox) {
                                            startTimeCheckbox.addEventListener('change', function() {
                                                startTimeInputContainer.classList.toggle('d-none', !this.checked);
                                            });
                                        }
                                    }, 100);
                                });
                            </script>
                        </div>
                        <div class="card" id="simple-product-fields">
                            <div class="card-header">
                                <h4 class="card-title"> مميزات الخدمة </h4>
                            </div>
                            <div class="card-body"  style="background-color: #F2F2F8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check form-switch">
                                            <label for="speed_active">اضافة ميزة السرعة</label>
                                            <input name="speed_active" class="form-check-input" type="checkbox"
                                                role="switch" id="speed_active">
                                        </div>
                                        <div class="mt-2 mb-3 d-none" id="speed_input_container">
                                            <label for="speed_active_text" class="form-label">ادخل السرعة</label>
                                            <input type="text" id="speed_active_text" name="speed_active_text"
                                                class="form-control" placeholder=""
                                                value="{{ old('speed_active_text') }}">
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const speedCheckbox = document.getElementById('speed_active');
                                                const speedInputContainer = document.getElementById('speed_input_container');

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

                                    <div class="col-lg-6">
                                        <div class="form-check form-switch">
                                            <label for="quality_status">اضافة ميزة الجودة </label>
                                            <input name="quality_status" class="form-check-input" type="checkbox"
                                                role="switch" id="quality_status">
                                        </div>
                                        <div class="mt-2 mb-3 d-none" id="quality_input_container">
                                            <label for="quality_percentage" class="form-label">ادخل نسبة الجودة </label>
                                            <input type="number" min="1" max="100" id="quality_percentage"
                                                name="quality_percentage" class="form-control" placeholder=""
                                                value="{{ old('quality_percentage') }}">
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const qualityCheckbox = document.getElementById('quality_status');
                                                const qualityInputContainer = document.getElementById('quality_input_container');

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

                                    <div class="col-lg-6">
                                        <div class="form-check form-switch">
                                            <label for="security">اضافة ميزة الضمان </label>
                                            <input name="security" class="form-check-input" type="checkbox"
                                                role="switch" id="security">
                                        </div>
                                        <div class="mt-2 mb-3 d-none" id="security_container">
                                            <label for="security_text" class="form-label"> ادخل الضمان </label>
                                            <input type="text" id="security_text" name="security_text"
                                                class="form-control" placeholder="" value="{{ old('security_text') }}">
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const securityCheckbox = document.getElementById('security');
                                                const securityInputContainer = document.getElementById('security_container');

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

                                    <div class="col-lg-6">
                                        <div class="form-check form-switch">
                                            <label for="start_time">اضافة ميزة وقت البدء </label>
                                            <input name="start_time" class="form-check-input" type="checkbox"
                                                role="switch" id="start_time">
                                        </div>
                                        <div class="mt-2 mb-3 d-none" id="start_time_container">
                                            <label for="start_time_text" class="form-label"> ادخل وقت البدء </label>
                                            <input type="text" id="start_time_text" name="start_time_text"
                                                class="form-control" placeholder=""
                                                value="{{ old('start_time_text') }}">
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const start_timeCheckbox = document.getElementById('start_time');
                                                const start_timeInputContainer = document.getElementById('start_time_container');

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
                                <h4 class="card-title"> تحسينات السيو ( SEO ) </h4>
                            </div>
                            <div class="card-body" style="background-color: #C6C6C621">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label"> عنوان صفحة المنتج (Page Title)  </label>
                                            <input type="text" id="meta_title" name="meta_title" class="form-control"
                                                placeholder="" value="{{ old('meta_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> رابط صفحة المنتج (SEO Page URL) </label>
                                            <input type="text" id="slug" name="slug" class="form-control"
                                                placeholder="" value="{{ old('slug') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_description" class="form-label"> وصف صفحة المنتج (Page Description) </label>
                                            <textarea class="form-control bg-light-subtle" id="meta_description" rows="7" placeholder=""
                                                name="meta_description">{{ old('meta_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="meta_keywords" class="form-label"> الكلمات المفتاحية </label>
                                            <input type="text" id="meta_keywords" name="meta_keywords"
                                                class="form-control" placeholder="" value="{{ old('meta_keywords') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 mb-3 rounded bg-light">
                            <div class="row justify-content-start g-2">
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-primary w-100"> حفظ <i
                                            class='bx bxs-save'></i></button>
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{ url('admin/products') }}" class="btn btn-danger w-100"> الغاء  </a>
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
    <script src="https://cdn.tiny.cloud/1/c8u902w1qjlgsxdu73djug5kw4ckg9n6ggwi5lynenmwrw25/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('product-type').addEventListener('change', function() {
            if (this.value === 'بسيط') {
                document.getElementById('simple-product-fields').style.display = 'block';
                document.getElementById('variable-product-fields').style.display = 'none';
            } else {
                document.getElementById('simple-product-fields').style.display = 'none';
                document.getElementById('variable-product-fields').style.display = 'block';
            }
        });
    </script>

    <script>
        document.getElementById('confirm-variations').addEventListener('click', function($e) {
            $e.preventDefault();
            const attributes = document.querySelectorAll('select[name="attributes[]"]');
            const variations = document.querySelectorAll('input[name="variations[]"]');

            let selectedValues = [];

            attributes.forEach((attribute, index) => {
                const selectedAttribute = attribute.value;
                if (selectedAttribute) {
                    const variationValues = variations[index].value.split('-').map(v => v.trim());
                    selectedValues.push(variationValues);
                }
            });

            const productVariants = cartesianProduct(selectedValues);
            let productVariantsHTML = '';

            productVariants.forEach(variant => {
                const variantText = variant.join(' - ');
                const variationInputsHTML = `
            <div class="variant-inputs d-flex align-items-center justify-content-between">
                <div class="form-group">
                    <label>اسم المتغير</label>
                    <input name='variant_name[]' class="form-control" type="text" value="${variantText}">
                </div>
                <div class="form-group">
                    <label>سعر المنتج</label>
                    <input placeholder="السعر" class="form-control" type="number" name='variant_price[]'>
                </div>
                <div class="form-group">
                    <label>السعر بعد التخفيض</label>
                    <input placeholder="السعر" class="form-control" type="number" name='variant_discount[]'>
                </div>
                <div class="form-group">
                    <label>الكمية المتاحة</label>
                    <input placeholder="الكمية" class="form-control" type="number" name='variant_stock[]'>
                </div>
                <div class="form-group">
                    <label>صورة المنتج</label>
                    <input type='file' class='form-control' name='variant_image[]'>
                </div>
                <div class="form-group">
                    <button style="margin-top: 20px" class="btn btn-sm btn-danger delete-variant"><i class="ti ti-x"></i></button>
                </div>
            </div>
        `;
                productVariantsHTML += variationInputsHTML;
            });

            document.getElementById('product-variants').innerHTML = productVariantsHTML;

            // أضف الاستماع لأزرار الحذف الجديدة
            attachDeleteEventListeners();
        });

        function cartesianProduct(arrays) {
            return arrays.reduce(function(a, b) {
                var result = [];
                a.forEach(function(a) {
                    b.forEach(function(b) {
                        result.push(a.concat([b]));
                    });
                });
                return result;
            }, [
                []
            ]);
        }

        function attachDeleteEventListeners() {
            const deleteButtons = document.querySelectorAll('.delete-variant');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const variantRow = this.closest('.variant-inputs');
                    variantRow.remove();
                });
            });
        }
    </script>

    <script>
        tinymce.init({
            selector: '.tinymce',
            height: 300,
            directionality: 'rtl', // لجعل المحرر يعمل من اليمين إلى اليسار
            language: 'ar',
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                'insertdatetime',
                'media', 'table', 'emoticons', 'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons',
            menu: {
                favs: {
                    title: 'My Favorites',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            image_title: true, // السماح بتعديل العنوان
            automatic_uploads: true,
            images_upload_url: 'post_uploads', // مسار API لاستقبال الصور
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                if (meta.filetype === 'image') {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function() {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.onload = function() {
                            cb(reader.result, {
                                title: file.name
                            });
                        };
                        reader.readAsDataURL(file);
                    };
                    input.click();
                }
            }
        });
    </script>
@endsection
