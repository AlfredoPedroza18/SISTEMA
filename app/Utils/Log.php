<?php
namespace App\Utils;

class Log{

    private static function path(){
        return public_path().'/Log.txt';
    }
    private static function createFile(){
        $file = fopen(self::path(),"w+b");
        return $file;
    }
    public static function insert($text){
        $ip = ($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 0;
        $log = date("Y-m-d H:i:s").' [ip] '.$ip.' [text] '.$text.PHP_EOL;
        if(!file_exists(self::path())){
            $file = self::createFile();
            if(file_exists(self::path())){
                file_put_contents(self::path(),$log);
            }
            fclose($file);
        }
        else if(file_exists(self::path())){
            file_put_contents(self::path(),$log, FILE_APPEND);
        }
    }

}