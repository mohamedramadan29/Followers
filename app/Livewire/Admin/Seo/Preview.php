<?php

namespace App\Livewire\Admin\Seo;

use Illuminate\Support\Str;
use Livewire\Component;

class Preview extends Component
{
    public $meta_title;
    public $meta_description;
    public $meta_url;
    public $meta_url_final;

    public function updatedMetaUrl($value)
        {
            // تنسيق الرابط (slug) باستخدام دالة Str::slug
            $this->meta_url_final = Str::slug($value, '-');
            // إرسال الحدث إلى الواجهة الأمامية لتحديث المعاينة
            $this->dispatch('updateSlug', $this->meta_url_final);
        }
        public function render()
        {
            // تنسيق الرابط عند تحميل الصفحة إذا كانت meta_url تحتوي على قيمة
            if ($this->meta_url && !$this->meta_url_final) {
                $this->meta_url_final = Str::slug($this->meta_url, '-');
            }
            return view('admin.seo.preview');
        }
    }
