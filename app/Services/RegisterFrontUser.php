<?php namespace App\Services;

use App\Contracts\UserRegistrator;
use App\User;
use App\Utilities\Curl;
use Illuminate\Support\Facades\Validator;

class RegisterFrontUser implements UserRegistrator {

    public function validator($request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function create($data)
    {
        return User::create([
            'name' => '',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}