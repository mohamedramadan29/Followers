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
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    @php
                        toastify()->error($error);
                    @endphp
                @endforeach
            @endif
            <form method="post" action="{{ url('admin/product/update/' . $product['slug']) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> تعديل الخدمة </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> اسم الخدمة </label>
                                            <input required type="text" id="name" name="name"
                                                class="form-control" placeholder="" value="{{ $product['name'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
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
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="service_id" class="form-label"> رقم الخدمة </label>
                                            <input required type="number" id="service_id" name="service_id"
                                                class="form-control" placeholder="" value="{{ $product['service_id'] }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
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
                                    <div class="col-lg-4">
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
                                                        url: '{{ route('get.subcategories') }}', // تأكد من استخدام المسار الصحيح
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
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="status" class="form-label"> حالة الخدمة </label>
                                            <select class="form-control" id="status" data-choices data-choices-groups
                                                data-placeholder="Select Categories" name="status">
                                                <option value=""> -- حدد حالة الخدمة --</option>
                                                <option @if ($product['status'] == 1) selected @endif value="1">
                                                    مفعل
                                                </option>
                                                <option @if ($product['status'] == 0) selected @endif value="0">
                                                    ارشيف
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="profit_percentage " class="form-label"> نسبة الربح (٪) </label>
                                            <input required type="number" step=".01" id="profit_percentage"
                                                name="profit_percentage" class="form-control" placeholder=""
                                                value="{{ $product['profit_percentage'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label"> وصف الخدمة </label>
                                            <textarea required class="form-control bg-light-subtle" id="description" rows="7" placeholder=""
                                                name="description">{{ $product['description'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">الخدمات الفرعية</h4>
                            </div>
                            <div class="card-body">
                                <div id="sub_services_container">
                                    @foreach ($product['SubServices'] as $index => $subserv)
                                        <div class="row mb-3">
                                            <h5>الخدمة الفرعية</h5>
                                            <div class="col-lg-6">
                                                <label for="sub_serv_name" class="form-label">اسم الخدمة</label>
                                                <input type="text"
                                                    name="sub_services[{{ $index }}][sub_serv_name]"
                                                    class="form-control"
                                                    value="{{ old('sub_services.' . $index . '.sub_serv_name', $subserv['name']) }}">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="sub_serv_number" class="form-label">رقم الخدمة</label>
                                                <input type="number"
                                                    name="sub_services[{{ $index }}][sub_serv_number]"
                                                    class="form-control"
                                                    value="{{ old('sub_services.' . $index . '.sub_serv_number', $subserv['provider_service_id']) }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <button type="button" class="btn btn-primary" id="add_sub_service">إضافة خدمة فرعية
                                    جديدة</button>
                            </div>
                            <script>
                                document.getElementById('add_sub_service').addEventListener('click', function() {
                                    const container = document.getElementById('sub_services_container');
                                    const index = container.children.length; // حساب عدد العناصر الحالية
                                    const newRow = `
                                            <div class="row mb-3">
                                                <h5>الخدمة الفرعية</h5>
                                                <div class="col-lg-6">
                                                    <label for="sub_serv_name" class="form-label">اسم الخدمة</label>
                                                    <input type="text" name="sub_services[${index}][sub_serv_name]" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="sub_serv_number" class="form-label">رقم الخدمة</label>
                                                    <input type="number" name="sub_services[${index}][sub_serv_number]" class="form-control" placeholder="">
                                                </div>
                                            </div>`;
                                    container.insertAdjacentHTML('beforeend', newRow);
                                });
                            </script>
                        </div>



                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> مرفقات الخدمة </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label"> صورة الخدمة </label>
                                            <input type="file" id="image" name="image" class="form-control"
                                                accept="image/*">
                                            <br>
                                            <img width="80px" class="img-thumbnail img-prod"
                                                src="{{ asset('assets/uploads/product_images/' . $product['image']) }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" id="simple-product-fields">
                            <div class="card-header">
                                <h4 class="card-title"> تفاصيل العرض </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p> العرض في افضل الخدمات </p>
                                        <div class="d-flex gap-2 align-items-center">
                                            <div class="form-check">
                                                <input name="best_services" class="form-check-input" type="radio"
                                                    value="1" id="flexRadioDefault1" @checked($product['best_services'] == 1)>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    فعال
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="best_services" class="form-check-input" type="radio"
                                                    value="0" id="flexRadioDefault2" @checked($product['best_services'] == 0)>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    غير فعال
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <p> العرض في احدث الخدمات </p>
                                        <div class="d-flex gap-2 align-items-center">
                                            <div class="form-check">
                                                <input name="newest_service" class="form-check-input" type="radio"
                                                    value="1" id="newest_service1" @checked($product['newest_service'] == 1)>
                                                <label class="form-check-label" for="newest_service1">
                                                    فعال
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="newest_service" class="form-check-input" type="radio"
                                                    value="0" id="newest_service2" @checked($product['newest_service'] == 0)>
                                                <label class="form-check-label" for="newest_service2">
                                                    غير فعال
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="simple-product-fields">
                            <div class="card-header">
                                <h4 class="card-title">مميزات الخدمة</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <!-- ميزة السرعة -->
                                    <div class="col-lg-6">
                                        <div class="form-check form-switch">
                                            <label for="speed_active">إضافة ميزة السرعة</label>
                                            <input name="speed_active" class="form-check-input" type="checkbox"
                                                role="switch" id="speed_active"
                                                {{ old('speed_active', $product->speed_active ?? false) ? 'checked' : '' }}>
                                        </div>
                                        <div class="mb-3 mt-2 {{ old('speed_active', $product->speed_active ?? false) ? '' : 'd-none' }}"
                                            id="speed_input_container">
                                            <label for="speed_active_text" class="form-label">أدخل السرعة</label>
                                            <input type="text" id="speed_active_text" name="speed_active_text"
                                                class="form-control" placeholder=""
                                                value="{{ old('speed_active_text', $product->speed_active_text ?? '') }}">
                                        </div>
                                    </div>

                                    <!-- ميزة الجودة -->
                                    <div class="col-lg-6">
                                        <div class="form-check form-switch">
                                            <label for="quality_status">إضافة ميزة الجودة</label>
                                            <input name="quality_status" class="form-check-input" type="checkbox"
                                                role="switch" id="quality_status"
                                                {{ old('quality_status', $product->quality_status ?? false) ? 'checked' : '' }}>
                                        </div>
                                        <div class="mb-3 mt-2 {{ old('quality_status', $product->quality_status ?? false) ? '' : 'd-none' }}"
                                            id="quality_input_container">
                                            <label for="quality_percentage" class="form-label">أدخل نسبة الجودة</label>
                                            <input type="number" min="1" max="100" id="quality_percentage"
                                                name="quality_percentage" class="form-control"
                                                value="{{ old('quality_percentage', $product->quality_percentage ?? '') }}">
                                        </div>
                                    </div>

                                    <!-- ميزة الضمان -->
                                    <div class="col-lg-6">
                                        <div class="form-check form-switch">
                                            <label for="security">إضافة ميزة الضمان</label>
                                            <input name="security" class="form-check-input" type="checkbox"
                                                role="switch" id="security"
                                                {{ old('security', $product->security ?? false) ? 'checked' : '' }}>
                                        </div>
                                        <div class="mb-3 mt-2 {{ old('security', $product->security ?? false) ? '' : 'd-none' }}"
                                            id="security_container">
                                            <label for="security_text" class="form-label">أدخل الضمان</label>
                                            <input type="text" id="security_text" name="security_text"
                                                class="form-control" placeholder=""
                                                value="{{ old('security_text', $product->security_text ?? '') }}">
                                        </div>
                                    </div>

                                    <!-- ميزة وقت البدء -->
                                    <div class="col-lg-6">
                                        <div class="form-check form-switch">
                                            <label for="start_time">إضافة ميزة وقت البدء</label>
                                            <input name="start_time" class="form-check-input" type="checkbox"
                                                role="switch" id="start_time"
                                                {{ old('start_time', $product->start_time ?? false) ? 'checked' : '' }}>
                                        </div>
                                        <div class="mb-3 mt-2 {{ old('start_time', $product->start_time ?? false) ? '' : 'd-none' }}"
                                            id="start_time_container">
                                            <label for="start_time_text" class="form-label">أدخل وقت البدء</label>
                                            <input type="text" id="start_time_text" name="start_time_text"
                                                class="form-control" placeholder=""
                                                value="{{ old('start_time_text', $product->start_time_text ?? '') }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const features = [{
                                        checkboxId: 'speed_active',
                                        containerId: 'speed_input_container'
                                    },
                                    {
                                        checkboxId: 'quality_status',
                                        containerId: 'quality_input_container'
                                    },
                                    {
                                        checkboxId: 'security',
                                        containerId: 'security_container'
                                    },
                                    {
                                        checkboxId: 'start_time',
                                        containerId: 'start_time_container'
                                    },
                                ];

                                features.forEach(feature => {
                                    const checkbox = document.getElementById(feature.checkboxId);
                                    const container = document.getElementById(feature.containerId);

                                    checkbox.addEventListener('change', function() {
                                        container.classList.toggle('d-none', !this.checked);
                                    });
                                });
                            });
                        </script>



                        <div class="card" id="simple-product-fields">
                            <div class="card-header">
                                <h4 class="card-title"> تفاصيل السعر </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="product-price" class="form-label"> سعر الشراء </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                            <input type="number" id="purches_price" name="purchase_price"
                                                class="form-control" placeholder="000"
                                                value="{{ $product['purchase_price'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="product-price" class="form-label"> سعر البيع </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                            <input type="number" id="price" name="price" class="form-control"
                                                placeholder="000" value="{{ $product['price'] }}">
                                        </div>
                                    </div>
                                    {{--                                    <div class="col-lg-6"> --}}
                                    {{--                                        <label for="product-discount" class="form-label"> السعر بعدالخصم </label> --}}
                                    {{--                                        <div class="input-group mb-3"> --}}
                                    {{--                                            <span class="input-group-text fs-20"><i class='bx bxs-discount'></i></span> --}}
                                    {{--                                            <input type="number" id="discount" name="discount" class="form-control" --}}
                                    {{--                                                   placeholder="000" value="{{$product['discount']}}"> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> معلومات السيو ومحركات البحث </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> اضف اسم خاص للرابط ( اختياري )
                                            </label>
                                            <input required type="text" id="slug" name="slug"
                                                class="form-control" placeholder="" value="{{ $product['slug'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label"> العنوان </label>
                                            <input type="text" id="meta_title" name="meta_title" class="form-control"
                                                placeholder="" value="{{ $product['meta_title'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="meta_keywords" class="form-label"> الكلمات المفتاحية </label>
                                            <input type="text" id="meta_keywords" name="meta_keywords"
                                                class="form-control" placeholder=""
                                                value="{{ $product['meta_keywords'] }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_description" class="form-label"> الوصف </label>
                                            <textarea class="form-control bg-light-subtle" id="meta_description" rows="7" placeholder=""
                                                name="meta_description">{{ $product['meta_description'] }}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="p-3 bg-light mb-3 rounded">
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
                    <input name='variant_new_name[]' class="form-control" type="text" value="${variantText}">
                </div>
                <div class="form-group">
                    <label>سعر المنتج</label>
                    <input placeholder="السعر" class="form-control" type="number" name='variant_new_price[]'>
                </div>
                <div class="form-group">
                    <label>السعر بعد التخفيض</label>
                    <input placeholder="السعر" class="form-control" type="number" name='variant_new_discount[]'>
                </div>
                <div class="form-group">
                    <label>الكمية المتاحة</label>
                    <input placeholder="الكمية" class="form-control" type="number" name='variant_new_stock[]'>
                </div>
                <div class="form-group">
                    <label>صورة المنتج</label>
                    <input type='file' class='form-control' name='variant_new_image[]'>
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
@endsection
