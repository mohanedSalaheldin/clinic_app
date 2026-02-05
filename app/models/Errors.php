<?php

namespace App\models;

class Errors
{


    public static function SetMessage($message, $type): void
    {
        $_SESSION["message"] = [
            "type" => $type,
            "message" => $message
        ];
    }

    public static function GetMessage()
    {
        if (isset($_SESSION["message"])) {
            $type =  $_SESSION["message"]["type"];
            $message = $_SESSION["message"]["message"];

            echo "<div class = 'alert alert-$type'>$message</div>";
            unset($_SESSION["message"]);
        }
    }
}
