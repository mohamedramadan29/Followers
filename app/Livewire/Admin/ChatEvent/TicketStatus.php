<?php

namespace App\Livewire\Admin\ChatEvent;

use App\Http\Traits\Message_Trait;
use Livewire\Component;

class TicketStatus extends Component
{
    use Message_Trait;
    public $ticket_status;
    public $ticket;

    public function mount($ticket)
    {
        $this->ticket = $ticket;
        $this->ticket_status = $this->ticket->status; // تهيئة ticket_status بقيمة الحالة الحالية
    }

    public function changeStatus()
    {
        $this->ticket->update([
            'status' => $this->ticket_status
        ]);
        $this->dispatch('ticket-status-updated','تم تحديث حالة التذكرة');
       // $this->success_message('تم تحديث حالة التذكرة');
    }

    public function closeTicket()
    {
        $this->ticket->update([
            'status' => 2
        ]);
        $this->dispatch('close-ticket','تم اغلاق التذكرة');
    }
    public function render()
    {
        return view('admin.chat-event.ticket-status');
    }
}
