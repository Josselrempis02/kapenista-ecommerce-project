<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdersProduct;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class SalesReportController extends Controller
{
    public function showSalesReport(){
        $SalesReport = OrdersProduct::selectRaw('DATE(created_at) as sale_date, SUM(quantity) as total_quantity, SUM(total_price) as total_sales')
        ->groupBy('sale_date')
        ->orderBy('sale_date', 'desc')
        ->get();

        return view('admin.sales-report', compact('SalesReport'));
    }

    public function exportPDF()
{
    $dailySales = OrdersProduct::selectRaw('DATE(created_at) as sale_date, SUM(quantity) as total_quantity, SUM(total_price) as total_sales')
                        ->groupBy('sale_date')
                        ->orderBy('sale_date', 'desc')
                        ->get();
    
    $pdf = Pdf::loadView('pdf.salesReport', compact('dailySales'));
    return $pdf->download('sales_report.pdf');
}
}

