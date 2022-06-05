<?php
require_once ($_SERVER['DOCUMENT_ROOT']) . '/HotelCrudPHP/.core/index.php';

$errors = UserActions::signIn();
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/HotelCrudPHP/src/templates/header.php'); ?>
<body class="d-flex flex-column min-vh-100">
<div class="d-flex justify-content-center align-items-center container mt-5">
    <main class="form-sign-in mt-5">
        <form method="post" class="rounded mt-5" enctype="multipart/form-data" style="width: 40vw">
            <h1 class="h3 mb-4 fw-normal">Авторизация</h1>
            <div class="mb-3">
                <input type="text" class="form-control form-control-lg" name="userEmail" placeholder="email"
                    <?php if (!empty($_REQUEST["userEmail"])) :?> value=<?=htmlspecialchars($_REQUEST["userEmail"])?> <?php endif;?> >
                <?php if (array_key_exists("email", $errors)) : ?>
                    <label for="userEmail"
                           class="alert alert-danger container-fluid"><?= $errors['email'] ?></label>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Пароль"
                    <?php if (!empty($_REQUEST["password"])) :?> value=<?=htmlspecialchars($_REQUEST["password"])?> <?php endif;?>>
                <?php if (array_key_exists("password", $errors)) : ?>
                    <label for="password"
                           class="alert alert-danger container-fluid"><?= $errors['password'] ?></label>
                <?php endif; ?>
            </div>

            <input type="hidden" name="action" value="log-in">
            <button class="w-100 btn btn-primary" type="submit">Войти </button>
            <div class="container d-flex justify-content-center mt-3">
                <a class="btn-outline-dark" href="signUpForm.php">Зарегистрировать новый аккаунт</a>
            </div>
        </form>
    </main>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/footer.php"); ?>
</body>