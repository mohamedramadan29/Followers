<?php

namespace App\Http\Controllers\admin;
use Carbon\Carbon;
use App\Services\Api;
use App\Models\front\Order;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ReportController extends Controller
{
    public function index()
    {

        // التقرير الأول: عدد الطلبات الشهرية
        $months = [];
        $counts = [];

        // الاستعلام مع تصفية التواريخ غير الصالحة
        $orders = Order::whereNotNull('created_at')
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->toArray();

        // تجميع الأشهر دون تكرار
        foreach ($orders as $order) {
            $month = Carbon::createFromFormat('Y-m', $order['month'])->format('F Y');
            if (!in_array($month, $months)) {
                $months[] = $month;
                $counts[] = $order['count'];
            }
        }

        // استكمال الأشهر السابقة حتى 7 (مع تحسين الحلقة)
        $currentMonth = Carbon::now()->startOfMonth();
        for ($i = 6; $i >= 0; $i--) {
            $month = $currentMonth->copy()->subMonths($i)->format('F Y');
            if (!in_array($month, $months)) {
                $months[] = $month;
                $counts[] = 0;
            }
        }

        // ترتيب الأشهر تصاعديًا
        array_multisort($months, $counts);
        $monthlyOrders = [
            'labels' => $months,
            'data' => $counts,
        ];

        ##############################################################################

        // التقرير الثاني: توزيع الحالات من جدول orders
        $statuses = Order::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->status => $item->count];
            })
            ->all();

        $statusDistribution = [
            'labels' => array_keys($statuses),
            'data' => array_values($statuses),
        ];

        ##############################################################################

    // التقرير الثالث: أفضل المنتجات مبيعًا
    $topProducts = Order::select('product_id', DB::raw('COUNT(*) as total_sales'))
    ->groupBy('product_id')
    ->orderBy('total_sales', 'desc')
    ->limit(5) // أعلى 5 منتجات
    ->get();

// إذا كان هناك جدول products، اربطه للحصول على الأسماء
$productData = [];
foreach ($topProducts as $product) {
    $productName = $product->product ? $product->product->name : "Product ID {$product->product_id}"; // افتراض علاقة product()
    $productData[] = [
        'label' => $productName,
        'sales' => $product->total_sales,
    ];
}

$bestSellingProducts = [
    'labels' => array_column($productData, 'label'),
    'data' => array_column($productData, 'sales'),
];

        return view('admin.Reports.index', compact('monthlyOrders', 'statusDistribution','bestSellingProducts'));
    }

    ################### Start Sales #############



    public function sales(Request $request)
    {
        // الإعداد الافتراضي: اليوم الحالي
        $filterType = $request->input('filter_type', 'daily'); // افتراضي: يومي
        $date = $request->input('date', Carbon::today()->format('Y-m-d')); // التاريخ الافتراضي هو اليوم (29 يوليو 2025)

        // حساب الإجماليات
        $totalprice = Order::where('status', 'Completed')->sum('total_price');
        $totalspent = Order::where('status', 'Completed')->sum('provider_main_price');
        $totalprofit = $totalprice - $totalspent;

        // تصفية الطلبات بناءً على المتغيرات إذا وجدت
        $query = Order::query();

        if ($filterType === 'daily' && $request->has('date')) {
            $query->whereDate('created_at', '=', $date);
        } elseif ($filterType === 'monthly' && $request->has('date')) {
            $query->whereYear('created_at', '=', Carbon::parse($date)->year)
                  ->whereMonth('created_at', '=', Carbon::parse($date)->month);
        } elseif ($filterType === 'custom' && $request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } else {
            // الافتراضي: اليوم الحالي إذا لم يكن هناك تصفية
            $query->whereDate('created_at', '=', Carbon::today());
        }

        $orders = $query->get();

        // إعداد البيانات للرسم البياني
        $orderCounts = [];
        foreach ($orders as $order) {
            $dateKey = $filterType === 'daily' ? $order->created_at->format('Y-m-d') :
                       ($filterType === 'monthly' ? $order->created_at->format('Y-m') : $order->created_at->format('Y-m-d'));
            $orderCounts[$dateKey] = ($orderCounts[$dateKey] ?? 0) + 1;
        }

        $chartData = [
            'labels' => array_keys($orderCounts),
            'data' => array_values($orderCounts),
        ];

        // تمرير الـ $request إلى العرض
        return view('admin.Reports.sales', compact('orders', 'filterType', 'date', 'chartData', 'totalprice', 'totalspent', 'totalprofit', 'request'));
    }


    public function products(Request $request)
    {
        // جلب جميع المنتجات
        $products = Product::all();
        $filterType = $request->input('filter_type', 'daily');
        $date = $request->input('date', Carbon::today()->format('Y-m-d'));

        // تصفية الطلبات بناءً على المتغيرات
        $query = Order::with('product')
                      ->where('status', 'Completed');

        if ($filterType === 'daily' && $request->has('date')) {
            $query->whereDate('created_at', '=', $date);
        } elseif ($filterType === 'monthly' && $request->has('date')) {
            $query->whereYear('created_at', '=', Carbon::parse($date)->year)
                  ->whereMonth('created_at', '=', Carbon::parse($date)->month);
        } elseif ($filterType === 'custom' && $request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } else {
            $query->whereDate('created_at', '=', Carbon::today());
        }

        $orders = $query->get();

        // حساب إجمالي المبيعات، الأرباح، وعدد الطلبات لكل منتج
        $productSales = [];
        foreach ($orders as $order) {
            $productId = $order->product_id;
            $totalPrice = $order->total_price ?? 0;
            $providerMainPrice = $order->provider_main_price ?? 0;
            $profit = $totalPrice - $providerMainPrice;

            if (!isset($productSales[$productId])) {
                $productSales[$productId] = [
                    'total_sales' => 0,
                    'total_profit' => 0,
                    'order_count' => 0,
                    'product_name' => $order->product->name ?? 'Unknown Product',
                    'product_image' => $order->product->image ?? '',
                ];
            }
            $productSales[$productId]['total_sales'] += $totalPrice;
            $productSales[$productId]['total_profit'] += $profit;
            $productSales[$productId]['order_count'] += 1;
        }

        // إعداد البيانات للعرض
        $productData = [];
        foreach ($products as $product) {
            $productId = $product->id;
            $productData[$productId] = [
                'name' => $product->name,
                'image' => $product->image,
                'total_sales' => $productSales[$productId]['total_sales'] ?? 0,
                'total_profit' => $productSales[$productId]['total_profit'] ?? 0,
                'order_count' => $productSales[$productId]['order_count'] ?? 0,
            ];
        }

        // تمرير الـ $request لاستخدامه في العرض
        return view('admin.Reports.products', compact('productData', 'filterType', 'date', 'request'));
    }

    public function visits(){
        return view('admin.Reports.visits');
    }


    ################## End Sales ###############
}


