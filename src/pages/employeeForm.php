<?php
require_once($_SERVER['DOCUMENT_ROOT']) . '/HotelCrudPHP/.core/index.php';

$errors = array_merge(EmployeeActions::createEmployee(), EmployeeActions::updateEmployee());

$isEdit = false;

if ($_REQUEST['action'] == 'edit') {
    $isEdit = true;
    $editableEmployee = EmployeeActions::getEmployeeById($_REQUEST['id']);
}
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/HotelCrudPHP/src/templates/header.php'); ?>
    <main class="container">
        <form action="" method="post">
            <div class="container">
                <div class="mb-3 row">
                    <label for="fullname" class="col-sm-2 col-form-label">ФИО</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fullname" id="fullname"
                               value=<?php if (!empty($_POST['fullname'])): ?> "<?= htmlspecialchars($_POST['fullname']) ?>"
                               <?php elseif ($isEdit): ?> "<?= htmlspecialchars($editableEmployee['fullname']) ?>"
                               <?php else: ?>""
                               <?php endif; ?>>
                    </div>
                    <?php if (array_key_exists("fullname_err", $errors)): ?>
                        <label for="fullname" class="alert alert-danger container-fluid">
                            <?= $errors['fullname_err'] ?>
                        </label>
                    <?php endif; ?>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" id="email"
                               value=<?php if(!empty($_POST['email'])): ?><?= htmlspecialchars($_POST['email']) ?>
                               <?php elseif ($isEdit): ?><?= htmlspecialchars($editableEmployee['email']) ?>
                               <?php else: ?><?= "" ?>
                               <?php endif; ?>>
                    </div>
                    <?php if (array_key_exists('email_err', $errors)): ?>
                        <label for="email" class="alert alert-danger container-fluid">
                            <?= $errors['email_err'] ?>
                        </label>
                    <?php endif; ?>
                </div>

                <div class="mb-3 row">
                    <label for="phoneNumber" class="col-sm-2 col-form-label">Номер телефона</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber"
                               value=<?php if(!empty($_POST['phoneNumber'])): ?><?= htmlspecialchars($_POST['phoneNumber']) ?>
                               <?php elseif ($isEdit): ?><?= htmlspecialchars($editableEmployee['phone_number']) ?>
                               <?php else: ?><?= ""; ?>
                               <?php endif; ?>>
                    </div>
                    <?php if (array_key_exists('phone_number_err', $errors)): ?>
                        <label for="email" class="alert alert-danger container-fluid">
                            <?= $errors['phone_number_err'] ?>
                        </label>
                    <?php endif; ?>
                </div>

                <?php if($_REQUEST['action'] == 'create'): ?>
                    <input type="hidden" name="action" value="create">
                    <button type="submit" class="btn btn-primary">Создать</button>
                <?php elseif($_REQUEST['action'] == 'edit'): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value=<?= $editableEmployee['id'] ?>>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                <?php endif; ?>

            </div>
        </form>
    </main>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/HotelCrudPHP/src/templates/footer.php'); ?>