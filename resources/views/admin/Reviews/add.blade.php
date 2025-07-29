@extends('admin.layouts.master')
@section('title', ' التقيمات ')
@section('reviews-active', 'active')
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/review/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> اضافة تقييم جديد </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="service" class="form-label"> الخدمة <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <select required class="form-control" id="service_id" data-choices
                                                data-choices-groups data-placeholder="Select Categories" name="service_id">
                                                <option value=""> -- حدد الخدمة --</option>
                                                @foreach ($products as $product)
                                                    <option {{ old('service_id') == $product['id'] ? 'selected' : '' }} value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> العميل <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <select required class="form-control" id="user_id" data-choices
                                                data-choices-groups data-placeholder="Select Categories" name="user_id">
                                                <option value=""> -- حدد العميل --</option>
                                                @foreach ($users as $user)
                                                    <option {{ old('user_id') == $user['id'] ? 'selected' : '' }} value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="published_date" class="form-label"> تاريخ النشر
                                            </label>
                                            <input required type="date" id="published_date" class="form-control"
                                                name="published_date" value="{{ old('published_date') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">التقييم <span class="star" style="color: red"> *
                                                </span></label>
                                            <br>
                                            <div class="star-rating" style="background-color:#fff !important">
                                                <input type="radio" {{ old('rating') == 5 ? 'checked' : '' }} name="rating" id="rating-5" value="5"><label
                                                    for="rating-5">★</label>
                                                <input type="radio" {{ old('rating') == 4 ? 'checked' : '' }} name="rating" id="rating-4" value="4"><label
                                                    for="rating-4">★</label>
                                                <input type="radio" {{ old('rating') == 3 ? 'checked' : '' }} name="rating" id="rating-3" value="3"><label
                                                    for="rating-3">★</label>
                                                <input type="radio" {{ old('rating') == 2 ? 'checked' : '' }} name="rating" id="rating-2" value="2"><label
                                                    for="rating-2">★</label>
                                                <input type="radio" {{ old('rating') == 1 ? 'checked' : '' }} name="rating" id="rating-1" value="1"><label
                                                    for="rating-1">★</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="service" class="form-label"> حالة التقيم <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <select required class="form-control" id="status" data-choices
                                                data-choices-groups data-placeholder="Select Categories" name="status">
                                                <option value=""> -- حدد --</option>
                                                <option {{ old('status') == 1 ? 'selected' : '' }} value="1"> فعال </option>
                                                <option {{ old('status') == 0 ? 'selected' : '' }} value="0"> غير فعال </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="content" class="form-label"> محتوي التقييم
                                        </label>
                                        <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                                    </div>
                                    <style>
                                        .star-rating {
                                            direction: rtl;
                                            display: inline-flex;
                                            gap: 5px;
                                        }

                                        .star-rating input {
                                            display: none;
                                        }

                                        .star-rating label {
                                            font-size: 24px;
                                            color: #ddd;
                                            cursor: pointer;
                                        }

                                        .star-rating input:checked~label,
                                        .star-rating label:hover,
                                        .star-rating label:hover~label {
                                            color: #ffbf00;
                                        }
                                    </style>
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
                                    <a href="{{ url('admin/reviews') }}" class="btn btn-danger w-100"> الغاء </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Container Fluid -->


        <!-- ==================================================== -->
        <!-- End Page Content -->
        <!-- ==================================================== -->
    @endsection
