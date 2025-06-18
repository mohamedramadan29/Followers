<?php

namespace App\Livewire\Front\LivewireEvent;

use App\Models\admin\Faq;
use Livewire\Component;

class ShowCountFaq extends Component
{
    public $faqs;
    public $faq;
    public $isOpen = [];
    public function mount(){
        $this->faqs = Faq::all();
        // تهيئة حالة الأسئلة كمغلقة افتراضيًا
        foreach ($this->faqs as $faq) {
            $this->isOpen[$faq->id] = false;
        }
    }
    public function showFaq($id)
    {
        // إذا كان السؤال مغلقًا، قم بزيادة العداد وتحديث الحالة
        if (!($this->isOpen[$id] ?? false)) {
            $faq = Faq::where('id', $id)->first();
            $faq->views++;
            $faq->save();
            $this->faq = $faq;
        }

        // تبديل حالة السؤال (مفتوح/مغلق)
        $this->isOpen[$id] = !$this->isOpen[$id];
    }
    public function render()
    {
        return view('front.livewire-event.show-count-faq');
    }
}
