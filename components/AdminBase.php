<?php

abstract class AdminBase
{

    /**
     * Метод, который проверяет пользователя на то, является ли он администратором
     * @return boolean
     */
    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        if ($userId) {
            return true;
        }


        die('Доступ закрыт');
    }

}
