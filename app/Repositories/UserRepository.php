<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getData($param = [])
    {
        $user = User::latest('id');

        if (isset($param['id'])) {
            $user->where('users.id', $param['id']);
        }

        if (isset($param['email'])) {
            $user->where('users.email', $param['email']);
        }

        if (isset($param['password'])) {
            $user->where('users.password', $param['password']);
        }

        if (isset($param['id'])) {
            $res = $user->first();
        } elseif (isset($param['paginate'])) {
            $res = $user->paginate($param['paginate']);
        } else {
            $res = $user->get();
        }

        return $res;
    }
}
