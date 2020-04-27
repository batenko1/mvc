<?php


class SiteController
{

    public function actionIndex($page = 1)
    {

        $jobs = Job::getList($page, 3, $_REQUEST);

        $total = Job::getTotalJobs();
        $pagination = new Pagination($total, $page , 3, 'page-');

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionCreate() {

        $name = false;
        $email = false;
        $text = false;

        if (isset($_POST['submit'])) {



            $name = $_POST['name'];
            $email = $_POST['email'];
            $text = $_POST['text'];


            $errors = false;

            if (!Validator::checkTextField($name, 2)) {
                $errors[] = 'Слишком короткое имя';
                die('tut');
            }

            if (!Validator::checkEmail($email)) {
                $errors[] = 'Неккоректный email';
            }

            if (!Validator::checkTextField($text, 10)) {
                $errors[] = 'Слишком короткий текст задачи';
            }



            if($errors == false) {
                Job::create($_POST);
                header("Location: /");

            }


        }

        require_once(ROOT . '/views/site/create.php');
        return true;

    }


}
