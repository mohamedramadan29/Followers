@extends('front.layouts.master')
@section('title', $page['title'])
@section('content')
    <!-- ======================== Breadcrumb Two Section Start ===================== -->
    <section class="p-0 breadcrumb border-bottom d-block position-relative z-index-1">
        <div class="breadcrumb-two" style="padding:30px 0">
            <div class="container container-two">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center breadcrumb-two-content">
                            <div class="mb-2 most-ordered-title-bar d-flex align-items-center justify-content-center">
                                <div class="most-ordered-title-line flex-grow-1"></div>
                                <h4 class="mx-3 mb-0 most-ordered-title-text"> {{ $page['title'] }} </h4>
                                <div class="most-ordered-title-line flex-grow-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== Breadcrumb Two Section End ===================== -->

    <!-- =========================== Contact Section Start ========================== -->
    <section class="overflow-hidden contact padding-t-120 padding-b-60 position-relative z-index-1">

        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="contact-info">
                        {!! $page['content'] !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- =========================== Contact Section End ========================== -->


@endsection
