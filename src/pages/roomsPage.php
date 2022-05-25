<?php
require_once ($_SERVER['DOCUMENT_ROOT']) . '/HotelCrudPHP/.core/index.php';

$rooms = RoomActions::getAllRooms();

$errors = RoomActions::deleteRoom();

?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/HotelCrudPHP/src/templates/header.php'); ?>
<main class="container">
    <h2>Номера гостиницы</h2>
    <?php if (isset($_SESSION['user_email'])) :?>
        <a href="roomForm.php?action=create" class="btn btn-primary float-end" role="button" data-bs-toggle="button">Создать</a>
    <?php endif;?>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Фотография</th>
            <th scope="col">Название</th>
            <th scope="col">Ответственный сотрудник</th>
            <th scope="col">Описание</th>
            <th scope="col">Стоимость за сутки</th>
            <?php if (isset($_SESSION['user_email'])) :?>
                <th scope="col">Действие</th>
            <?php endif;?>
        </tr>
        </thead>
        <?php if (count($rooms) > 0): ?>
            <?php foreach ($rooms as $room): ?>
                <tbody>
                <tr>
                    <th scope="row"><?= htmlspecialchars($room['id']) ?></th>
                    <td><img src=<?= '../../assets/images/rooms_images/' . htmlspecialchars($room['img_path']) ?>></td>
                    <td><?= htmlspecialchars($room['name']) ?></td>
                    <td><?= htmlspecialchars($room['employee_name']) ?></td>
                    <td><?= htmlspecialchars($room['description']) ?></td>
                    <td><?= htmlspecialchars($room['price']) ?></td>
                    <?php if (isset($_SESSION['user_email'])) :?>
                    <td class="text-nowrap">
                        <form method="post">
                            <a class="btn btn-primary" role="button" data-bs-toggle="button"
                               href=<?= 'roomForm.php?action=edit&id=' . htmlspecialchars($room['id']) ?>>
                                Изменить
                            </a>
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value=<?= htmlspecialchars($room['id']) ?>>
                            <button type="submit" name="delete" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                    <?php endif;?>
                </tr>
                </tbody>
                <?php if (array_key_exists('delete_err', $errors)) : ?>
                    <label for="delete" class="alert alert-danger container-fluid">
                        <?= $errors['delete_err'] ?>
                    </label>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</main>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/footer.php"); ?>
