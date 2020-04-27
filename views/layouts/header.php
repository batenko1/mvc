<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/template/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                    <a class="navbar-brand" href="/">My site</a>
                    <div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
                        <ul class="navbar-nav" >
                            <?php if (User::isGuest()): ?>
                            <li class="nav-item active">

                                    <a class="nav-link" href="/login">Авторизация <span class="sr-only">(current)</span></a>
                            </li>
                            <?php else: ?>
                            <li class="nav-item active">
                                    <a class="nav-link" href="/admin">Админ панель <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="/logout">Выйти <span class="sr-only">(current)</span></a>
                            </li>
                            <?php endif ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
