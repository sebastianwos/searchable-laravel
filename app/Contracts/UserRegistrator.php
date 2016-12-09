<?php
/**
 * Created by PhpStorm.
 * User: JS-BOG
 * Date: 2016-11-12
 * Time: 19:08
 */
namespace App\Contracts;

interface UserRegistrator {

    public function validator($request);
    public function create($data);

}