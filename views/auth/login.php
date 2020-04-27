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


                <form method="post" action="/login">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Логин</label>
                        <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=trim($login); ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
