<section class="py-5 faq-section">
    <div class="container">
        <div class="mb-2 faq-title-bar d-flex align-items-center justify-content-center">
            <div class="faq-title-line flex-grow-1"></div>
            <h4 class="mx-3 mb-0 faq-title-text">الأسئلة الشائعة</h4>
            <div class="faq-title-line flex-grow-1"></div>
        </div>
        <div class="mb-3 text-center faq-desc">نرد على الاستفسارات الخاصة بكم في صورة سؤال وجواب.</div>
        <div class="accordion faq-list" id="faqAccordion">
            @foreach ($faqs as $faq)
                <div class="mb-2 accordion-item faq-item">
                    <h2 wire:click="showFaq({{ $faq['id'] }})" class="accordion-header"
                        id="faqHeading{{ $faq['id'] }}">
                        <button class="accordion-button faq-q collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faqCollapse{{ $faq['id'] }}" aria-expanded="false"
                            aria-controls="faqCollapse{{ $faq['id'] }}">
                            {{ $faq->title }}
                        </button>
                    </h2>
                    <div wire:ignore id="faqCollapse{{ $faq['id'] }}" class="accordion-collapse collapse"
                        aria-labelledby="faqHeading{{ $faq['id'] }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body faq-a">
                            {!! $faq->content !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
