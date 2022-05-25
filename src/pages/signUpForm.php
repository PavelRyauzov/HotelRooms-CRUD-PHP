<?php
require_once ($_SERVER['DOCUMENT_ROOT']) . '/HotelCrudPHP/.core/index.php';

$errors = UserActions::signUp();

print_r($_POST);
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/HotelCrudPHP/src/templates/header.php'); ?>

<main class="container w-75">
    <form method="post" enctype="multipart/form-data">
        <h1 class="h3 mb-4 fw-normal">Регистрация</h1>
        <div class="mb-3 row">
            <label for="userFullName" class="col-sm-2 col-form-label">email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" name="userEmail"
                    <?php if (!empty($_REQUEST["userEmail"])) : ?> value=<?= htmlspecialchars($_REQUEST["userEmail"]) ?><?php endif; ?>>
                <?php if (array_key_exists("email", $errors)) : ?>
                    <label for="userEmail"
                           class="alert alert-danger container-fluid"><?= $errors['email'] ?></label>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="userFullName" class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" class="form-control form-control-lg" name="password"
                    <?php if (!empty($_REQUEST["password"])) : ?> value=<?= htmlspecialchars($_REQUEST["password"]) ?><?php endif; ?>>
                <?php if (array_key_exists("password", $errors)) : ?>
                    <label for="password"
                           class="alert alert-danger container-fluid"><?= $errors['password'] ?></label>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="userFullName" class="col-sm-2 col-form-label">Повторите пароль</label>
            <div class="col-sm-10">
                <input type="password" class="form-control form-control-lg" name="repeatPassword"
                    <?php if (!empty($_REQUEST["repeatPassword"])) : ?> value=<?= htmlspecialchars($_REQUEST["repeatPassword"]) ?><?php endif; ?>>
                <?php if (array_key_exists("repeatPassword", $errors)) : ?>
                    <label for="repeatPassword"
                           class="alert alert-danger container-fluid"><?= $errors['repeatPassword'] ?></label>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="userFullName" class="col-sm-2 col-form-label">ФИО</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" name="userFullName"
                    <?php if (!empty($_REQUEST["userFullName"])) : ?> value="<?= htmlspecialchars($_REQUEST["userFullName"]) ?><?php endif; ?>">
                <?php if (array_key_exists("fullName", $errors)) : ?>
                    <label for="userFullName"
                           class="alert alert-danger container-fluid"><?= $errors['fullName'] ?></label>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="userDateOfBirth" class="col-sm-2 col-form-label">Дата рождения</label>
            <div class="col-sm-10">
                <input type="date" class="form-control form-control-lg" name="userDateOfBirth"
                    <?php if (!empty($_REQUEST["userDateOfBirth"])) : ?> value="<?= htmlspecialchars($_REQUEST["userDateOfBirth"]) ?><?php endif; ?>">
                <?php if (array_key_exists("dateOfBirth", $errors)) : ?>
                    <label for="userDateOfBirth"
                           class="alert alert-danger container-fluid"><?= $errors['dateOfBirth'] ?></label>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="userAddress" class="col-sm-2 col-form-label">Адрес</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" name="userAddress"
                    <?php if (!empty($_REQUEST["userAddress"])) : ?> value="<?= htmlspecialchars($_REQUEST["userAddress"]) ?><?php endif; ?>">
                <?php if (array_key_exists("address", $errors)) : ?>
                    <label for="userAddress"
                           class="alert alert-danger container-fluid"><?= $errors['address'] ?></label>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="userGender" class="col-sm-2 col-form-label">Пол</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Disabled select example" name="userGender">
                    <option selected value="1">Мужской</option>
                    <option value="2">Женский</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="userInterests" class="col-sm-2 col-form-label">Интересы</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" name="userInterests"
                    <?php if (!empty($_REQUEST["userInterests"])) : ?> value="<?= htmlspecialchars($_REQUEST["userInterests"]) ?><?php endif; ?>">
                <?php if (array_key_exists("interests", $errors)) : ?>
                    <label for="userInterests"
                           class="alert alert-danger container-fluid"><?= $errors['interests'] ?></label>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="userVkLink" class="col-sm-2 col-form-label">Ссылка на профиль ВК</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" name="userVkLink"
                    <?php if (!empty($_REQUEST["userVkLink"])) : ?> value=<?= htmlspecialchars($_REQUEST["userVkLink"]) ?><?php endif; ?>>
                <?php if (array_key_exists("vkLink", $errors)) : ?>
                    <label for="userVkLink"
                           class="alert alert-danger container-fluid"><?= $errors['vkLink'] ?></label>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="userBloodType" class="col-sm-2 col-form-label">Группа крови</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Disabled select example" name="userBloodType">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="userRhesusFactor" class="col-sm-2 col-form-label">Резус фактор</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Disabled select example" name="userRhesusFactor">
                    <option selected value="1">Положительный</option>
                    <option value="2">Отрицательный</option>
                </select>
            </div>
        </div>

        <input type="hidden" name="action" value="signUp">
        <button type="submit" class="btn btn-primary w-100">Создать</button>
        <div class="container d-flex justify-content-center mt-3">
            <a class="btn-outline-dark" href="signInForm.php">Войти в существующий аккаунт</a>
        </div>
    </form>
</main>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/footer.php"); ?>

