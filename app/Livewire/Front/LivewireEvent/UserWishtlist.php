<?php

namespace App\Livewire\Front\LivewireEvent;

use App\Models\front\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserWishtlist extends Component
{
    public $wishlist = []; // مصفوفة محلية لتتبع المنتجات
    public $wishlistcount = 0;

    public function mount()
    {
        $this->loadWishlist(); // تحميل القائمة عند بدء المكون
    }

    public function loadWishlist()
    {
        $this->wishlist = Wishlist::where('user_id', Auth::user()->id)->with('product')->latest()->get(); // بدون toArray()
        $this->wishlistcount = $this->wishlist->count();
    }

    public function removeFromWishlist($productId)
    {
        $userId = Auth::id();
        if (!$userId) {
            $wishlist = session()->get('wishlist', []);
            if (($key = array_search($productId, $wishlist)) !== false) {
                unset($wishlist[$key]);
                $wishlist = array_values($wishlist);
                session()->put('wishlist', $wishlist);
                $this->dispatch('wishlist-updated', ['message' => 'تمت إزالة الخدمة من قائمة الرغبات!']);
            }
        } else {
            // إزالة من القائمة المحلية فورًا
            $this->wishlist = $this->wishlist->filter(function ($item) use ($productId) {
                return $item->product_id != $productId;
            })->values();

            // حذف من قاعدة البيانات
            Wishlist::where('user_id', $userId)->where('product_id', $productId)->delete();

            $this->dispatch('wishlist-updated', ['message' => 'تمت إزالة الخدمة من قائمة الرغبات!']);
        }
    }

    public function render()
    {
        return view('front.livewire-event.user-wishtlist', ['wishlist' => $this->wishlist, 'wishlistcount' => $this->wishlistcount]);
    }
}
