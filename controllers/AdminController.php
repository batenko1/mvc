<?php

class AdminController extends AdminBase {

    public function actionIndex($page = 1) {

        self::checkAdmin();
        $jobs = Job::getList($page, 3);

        $total = Job::getTotalJobs();
        $pagination = new Pagination($total, $page , 3, 'page-');

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
            $options['status'] = isset($_POST['status']) ? 1 : 0;
            $options['is_edit'] = 1;

            Job::update($id, $options);
            header("Location: /admin?update=1");


        }

        require_once(ROOT . '/views/admin/edit.php');
        return true;
    }

}

