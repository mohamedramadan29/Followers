@include('admin.layouts.header')


@include('admin.layouts.sidebar')

@yield('content')


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

@yield('js')
@include('admin.layouts.footer')
