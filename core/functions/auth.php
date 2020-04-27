<?php

///**
// * @param bool $redirect
// */
//function logout($redirect = false)
//{
//    $_SESSION = [];
//    setcookie('PHPSESSID', null, -1);
//
//    if ($redirect) {
//        header("Location: /login.php");
//    }
//}

/**
* Checks if the user is logged in with or without a changed password
* @return mixed
*/
function current_user()
{
    if (isset($_SESSION['email'])) {

        if ($logged = App\App::$db->getRowsWhere('users', $conditions =[
            'email' => $_SESSION['email'],
            'password' => $_SESSION['password']
            ]))
        {
            return reset($logged);
        }
    }
    return false;

}





