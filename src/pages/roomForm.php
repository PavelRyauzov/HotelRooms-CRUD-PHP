<?php
require_once($_SERVER['DOCUMENT_ROOT']) . '/HotelCrudPHP/.core/index.php';

$errors = array_merge(RoomActions::createRoom(), RoomActions::updateRoom());

$isEdit = false;

$employees = EmployeeActions::getAllEmployees();

if ($_REQUEST['action'] == 'edit') {
    $isEdit = true;
    $editableRoom = RoomActions::getRoomById($_REQUEST['id']);
}
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/HotelCrudPHP/src/templates/header.php'); ?>
<main class="container">
    <h2>Номер</h2>
    <?php if ($isEdit): ?> <h3>Запись №<?= htmlspecialchars($editableRoom['id']) ?></h3> <?php endif; ?>
    <form enctype="multipart/form-data" method="post">
        <div class="mb-3 row">
            <label for="image" class="col-sm-2 col-form-label">Фотография</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" name="image" id="image" accept="image/*"
                       value=<?php if (!empty($_POST['image'])): ?><?= htmlspecialchars($_POST['image']) ?>
                       <?php elseif ($isEdit): ?><?= '../../assets/images/rooms_images/' . htmlspecialchars($editableRoom['img_path']) ?>
                       <?php else: ?>""
                       <?php endif; ?>>
            </div>

            <?php if (array_key_exists('image_err', $errors)): ?>
                <label for="image" class="alert alert-danger container-fluid"><?= $errors['image_err'] ?></label>
            <?php endif; ?>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name"
                       value=<?php if (!empty($_POST['name'])): ?>"<?= htmlspecialchars($_POST['name']) ?>"
                       <?php elseif ($isEdit): ?>"<?= htmlspecialchars($editableRoom['name'])?>"
                       <?php else: ?>""
                       <?php endif; ?>>
            </div>

            <?php if (array_key_exists('name_err', $errors)) : ?>
                <label for="name"
                       class="alert alert-danger container-fluid"><?= $errors['name_err'] ?></label>
            <?php endif; ?>
        </div>

        <div class="mb-3 row">
            <label for="employee" class="col-sm-2 col-form-label text-nowrap">Ответственный сотрудник</label>
            <div class="col-sm-10">
                <select class="form-control" aria-label="Disabled select example" id="employee" name="employee">
                    <?php foreach ($employees as $employee): ?>
                    <option
                    <?php
                    if (!empty($_POST['employee']) && $employee['id'] == htmlspecialchars($_POST['employee'])
                        || (empty($_POST['employee']) && htmlspecialchars($_REQUEST['action']) == 'edit' && $employee['id'] == $editableRoom['employee_id'])): ?>
                        selected="selected"
                    <?php endif; ?>
                    value="<?= htmlspecialchars($employee['id']) ?>"><?= htmlspecialchars($employee['fullname']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="description" id="description"
                       value=<?php if (!empty($_POST['description'])): ?>"<?= htmlspecialchars($_POST['description']) ?>"
                       <?php elseif ($isEdit) :?>"<?= htmlspecialchars($editableRoom['description'])?>"
                       <?php else: ?>""
                       <?php endif; ?>>
            </div>

            <?php if (array_key_exists('desc_err', $errors)) : ?>
                <label for="description"
                       class="alert alert-danger container-fluid"><?= $errors['desc_err'] ?></label>
            <?php endif; ?>
        </div>

        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Стоимость за сутки</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="price" id="price"
                       value=<?php if (!empty($_POST['price'])): ?><?= htmlspecialchars($_POST['price']) ?>
                       <?php elseif ($isEdit) :?><?= htmlspecialchars($editableRoom['price'])?>
                       <?php else: ?>""
                    <?php endif; ?>>
            </div>

            <?php if (array_key_exists('price_err', $errors)) : ?>
                <label for="price"
                       class="alert alert-danger container-fluid"><?= $errors['price_err'] ?></label>
            <?php endif; ?>
        </div>

        <?php if($_REQUEST['action'] == 'create'): ?>
            <input type="hidden" name="action" value="create">
            <button type="submit" class="btn btn-primary">Создать</button>
        <?php elseif($_REQUEST['action'] == 'edit'): ?>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value=<?= $editableRoom['id'] ?>>
            <button type="submit" class="btn btn-primary">Изменить</button>
        <?php endif; ?>
    </form>
</main>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/footer.php");
?>
