@extends('front.layouts.master')
@section('title', ' عدّاد متابعين انستقرام ')
@section('content')

    <!-- ########################## Start New Design ######################### -->
    <div class="container">
        @if (!isset($username))
        <main class="shadow-sm card-custom-insta">
            <h4>عداد متابعين الانستقرام</h4>
            <div class="divider"></div>
            <div class="side-icon left" aria-hidden="true">
                <img src="{{ asset('assets/front/images/instagram-icon-shadow.png') }}" alt="">
            </div>
            <div class="side-icon right" aria-hidden="true">
                <img src="{{ asset('assets/front/images/instagram-icon-shadow.png') }}" alt="">
            </div>
            <div class="icon-center" aria-hidden="true" title="Instagram followers icon">
                <img src="{{ asset('assets/front/images/insta-counter-icon.png') }}" alt="">
            </div>
            <form action="{{ url('instagramCounter') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label-custom" for="username">إدخال اسم المستخدم</label>
                    <input type="text" id="username" required value="{{ $username ?? old('username') }}" name="username" class="form-control form-control-custom"
                        placeholder="أدخل اسم المستخدم هنا" aria-label="أدخل اسم المستخدم هنا" />
                    <button type="submit" class="mt-4 btn btn-custom">تحقق الآن</button>
                </div>
            </form>
        </main>
    </div>
    <!-- ########################## End New Design ########################### -->
    @endif
    @if (isset($username))
        <!--==========================  Start Counter Result  ==========================-->
        <div class="container">
            <main class="shadow-sm card-custom-insta">
                <h4>عداد متابعين الانستقرام</h4>
                <div class="divider"></div>
                <div class="user_image">
                    <img src="{{ $profile_picture }}" alt="Profile Picture">
                </div>
                <div class="user_profile">
                    <p class="name">{{ $full_name }}</p>
                    <p class="username"> {{ $username }} @ </p>
                </div>
                <div class="counter-data">
                    <div class="followers">
                        <img src="{{ asset('assets/front/images/following.svg') }}" alt="">
                        <p>{{ $followers }}</p>
                        <p>المتابعين</p>
                    </div>
                    <div class="followers">
                        <img src="{{ asset('assets/front/images/followers.svg') }}" alt="">
                        <p>{{ $following }}</p>
                        <p> اتابعة  </p>
                    </div>
                </div>
                <form style="width:100%">
                    @csrf
                    <div class="form-group">
                        <a href="{{ url('instagram-followers-counter') }}" class="mt-4 btn btn-custom"> تغير المستخدم  </a>
                    </div>
                </form>
            </main>
        </div>
    @endif
    <!--========================== End Counter Result  ==========================-->

@endsection
