<?php

namespace App\Livewire\Front\LivewireEvent;

use App\Models\admin\Product;
use App\Models\front\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Wishtlist extends Component
{
 public $message;
    public $service;

    public function mount($service)
    {
        $this->service = $service;
    }

    public function addToWishlist($productId)
    {
        $userId = Auth::id();
        if (!$userId) {
            // إذا لم يكن المستخدم مسجلاً دخوله، استخدم الجلسة مؤقتًا
            $wishlist = session()->get('wishlist', []);
            if (!in_array($productId, $wishlist)) {
                $wishlist[] = $productId;
                session()->put('wishlist', $wishlist);
                $this->dispatch('wishlist-updated', ['message' => 'تمت إضافة الخدمة إلى قائمة الرغبات مؤقتًا!']);
            }
        } else {
            // إذا كان مسجلاً دخوله، أضف إلى قاعدة البيانات
            if (!Wishlist::where('user_id', $userId)->where('product_id', $productId)->exists()) {
                Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                ]);
                $this->dispatch('wishlist-updated', ['message' => 'تمت إضافة الخدمة إلى قائمة الرغبات!']);
            }
        }
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
            Wishlist::where('user_id', $userId)->where('product_id', $productId)->delete();
            $this->dispatch('wishlist-updated', ['message' => 'تمت إزالة الخدمة من قائمة الرغبات!']);
        }
    }

    public function render()
    {
        $wishlist = Auth::check() ? Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray() : session()->get('wishlist', []);
        return view('front.livewire-event.wishtlist', compact('wishlist'));
    }
}
