<div class="form-check form-switch active">
    <input wire:model.live="active_status" name="active" {{ $active_status == 1 ? 'checked' : '' }}
        class="form-check-input" type="checkbox" role="switch" id="active">

</div>
