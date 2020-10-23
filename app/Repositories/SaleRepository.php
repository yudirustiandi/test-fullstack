<?php

namespace App\Repositories;

use App\Models\Sale;

class SaleRepository
{
    public function getData($param = [])
    {
        $sale = Sale::latest('id');

        if (isset($param['id'])) {
            $sale->where('sales.id', $param['id']);
        }

        if (isset($param['id'])) {
            $res = $sale->first();
        } elseif (isset($param['paginate'])) {
            $res = $sale->paginate($param['paginate']);
        } else {
            $res = $sale->get();
        }

        return $res;
    }

    // Add and edit from the single method
    public function store($param = [])
    {
        if (isset($param['id'])) {
            $sale = Sale::find($param['id']);
        } else {
            $sale = new Sale;
        }
        
        if (isset($param['name'])) {
            $sale->name = $param['name'];
        }

        if (isset($param['email'])) {
            $sale->email = $param['email'];
        }

        if (isset($param['phone'])) {
            $sale->phone = $param['phone'];
        }

        if (isset($param['car_id'])) {
            $sale->car_id = $param['car_id'];
        }

        $sale->save();
        return $sale->id;
    }

    public function delete($param = [])
    {
        if (isset($param['id'])) {
            $sale = Sale::where('id', $param['id']);
            return $sale->delete();
        }
    }
}