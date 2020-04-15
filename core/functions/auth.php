<?php
require 'bootloader.php';

/**
 * @param bool $redirect
 */
function logout($redirect = false){
    $_SESSION = [];
    setcookie('PHPSESSID', null, -1);

    if($redirect){
        header("Location: /login.php");
    }
}

function is_logged_in(){

    $users = file_to_array(USER) ?: [];
    if(isset($_SESSION['email'])){
        foreach($users as $user){
            if ($_SESSION['email'] == $user['email']){
                if($_SESSION['password'] == $user['password']){
                    return true;
                }else{
                    logout(false);
                }
            }
        }
    }
    return false;
}


