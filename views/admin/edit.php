<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="offset-md-3 col-md-6 pt-4">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <?php foreach ($errors as $error): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>


                <form method="post" action="/admin/edit/<?php echo $job['id'] ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $job['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="<?php echo $job['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Текст задачи</label>
                        <textarea name="text" class="form-control" id="exampleInputPassword1"><?php echo $job['text']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="status" <?php if($job['status']): ?> checked <?php endif; ?> value="1">
                        <label for="exampleInputPassword1">Статус выполнено</label>
                    </div>



                    <button type="submit" name="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>
