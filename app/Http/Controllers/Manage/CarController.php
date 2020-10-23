<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CarRepository;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->car = new CarRepository;
    }

    public function index()
    {
        $data['cars'] = $this->car->getData();
        $data['title'] = 'Data Mobil';

        return view('manage.cars.index', $data);
    }

    // Add and edit from the single method
    public function store($id = NULL, Request $request)
    {
        $option = is_null($id) ? 'Tambah' : 'Edit';

        if ($request->isMethod('post')) {

            if (!is_null($id)) {
                $car = $this->car->getData(['id' => $id]);

                if (is_null($car)) {
                    return redirect('manage/car')->with('failed', 'Data tidak ditemukan');
                }
            }

            if (is_null($id)) {
                $this->validate($request, [
                    'name' => 'required|max:255',
                    'price' => 'required|numeric',
                    'stock' => 'required|numeric'
                ]);
            }

            $params['id'] = is_null($id) ? null : $id;
            $params['name'] = $request->name;
            $params['price'] = $request->price;
            $params['stock'] = $request->stock;
            
            $this->car->store($params);

            return redirect('manage/car')->with('success', $option . ' mobil berhasil');
        }

        if (!is_null($id)) {
            $data['car'] = $this->car->getData(['id' => $id]);

            if (is_null($data['car'])) {
                return redirect('manage/car')->with('failed', 'Data tidak ditemukan');
            }
        }

        $data['title'] = $option . ' Mobil';

        return view('manage.cars.store', $data);
    }

    public function delete($id = null)
    {
        $car = $this->car->getData(['id' => $id]);
        
        if (is_null($car)) {
            return redirect('manage/car')->with('failed', 'Data yang dihapus tidak ditemukan');
        }

        $this->car->delete(['id' => $car->id]);

        return redirect('manage/car')->with('success', 'Hapus mobil berhasil');
    }
}
