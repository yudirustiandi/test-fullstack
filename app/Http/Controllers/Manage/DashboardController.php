<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        
        return view('manage.dashboard', $data);
    }
}
