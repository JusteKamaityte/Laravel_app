<?php

namespace Core;

use Core\Databases\FileDB;
use App\App;

class Session
{

    /**
     * @var
     */
    private $model;
    /**
     * @var
     */
    private $user;


    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->loginFromCookie();

    }

    /**
     *Login user from cookie
     */
    public function loginFromCookie()
    {
        if (isset($_SESSION['email'])) {
            $this->login($_SESSION['email'], $_SESSION['password']);
        }
    }

    /**
     * Login user and writes array to $this->user
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password)
    {
        $conditions = [
            'email' => $email,
            'password' => $password
        ];

        if ($this->user = App::$db->getRowWhere('users', $conditions)) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            return true;
        }
        return false;
    }

    /**
     * Get property $user
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     *Logout user
     */
    public function logout($redirect = null)
    {
        $_SESSION = [];
        setcookie('PHPSESSID', null, -1);
        session_destroy();

        if ($redirect) {
            header("Location: $redirect");
        }
    }

}



