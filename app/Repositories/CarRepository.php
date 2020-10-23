<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository
{
    public function getData($param = [])
    {
        $car = Car::latest('id');

        if (isset($param['id'])) {
            $car->where('cars.id', $param['id']);
        }

        if (isset($param['id'])) {
            $res = $car->first();
        } elseif (isset($param['paginate'])) {
            $res = $car->paginate($param['paginate']);
        } else {
            $res = $car->get();
        }

        return $res;
    }

    // Add and edit from the single method
    public function store($param = [])
    {
        if (isset($param['id'])) {
            $car = Car::find($param['id']);
        } else {
            $car = new Car;
        }
        
        if (isset($param['name'])) {
            $car->name = $param['name'];
        }

        if (isset($param['price'])) {
            $car->price = $param['price'];
        }

        if (isset($param['stock'])) {
            $car->stock = $param['stock'];
        }

        $car->save();
        return $car->id;
    }

    public function delete($param = [])
    {
        if (isset($param['id'])) {
            $car = Car::where('id', $param['id']);
            return $car->delete();
        }
    }
}