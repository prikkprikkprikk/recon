<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\TransactionsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function import() {
        Excel::import( new TransactionsImport, Storage::path('transactionExport.xls') );
    }

    public function index() {
        return view('transactions.index', [ 'transactions' => Transaction::all() ]);
    }
}
