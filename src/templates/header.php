<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Гостиница</title>
    <link rel="stylesheet" href="<?php echo '/HotelCrudPHP/inc/bootstrap/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo '/HotelCrudPHP/assets/css/style.css'?>">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Гостиница</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo '/HotelCrudPHP/src/pages/employeesPage.php'?>">Сотрудники гостиницы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo '/HotelCrudPHP/src/pages/roomsPage.php'?>">Номера</a>
                </li>
            </ul>
        </div>

        <div class="text-end mx-2">
            <?php if (isset($_SESSION['user_email'])) :?>
                <label><?php echo $_SESSION['user_email']?></label>
                <a class="btn-outline-dark mx-3" href="../../.core/users/user_logout.php">Выйти</a>
            <?php else : ?>
                <a type="button" class="btn btn-outline-dark me-2" href="<?php echo '/HotelCrudPHP/src/pages/signUpForm.php'?>">Зарегистрироваться</a>
                <a type="button" class="btn btn-outline-dark me-2" href="<?php echo '/HotelCrudPHP/src/pages/signInForm.php'?>">Войти</a>
            <?php endif; ?>
        </div>
    </div>
</nav>