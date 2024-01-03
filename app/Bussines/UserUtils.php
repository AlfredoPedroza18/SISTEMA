<?php

namespace App\Bussines;

use App\Exceptions\APIException;
use App\MasterConsultasSQL;
use App\MobileSessions;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Bussines\MasterConsultas;

class UserUtils
{

    public static function changeMobilePassword($userID, $password, $nuevopassword)
    {
        //check the password
        $users = MasterConsultas::exeSQL("mob_val_pwd2", "READONLY",
            array(
                "username" => $userID,
                "inputpwd" => $password)
        );

        if ($users != null && count($users) == 1 && $users[0]->valid == 1) {
            # Actualizar el password si es correcto
            $users = MasterConsultas::exeSQLStatement("mob_udp_pwd_by_username", "UPDATE",
                array(
                    "newpasswd" => $nuevopassword,
                    "id" => $userID)
            );

            return array(
                "valido" => true,
                "msg" => "Actualizado");
        } else {
            return array(
                "valido" => false,
                "msg" => "Password Inválido.");
        }


    }

    public static function changePhoto($userID, $photoBase64)
    {
        # Actualizar el password si es correcto
        $users = MasterConsultas::exeSQLStatement("mob_change_picture", "UPDATE",
            array(
                "Photo" => $photoBase64,
                "username" => $userID)
        );

        return array(
            "valido" => true,
            "msg" => "Actualizado");

    }
}
