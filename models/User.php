<?php

class User
{

    public static function checkUserData($login, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE login = :login AND password = :password';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login);
        $result->bindParam(':password', $password);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $user = $result->fetch();


        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }
        return false;

    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /login");
    }

}
