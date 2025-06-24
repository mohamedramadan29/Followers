@include('front.layouts.header')

@include('front.layouts.navbar')

@yield('content')
<!------------------------------- Message Alerts   ----------------------->
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
            toastify()->error($error);
        @endphp
    @endforeach
@endif

<!------------------------------- Message Alerts   ----------------------->
@include('front.layouts.footer')
