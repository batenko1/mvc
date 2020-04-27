<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <a href="/create" class="btn btn-primary mt-4 mb-4">Создать задачу</a>

                <div class="dropdown mb-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Сортировка
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?php echo $page == 1 ? '' : '/page-'.$page ?>?order=name&type=asc">По возрастанию имени</a>
                        <a class="dropdown-item" href="<?php echo $page == 1 ? '' : '/page-'.$page ?>?order=name&type=desc">По убыванию имени</a>
                    </div>
                </div>

                <table class="table" style="text-align: center">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя пользователя</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Текст задачи</th>
                        <th>Статус</th>
                        <th>Отредактировано администратором?</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($jobs as $job): ?>
                        <tr>
                            <th scope="row"><?php echo $job['id'] ?></th>
                            <td><?php echo $job['name'] ?></td>
                            <td><?php echo $job['email'] ?></td>
                            <td><?php echo $job['text'] ?></td>
                            <td><?php echo $job['status'] ? 'Выполнено' : 'Не выполнено'; ?></td>
                            <td><?php echo $job['is_edit'] == 1 ? 'Да' : 'Нет' ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <?php echo $pagination->get(); ?>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
