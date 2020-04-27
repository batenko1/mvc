<?php


class Validator {

    public static function checkTextField($textField, $counter)
    {
        if (strlen($textField) >= $counter) {
            return true;
        }
        return false;
    }


    public static function checkPassword($password)
    {
        if (strlen($password) >= 3) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }



}
