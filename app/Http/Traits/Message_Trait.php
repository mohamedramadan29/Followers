<?php

namespace App\Http\Traits;
trait Message_Trait
{
    public function success_message($msg,$order=null)
    {
        return redirect()->back()->with([
            'Success_message' => $msg,
            'order' => $order
        ]);
    }
    public function Error_message($msg)
    {
        return redirect()->back()->with(['Error_message' => $msg]);
    }
    public function exception_message($e){
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
}
