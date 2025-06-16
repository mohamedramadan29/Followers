<!-- Modal -->
<div class="modal fade" id="EditCardModal_{{ $card->id }}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">تعديل بطاقة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/wallet/payment/card/update/' . $card->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label"> الرصيد </label>
                        <input type="number" step="0.01" name="balance" class="form-control" required value="{{ $card->balance }}">
                    </div>
                    <div class="mb-3 cardnumbersection">
                        <label for="" class="form-label"> رقم البطاقة </label>
                        @livewire('admin.wallet.card-suggest-number', ['card_number' => $card->card_number], key($card->id))
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> تعديل </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> الغاء </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
