<?php

namespace App\Livewire\Admin\Admins;

use Livewire\Component;

class ChangeStatus extends Component
{
    public $admin;
    public $active_status;
    public function mount($admin)
    {
        $this->admin = $admin;
        $this->active_status = (bool) $admin->status;
    }
    public function updatedActiveStatus($value)
    {
        $this->admin->status = $value == true ? 1 : 0;
        $this->admin->save();
    }
    public function render()
    {
        return view('admin.admins.change-status');
    }
}
