<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SaleRepository;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->sale = new SaleRepository;
    }

    public function index()
    {
        $data['sales'] = $this->sale->getData();
        $data['title'] = 'Data Penjualan';
        
        return view('manage.sales.index', $data);
    }
}
