<!-- ========== Footer Start ========== -->
{{-- <footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="text-center col-12">
                <script>
                    document.write(new Date().getFullYear())
                </script> &copy; اسم الموقع . <iconify-icon icon="iconamoon:heart-duotone"
                    class="align-middle fs-18 text-danger"></iconify-icon> <a href="#" class="fw-bold footer-text"
                    target="_blank"> Mr </a>
            </div>
        </div>
    </div>
</footer> --}}
<!-- ========== Footer End ========== -->

</div>


</div>
<!-- END Wrapper -->

<!-- Vendor Javascript (Require in all Page) -->
<script src="{{ asset('assets/admin/js/vendor.js') }}"></script>

<!-- App Javascript (Require in all Page) -->
<script src="{{ asset('assets/admin/js/app.js') }}"></script>

<!-- Vector Map Js -->
{{-- <script src="{{asset('assets/admin/vendor/jsvectormap/js/jsvectormap.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/admin/vendor/jsvectormap/maps/world-merc.js')}}"></script> --}}
{{-- <script src="{{asset('assets/admin/vendor/jsvectormap/maps/world.js')}}"></script> --}}

<!-- Dashboard Js -->
<script src="https://cdn.tiny.cloud/1/c8u902w1qjlgsxdu73djug5kw4ckg9n6ggwi5lynenmwrw25/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>
<script src="{{ asset('assets/admin/js/pages/dashboard.js') }}"></script>
<!-------- File Input --------->
<script src="{{ asset('vendor/fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('vendor/fileinput/themes/bs5/theme.min.js') }}"></script>
@if (Config::get('app.locale') == 'ar')
    <script src="{{ asset('vendor/fileinput/js/locales/LANG.js') }}"></script>
    <script src="{{ asset('vendor/fileinput/js/locales/ar.js') }}"></script>
@endif
<!-------- End File Input ---------->

<!-- Start file Input  -->
<script>
    var lang = "{{ app()->getLocale() }}";
    $("#single-image").fileinput({
        theme: 'fa5',
        allowedFileTypes: ['image'],
        language: lang,
        maxFileCount: 1,
        enableResumableUpload: false,
        showUpload: false,
    });
</script>
<!-- End File Input -->

@toastifyJs
@yield('js')
{!! NoCaptcha::renderJs() !!}
</body>

</html>
