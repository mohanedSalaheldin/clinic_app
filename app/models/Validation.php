<?php

namespace App\Models;

class Validation
{

//TODO: password + phone number Validation

    public static function RequirdField($value, $fieldName)
    {
        return empty($value) ? $fieldName . " Is Required" : null;
    }
    public static function StringLen($value)
    {
        return strlen($value < 3) ? " This Must Be Mor Than 3 Characters" : null;
    }
    public static function ValidateEmail($value)
    {
        return !filter_var($value, FILTER_VALIDATE_EMAIL) ? " Must Be Email" : null;
    }
    public static function  ValidatePassword($value)
    {
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
        if (!preg_match($pattern, $value)) {
            return " The Password Must Contain Upper and Lower and Sympoles and Numbers ";
        } else return null;
    }
    public static function ValidateData($value)
    {
        return (htmlspecialchars($value)) ? " Invalid Data" : null;
    }



    public static function  RegisterValidation($name, $email, $phone, $password)
    {



        $fields = [
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "phone" => $phone

        ];
        foreach ($fields as $field => $value) {
            if ($error = self::RequirdField($value, $field)) {
                return $error;
            }
        }
        if ($error = self::StringLen($name)) {
            return $error;
        }

        if ($error = self::ValidateEmail($email)) {
            return $error;
        }

        if ($error = self::ValidatePassword($password)) {
            return $error;
        }
    }

    public static function LoginValidation($email, $password)
    {
        $fields = [
            "email" => $email,
            "password" => $password
        ];
        foreach ($fields as $field => $value) {
            if ($error = self::RequirdField($value, $field)) {
                return $error;
            }
        }
        if ($error = self::ValidateEmail($email)) {
            return $error;
        }
    }

    public static function validationStoreBlog($title, $content, $image)
    {
        $fields = [
            "title" => $title,
            "content" => $content,
            "image" => $image
        ];

        foreach ($fields as $field => $value) {


            if ($error = self::RequirdField($value, $field)) {
                return $error;
            }
        }
    }
}
