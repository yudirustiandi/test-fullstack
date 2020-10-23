<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CarRepository;
use App\Repositories\SaleRepository;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->sale = new SaleRepository;
        $this->car = new CarRepository;
    }

    public function index()
    {
        $data['sales'] = $this->sale->getData();
        $data['title'] = 'Data Penjualan';
        
        return view('manage.sales.index', $data);
    }

    // Add and edit from the single method
    public function store($id = NULL, Request $request)
    {
        $option = is_null($id) ? 'Tambah' : 'Edit';

        if ($request->isMethod('post')) {

            if (!is_null($id)) {
                $sale = $this->sale->getData(['id' => $id]);

                if (is_null($sale)) {
                    return redirect('manage/sale')->with('failed', 'Data tidak ditemukan');
                }
            }

            if (is_null($id)) {
                $this->validate($request, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'phone' => 'required|numeric',
                    'car' => 'required',
                ]);
            }

            $params['id'] = is_null($id) ? null : $id;
            $params['name'] = $request->name;
            $params['email'] = $request->email;
            $params['phone'] = $request->phone;
            $params['car_id'] = $request->car;
            
            $this->sale->store($params);

            return redirect('manage/sale')->with('success', $option . ' penjualan berhasil');
        }

        if (!is_null($id)) {
            $data['sale'] = $this->sale->getData(['id' => $id]);

            if (is_null($data['sale'])) {
                return redirect('manage/sale')->with('failed', 'Data tidak ditemukan');
            }
        }

        $data['cars'] = $this->car->getData();
        $data['title'] = $option . ' Penjualan';

        return view('manage.sales.store', $data);
    }

    public function delete($id = null)
    {
        $sale = $this->sale->getData(['id' => $id]);
        
        if (is_null($sale)) {
            return redirect('manage/sale')->with('failed', 'Data yang dihapus tidak ditemukan');
        }

        $this->sale->delete(['id' => $sale->id]);

        return redirect('manage/sale')->with('success', 'Hapus penjualan berhasil');
    }
}
