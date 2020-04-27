<?php include ROOT . '/views/layouts/header.php'; ?>


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4">

                <?php if(isset($_REQUEST['remove'])): ?>

                    <div class="alert alert-success mt-4" role="alert">
                        Задача успешно удалена
                    </div>

                <?php endif; ?>

                <?php if(isset($_REQUEST['update'])): ?>

                    <div class="alert alert-success mt-4" role="alert">
                        Задача успешно обновлена
                    </div>

                <?php endif; ?>

                <table class="table" style="text-align: center;">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя пользователя</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Текст задачи</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Отредактировано администратором?</th>
                        <th scope="col">Редактировать</th>
                        <th scope="col">Удалить</th>
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
                            <td><?php echo $job['is_edit'] ? 'Да' : 'Нет' ?></td>
                            <td><a class="btn btn-primary" href="/admin/edit/<?php echo $job['id'] ?>">Редактировать</a></td>
                            <td><a class="btn btn-danger" href="/admin/delete/<?php echo $job['id'] ?>">Удалить</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



<?php include ROOT . '/views/layouts/footer.php'; ?>
