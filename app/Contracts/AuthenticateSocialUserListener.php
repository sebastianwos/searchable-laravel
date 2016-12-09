<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-05-31
 * Time: 12:59
 */
namespace App\Contracts;


/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
interface AuthenticateSocialUserListener {

    /**
     * Redirects user after successful log in
     * @param $user
     * @return mixed
     */
    public function userHasLoggedIn($user);
}