<?php

namespace App\Livewire\Admin\Wallet;

use Livewire\Component;
use App\Models\admin\PaymentCard;

class CardSuggestNumber extends Component
{

    public $card_number;

    ############ Suggest Card Number And sure is Unique (Card Number From 10 number and three letters)
    public function SuggestCardNumber(){
        $max_attempts = 100; // الحد الأقصى للمحاولات
        $attempts = 0;
        $letters = range('A', 'Z');

            do {
                // إنشاء 10 أرقام عشوائية
                $number = sprintf('%010d', mt_rand(0, 9999999999)); // يضمن 10 أرقام مع صفر قائد إذا لزم
                // إنشاء 3 أحرف عشوائية
                $random_letters = $letters[array_rand($letters)] . $letters[array_rand($letters)] . $letters[array_rand($letters)];
                // دمج الأرقام مع الأحرف
                $card_number = $number . $random_letters;
                // التحقق من وجود الرقم في قاعدة البيانات
                $card = PaymentCard::where('card_number', $card_number)->first();
                $attempts++;
            } while ($card && $attempts < $max_attempts);

            if ($attempts >= $max_attempts) {
                session()->flash('error', 'تعذر إنشاء رقم بطاقة فريد. حاول مرة أخرى لاحقًا.');
                $this->card_number = null;
                return;
            }

            $this->card_number = $card_number;
        }
        public function CopyToClibord(){

        }
    public function render()
    {
        return view('admin.wallet.card-suggest-number');
    }
}
