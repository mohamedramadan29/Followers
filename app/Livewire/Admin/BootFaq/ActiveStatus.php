<?php

namespace App\Livewire\Admin\BootFaq;

use App\Models\admin\PublicSetting;
use Livewire\Component;

class ActiveStatus extends Component
{


    public $active_bot;
    public function mount(){
         $this->active_bot = PublicSetting::first()->active_bot;
    }
    public function updatedActiveBot($value){
            PublicSetting::first()->update([
                'active_bot' => $value ? 1 : 0,
            ]);
    }

    public function render()
    {
        return view('admin.boot-faq.active-status');
    }
}
