<div>
    @if ($ticket->status != 2)
    <form wire:submit.prevent="changeStatus">
        @csrf
        <div class="ticket_number" style="padding: 10px;color:#000">
            <div class="form-group">
                <label for="">حدد حالة التذكرة</label>
                <select wire:model.live="ticket_status" id="" class="form-select" wire:change="changeStatus">
                    <option value="">اختر حالة التذكرة</option>
                    <option value="0">عادية</option>
                    <option value="1">عاجلة</option>
                </select>
            </div>
        </div>
    </form>

    <div class="close-ticket" style="padding: 10px;text-align:center">
        <form wire:submit.prevent="closeTicket">
            @csrf
            <button class="btn btn-danger" type="submit"
                style="border-radius: 5px;background-color:#EF2B1F">اغلاق المحادثة
            </button>
        </form>
    </div>
    @endif
</div>
