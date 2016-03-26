<?php
/**
 * author: Eric.chen
 * Date: 16/2/20
 * Description:
 */

namespace App\Services\Login;


use App\Services\ServiceInterface;

abstract class LoginServiceAbstract implements ServiceInterface, LoginServiceInterface{

    protected $user;

    public function __construct(){

    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}