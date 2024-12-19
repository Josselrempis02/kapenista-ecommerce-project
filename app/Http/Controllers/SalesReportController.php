<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdersProduct;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class SalesReportController extends Controller
{
    public function showSalesReport(Request $request)
{
    $profitMargin = 0.40;

    $month = $request->input('month', Carbon::now()->format('Y-m'));

    $SalesReport = OrdersProduct::selectRaw('DATE(created_at) as sale_date, SUM(quantity) as total_quantity, SUM(total_price) as total_sales')
        ->whereYear('created_at', '=', Carbon::parse($month)->year)
        ->whereMonth('created_at', '=', Carbon::parse($month)->month)
        ->groupBy('sale_date')
        ->orderBy('sale_date', 'desc')
        ->get();

    $totalSales = OrdersProduct::whereYear('created_at', '=', Carbon::parse($month)->year)
        ->whereMonth('created_at', '=', Carbon::parse($month)->month)
        ->sum('total_price');

    $totalProfit = $totalSales * $profitMargin;

    return view('admin.sales-report', compact('SalesReport', 'month', 'totalSales', 'totalProfit'));
}

public function exportPDF(Request $request)
{
    $profitMargin = 0.40;

    $month = $request->input('month', Carbon::now()->format('Y-m'));

    $dailySales = OrdersProduct::selectRaw('DATE(created_at) as sale_date, SUM(quantity) as total_quantity, SUM(total_price) as total_sales')
        ->whereYear('created_at', '=', Carbon::parse($month)->year)
        ->whereMonth('created_at', '=', Carbon::parse($month)->month)
        ->groupBy('sale_date')
        ->orderBy('sale_date', 'desc')
        ->get();

    $totalSales = OrdersProduct::whereYear('created_at', '=', Carbon::parse($month)->year)
        ->whereMonth('created_at', '=', Carbon::parse($month)->month)
        ->sum('total_price');

    $totalProfit = $totalSales * $profitMargin;

    $pdf = Pdf::loadView('pdf.salesReport', compact('dailySales', 'month', 'totalSales', 'totalProfit'));
    return $pdf->download('sales_report_' . $month . '.pdf');
}

}
