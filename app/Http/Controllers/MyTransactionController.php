<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\PaginationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MyTransactionController extends Controller
{
    public function index()
    {
        $paidTransactionTotal = Transaction::query()
            ->where('user_id', Auth::id())
            ->where('status', Transaction::STATUS_PAID)
            ->sum('total');
        $query = Transaction::with(['campaign'])->where('user_id', Auth::id());

        $transactions = PaginationService::make($query)->build();

        $chartData = Transaction::query()
            ->select([
                DB::raw('SUM(total) as total'),
                DB::raw('MONTH(created_at) as month'),
            ])
            ->where('user_id', Auth::id())
            ->where('status', Transaction::STATUS_PAID)
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->month => $item->total];
            });

        return view('my-transactions.index', [
            'paidTransactionTotal' => $paidTransactionTotal,
            'transactions' => $transactions,
            'chartData' => $chartData,
        ]);
    }
}