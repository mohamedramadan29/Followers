<div class="card-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="meta_title" class="form-label">عنوان صفحة المنتج (Page Title)</label>
                <input type="text" id="meta_title" class="form-control" name="meta_title" wire:model.live="meta_title"
                    placeholder="ادخل العنوان هنا" value="{{ old('meta_title') }}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="meta_url" class="form-label">رابط صفحة المنتج (SEO PAGE URL)</label>
                <input type="text" id="meta_url" class="form-control" name="meta_url" wire:model.live="meta_url"
                    placeholder="أدخل رابط المنتج" value="{{ old('meta_url') }}">
                <!-- حقل مخفي لتخزين الرابط النهائي -->
                <input type="hidden" name="meta_url_final" id="meta_url_final" value="{{ $meta_url_final ?? old('meta_url') }}">
                <!-- معاينة الرابط -->
                <div class="mt-2">
                    <small class="text-muted">معاينة الرابط: </small>
                    <span id="urlPreview" class="text-primary">{{ url('/product/') }}/<span id="slugPreview">{{ $meta_url_final ?? old('meta_url', '') }}</span></span>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="meta_description" class="form-label">وصف صفحة المنتج (Page Description)</label>
                <textarea class="form-control" id="meta_description" rows="7" name="meta_description" wire:model.live="meta_description"
                    placeholder="وصف صفحة المنتج">{{ old('meta_description') }}</textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="meta_keywords" class="form-label">الكلمات المفتاحية</label>
                <div class="input-group">
                    <input type="text" id="meta_keywords" class="form-control" placeholder="أدخل الكلمات المفتاحية">
                    <input type="hidden" name="meta_keywords" id="hidden_keywords" value="{{ old('meta_keywords') }}">
                </div>
                <div id="keywordList" class="mt-2">
                    @if (old('meta_keywords'))
                        @foreach (explode(',', old('meta_keywords')) as $keyword)
                            <span class="mb-2 text-white badge bg-primary me-2" data-keyword="{{ $keyword }}">
                                {{ $keyword }} <span class="ms-2 text-danger" onclick="removeKeyword(this)">×</span>
                            </span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="alert alert-info" role="alert">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0">{{ $meta_title ?? old('meta_title', 'حساب تيك توك للبيع k 23') }}</p>
                        <p class="mb-0 text-muted">{{ $meta_description ?? old('meta_description', 'امتلك حساب تيك توك k 23 متاح للبيع بسهولة وسرعة، خمس خطوات على المنصة وتمتع بتفاعل مضمون، دون قلق.') }}</p>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="{{ url('/product/') }}/{{ $meta_url_final ?? old('meta_url', '') }}" class="text-primary" id="seoUrlExample" target="_blank">{{ url('/product/') }}/{{ $meta_url_final ?? old('meta_url', '') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('updateSlug', (slug) => {
            document.getElementById('slugPreview').textContent = slug;
            document.getElementById('meta_url_final').value = slug;
            document.getElementById('seoUrlExample').textContent = '{{ url('/product/') }}/' + slug;
            document.getElementById('seoUrlExample').href = '{{ url('/product/') }}/' + slug;
        });
    });

    function removeKeyword(element) {
        element.parentElement.remove();
        updateHiddenKeywords();
    }

    function updateHiddenKeywords() {
        const keywords = Array.from(document.querySelectorAll('#keywordList .badge'))
            .map(span => span.dataset.keyword)
            .join(',');
        document.getElementById('hidden_keywords').value = keywords;
    }
</script>
