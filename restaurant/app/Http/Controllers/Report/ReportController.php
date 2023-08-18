<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
class ReportController extends Controller
{
    public function index()  {
        return view('report.index');
    }
    public function show(Request $request) {
        $request->validate([
            'dateStart' => 'required',
            'dateEnd' => 'required',
        ]);

        $dateStart = date('Y-m-d 00:00:00', strtotime($request->dateStart));
        $dateEnd = date('Y-m-d 23:59:59', strtotime($request->dateEnd));

        $salesQuery = Sale::whereBetween('updated_at', [$dateStart, $dateEnd])
                        ->where('sale_status', 'paid');

        $totalSale = $salesQuery->sum('total_price');
        $sales = $salesQuery->paginate(5);

        return view('report.showReport')
            ->with('dateStart', date('m/d/Y H:i:s', strtotime($dateStart)))
            ->with('dateEnd', date('m/d/Y H:i:s', strtotime($dateEnd)))
            ->with('totalSale', $totalSale)
            ->with('sales', $sales);
    }
    public function export()  {
        

    }
}
