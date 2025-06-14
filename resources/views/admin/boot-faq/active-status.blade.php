<div class="form-check form-switch active_bot">
    <label for="active_bot"> تفعيل البوت </label>
    <input wire:model.live="active_bot" name="active" {{ $setting->active_bot == 1 ? 'checked' : '' }}
        class="form-check-input" type="checkbox" role="switch" id="active_bot">
</div>
