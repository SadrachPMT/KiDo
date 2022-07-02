<?php
namespace App\Libraries;

class Hash
{
    public static function make($contraseña)
    {
        return password_hash($contraseña, PASSWORD_BCRYPT);
    }
    
    public static function check($contraseña_ingresada, $contraseña_bd){
        if(password_verify($contraseña_ingresada, $contraseña_bd)){
            return true;
        }else{
            return false;
        }
    }
}


?>