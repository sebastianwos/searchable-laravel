<?php


namespace App\Utilities;


use App\Contracts\AuthenticateSocialUserListener;
use App\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;


class AuthenticateUser {

    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var Socialite
     */
    private $socialite;

    /**
     * @var Authenticator
     */
    private $auth;

    /**
     * @param UserRepositoryInterface $users
     * @param Socialite $socialite
     * @param Guard $auth
     */
    public function __construct(UserRepositoryInterface $users, Socialite $socialite, Guard $auth)
    {
        $this->users = $users;
        $this->socialite = $socialite;
        $this->auth = $auth;
    }

    /**
     * Performs user login with social OAuth 2.0 (FB, LinkedIn)
     * @param $driver
     * @param $hasCode
     * @param AuthenticateSocialUserListener $listener
     * @return mixed|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function execute( $driver, $hasCode, AuthenticateSocialUserListener $listener )
    {
        if(!$hasCode) return $this->getAuthorizationFirst( $driver );

        $user = $this->users->findByUsernameOrCreate($this->getUser($driver));

        $this->auth->login($user, true);

        return $listener->userHasLoggedIn($user);

    }

    /**
     * Gets authenticated user token when login for the first time
     *
     * @param $driver
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function getAuthorizationFirst( $driver )
    {
        return $this->socialite->driver($driver)->redirect();
    }

    /**
     * Gets authenticated user object
     *
     * @param $driver
     * @return \Laravel\Socialite\Contracts\User
     */
    private function getUser( $driver )
    {
        return $this->socialite->driver($driver)->user();
    }
}