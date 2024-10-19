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
        // Set the profit margin to 30%
        $profitMargin = 0.30;

        // Get the selected month from the request, default to the current month
        $month = $request->input('month', Carbon::now()->format('Y-m'));

        // Filter sales by the selected month and get daily sales data
        $SalesReport = OrdersProduct::selectRaw('DATE(created_at) as sale_date, SUM(quantity) as total_quantity, SUM(total_price) as total_sales')
            ->whereYear('created_at', '=', Carbon::parse($month)->year)
            ->whereMonth('created_at', '=', Carbon::parse($month)->month)
            ->groupBy('sale_date')
            ->orderBy('sale_date', 'desc')
            ->get();

        // Calculate total sales for the month
        $totalSales = OrdersProduct::whereYear('created_at', '=', Carbon::parse($month)->year)
            ->whereMonth('created_at', '=', Carbon::parse($month)->month)
            ->sum('total_price');

        // Calculate total profit based on the 30% profit margin
        $totalProfit = $totalSales * $profitMargin;

        return view('admin.sales-report', compact('SalesReport', 'month', 'totalSales', 'totalProfit'));
    }

    public function exportPDF(Request $request)
    {
        // Set the profit margin to 30%
        $profitMargin = 0.30;

        // Get the selected month from the request, default to the current month
        $month = $request->input('month', Carbon::now()->format('Y-m'));

        // Filter sales by the selected month and get daily sales data
        $dailySales = OrdersProduct::selectRaw('DATE(created_at) as sale_date, SUM(quantity) as total_quantity, SUM(total_price) as total_sales')
            ->whereYear('created_at', '=', Carbon::parse($month)->year)
            ->whereMonth('created_at', '=', Carbon::parse($month)->month)
            ->groupBy('sale_date')
            ->orderBy('sale_date', 'desc')
            ->get();

        // Calculate total sales for the month
        $totalSales = OrdersProduct::whereYear('created_at', '=', Carbon::parse($month)->year)
            ->whereMonth('created_at', '=', Carbon::parse($month)->month)
            ->sum('total_price');

        // Calculate total profit based on the 30% profit margin
        $totalProfit = $totalSales * $profitMargin;

        // Pass data to the PDF view
        $pdf = Pdf::loadView('pdf.salesReport', compact('dailySales', 'month', 'totalSales', 'totalProfit'));
        return $pdf->download('sales_report_' . $month . '.pdf');
    }
}
