<?php
/**
 * Created by PhpStorm.
 * User: JS-BOG
 * Date: 2016-10-08
 * Time: 23:05
 */
namespace App\Contracts;

interface UserRepositoryInterface {
    public function findByUsernameOrCreate($userData);
}