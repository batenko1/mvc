<?php


class LoginController {

    public function actionIndex() {
        $login = false;
        $password = false;


//        $user = User::isGuest();
//        if(!$user) {
//            header("Location: /admin");
//        }

        if (isset($_POST['submit'])) {

            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            if (!Validator::checkTextField($login, 3)) {
                $errors[] = 'Неправильный логин';
            }
            if (!Validator::checkPassword($password, 3)) {
                $errors[] = 'Пароль не должен быть короче 3-x символов';
            }

            $userId = User::checkUserData($login, $password);

            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            }
            else {
                User::auth($userId);
                header("Location: /admin");
            }

        }

        require_once(ROOT . '/views/auth/login.php');
        return true;

    }

    public function actionLogout() {

        unset($_SESSION["user"]);
        header("Location: /login");

    }

}
