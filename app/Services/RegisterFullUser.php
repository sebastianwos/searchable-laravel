<?php namespace App\Services;

use App\Contracts\UserRegistrator;
use App\User;
use App\Utilities\Curl;
use Illuminate\Support\Facades\Validator;

class RegisterFullUser implements UserRegistrator  {

    /**
     * @var Curl
     */
    private $curl;

    /**
     * RegisterNormalUser constructor.
     */
    public function __construct()
    {
        $this->curl = new Curl();
    }

    public function validator($request)
    {
        $validator = Validator::make($request->all(), [
//            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        return $validator->after(function($validator) use ($request) {
            $response = json_decode($this->curl->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'    => config('services.recaptcha.secret'),
                'response'  => $request->input('g-recaptcha-response'),
                'remoteip'  => $request->ip()
            ]));
            if( !$response->success ){
                $validator->errors()->add('captcha', 'Captcha field is not valid');
            }
        });
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