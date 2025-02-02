@php

    $news = App\Models\admin\LastNew::orderBy('id', 'desc')->take(5)->get();

@endphp

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">آخر الأخبار</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="news-container">
            @foreach ($news as $new)
                <div class="news-item">
                    <span class="news-date">{{ $new->created_at->translatedFormat('d F , Y') }}</span>
                    <h5 class="news-title"> {{ $new->title }} </h5>
                    <p class="news-content">
                        {!! $new->content !!}
                    </p>
                    <img class="image" src="{{ asset('assets/uploads/News/' . $new->image) }}" alt="">
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
