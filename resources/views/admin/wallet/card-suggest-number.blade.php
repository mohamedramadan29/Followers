<div class="cardnumberinputs">
    <input type="text" wire:model.live='card_number' name="card_number" class="form-control" required placeholder="" id="cardNumber" value="{{ $card_number }}">
    <button class="btn btn-sm" onclick="copyToClipboard(this)">
        <i class="fa fa-copy"></i>
    </button>
    <button class="newcardnumbersugest" wire:click.prevent='SuggestCardNumber'> تلقائي </button>
</div>
