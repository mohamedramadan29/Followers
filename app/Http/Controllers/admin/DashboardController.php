<?php

namespace App\Http\Controllers\admin;

use App\Models\front\User;
use Illuminate\Http\Request;
use App\Models\admin\PublicSetting;
use App\Http\Controllers\Controller;
use App\Models\front\Order;
use App\Models\front\Transaction;
use Illuminate\Support\Carbon;
use Spatie\Analytics\Facades\Analytics;

class DashboardController extends Controller
{
    public function dashboard(){
        $publicsetting = PublicSetting::first();
        $lastUsers = User::latest()->take(10)->get();
       // $totalVisits = Analytics::fetchTotalVisitorsAndPageViews(\Carbon\Carbon::today()->subDays(30))->sum('visitors');
       $totalVisits = 30;
       $ordersCount = Order::where('created_at','>=',Carbon::now()->subDays(30) )->count();
       $usersCount = User::where('created_at','>=',Carbon::now()->subDay(30))->count();
       // عدد المستخدمين النشطين (الذين أنشأوا طلبات في آخر 30 يومًا)
        $activeUsers = Order::where('created_at', '>=', Carbon::now()->subDays(30))
        ->distinct('user_id')
        ->count('user_id');
        $totalSales =  Order::where('created_at','>=',Carbon::now()->subDays(30) )->sum('total_price');
        $totalSalesProvider = Order::where('created_at','>=',Carbon::now()->subDays(30) )->sum('provider_main_price');
        $mainTotalPrice = $totalSales - $totalSalesProvider;
        $UserTotalBalance =  User::sum('balance');
        ############ Last Transactions ############
        $transactions = Transaction::with('user')->latest()->limit(10)->get();
       return view('admin.dashboard', compact('publicsetting','lastUsers'
       ,'totalVisits','ordersCount','usersCount','activeUsers',
    'totalSales','mainTotalPrice','UserTotalBalance','transactions'));
    }
}
