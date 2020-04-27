<?php

class AdminController extends AdminBase {

    public function actionIndex() {

        self::checkAdmin();
        $jobs = Job::getList($page = 1, 3);

        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

    public function actionDelete($id) {
        self::checkAdmin();

        Job::deleteById($id);
        header("Location: /admin?remove=1");
    }

    public function actionEdit($id) {
        self::checkAdmin();


        $job = Job::getById($id);


        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['text'] = $_POST['text'];
            $options['status'] = $_POST['status'];
            $options['is_edit'] = 1;

            Job::update($id, $options);
            Job::deleteById($id);
            header("Location: /admin?update=1");


        }

        require_once(ROOT . '/views/admin/edit.php');
        return true;
    }

}

