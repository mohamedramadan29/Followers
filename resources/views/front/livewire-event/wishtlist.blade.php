<div style="position: relative">
    <div class="wishlist-heart">
        @if (!in_array($service['id'], $wishlist))
            <button wire:click="addToWishlist({{ $service['id'] }})" wire:loading.attr="disabled">
                <i class="bi bi-heart"></i>
            </button>
        @endif
        @if (in_array($service['id'], $wishlist))
            <button wire:click="removeFromWishlist({{ $service['id'] }})" class="active"> <i class="bi bi-heart"></i>
            </button>
        @endif
    </div>


    <div wire:ignore>
        <div x-data="{ open: false, message: '' }" x-init="Livewire.on('wishlist-updated', (event) => {
            message = event.detail.message;
            open = true;
            setTimeout(() => open = false, 3000);
        })" x-show="open"
            class="fixed right-5 bottom-5 z-50 alert alert-success">
            {{ $message }}
        </div>
    </div>

    <style>
        .wishlist-heart {
            position: absolute;
            left: -30px;
            top: -20px;
            background: #ebe6e6;
            width: 35px;
            height: 35px;
            line-height: 45px;
            text-align: center;
            border-radius: 22px;

        }

        .wishlist button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: #ccc;
        }

        .wishlist button.active {
            color: #ff0000;
        }

        .wishlist button:disabled {
            cursor: not-allowed;
            opacity: 0.6;
        }
    </style>
</div>
