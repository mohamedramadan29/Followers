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
<script src="{{ asset('assets/admin/js/pages/app-chat.js') }}"></script>

<!-- Vector Map Js -->
{{-- <script src="{{asset('assets/admin/vendor/jsvectormap/js/jsvectormap.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/admin/vendor/jsvectormap/maps/world-merc.js')}}"></script> --}}
{{-- <script src="{{asset('assets/admin/vendor/jsvectormap/maps/world.js')}}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Dashboard Js -->
<script src="https://cdn.tiny.cloud/1/c8u902w1qjlgsxdu73djug5kw4ckg9n6ggwi5lynenmwrw25/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>
<script src="{{ asset('assets/admin/js/pages/dashboard.js') }}"></script>
<!-------- File Input --------->
<script src="{{ asset('vendor/fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('vendor/fileinput/themes/bs5/theme.min.js') }}"></script>
<script src="{{ asset('vendor/fileinput/js/locales/LANG.js') }}"></script>
<script src="{{ asset('vendor/fileinput/js/locales/ar.js') }}"></script>

<!-------- End File Input ---------->

<!-- Start file Input  -->
<script>
    var lang = "{{ app()->getLocale() }}";
    $("#single-image").fileinput({
        theme: 'bs5',
        allowedFileTypes: ['image'],
        language: lang,
        maxFileCount: 1,
        enableResumableUpload: false,
        showUpload: false,
    });
    $("#single-image2").fileinput({
        theme: 'bs5',
        allowedFileTypes: ['image'],
        language: lang,
        maxFileCount: 1,
        enableResumableUpload: false,
        showUpload: false,
    });
</script>
<!--- Start tinymce -->
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
<!-- End File Input -->
@toastifyJs
@yield('js')
@stack('js')
{!! NoCaptcha::renderJs() !!}
</body>

</html>
