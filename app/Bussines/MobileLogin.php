<?php

namespace App\Bussines;

use App\Exceptions\APIException;
use App\MasterConsultasSQL;
use App\MobileSessions;
use Exception;
use Illuminate\Support\Facades\DB;

class MobileLogin
{

    private static function genSessionToken($name_length = 25)
    {
        $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        return substr(str_shuffle(str_repeat($alpha_numeric, $name_length)), 0, $name_length);
    }

    private static function closeAllUserSession($userID)
    {
        //close the another openned sessions
        MobileSessions::where("user_id", $userID)->where("is_valid", 1)->update(["is_valid" => 0]);
    }

    private static function createNewSessionToken($userID, $deviceType, $deviceId)
    {
        MobileLogin::closeAllUserSession($userID);

        //Generate new token session
        $token = MobileLogin::genSessionToken();

        //create the new session
        $nsession = new MobileSessions;
        $nsession->user_id = $userID;
        $nsession->session_token = $token;
        $nsession->is_valid = 1;
        $nsession->device_type = $deviceType;
        $nsession->device_id = $deviceId;
        $nsession->save();

        //Return the generated token
        return $token;
    }

    private static function checkSessionToken($userID, $token, $devId, $devType)
    {
        $session = MasterConsultas::exeSQL("mob_session_valid_time", "READONLY",
            array(
                "session_token" => $token,
                "user_id" => $userID,
                "device_type" => $devType,
                "device_id" => $devId
            )
        );

        $token_lifetime = 1800; //Seconds

        if ($session != null && count($session) == 1 && $session[0]->validSince <= $token_lifetime) {

            # Si a la sesión le quedan menos de 5 minutos de vida, wq revivirla
            if($token_lifetime - $session[0]->validSince  <= 300)
            {
                MasterConsultas::exeSQLStatement("mob_session_increase_lifetime", "UPDATE",
                    array(
                        "session_token" => $token,
                        "user_id" => $userID,
                        "device_type" => $devType,
                        "device_id" => $devId
                    )
                );
            }
            return true;
        } else {
            return false;
        }
    }

    private static function validateUser($userID, $password)
    {
        //check the password
        $users = MasterConsultas::exeSQL("mob_val_pwd2", "READONLY",
            array(
                "username" => $userID,
                "inputpwd" => $password)
        );

        if ($users != null && count($users) == 1 && $users[0]->valid == 1) {
            return array(
                "valido" => true,
                "idPersonal" => $users[0]->IdPersonal,
                "nick_name" => $users[0]->nick_name,
                "email" => $users[0]->email);
        } else {
            throw new APIException("Datos de acceso incorrectos");
        }
        //return DB::select( DB::raw( $sql_data));
    }

    public static function Login($userID, $password, $deviceType, $deviceId)
    {
        $valida = MobileLogin::validateUser($userID, $password);
        if ($valida["valido"] == true) {
            $session["token"] =  MobileLogin::createNewSessionToken($userID, $deviceType, $deviceId);
            $session["valido"] = true;
            $session["idPersonal"] = $valida["idPersonal"];
            $session["nick_name"] = $valida["nick_name"];
            $session["email"] = $valida["email"];
            return $session;
        }
    }

    public static function Logout($userID)
    {
        MobileLogin::closeAllUserSession($userID);
    }

    public static function IsAuthenticatedAPI($userId, $token, $devId, $devType){
            return MobileLogin::checkSessionToken($userId, $token, $devId, $devType);
    }
}
