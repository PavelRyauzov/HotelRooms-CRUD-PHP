<?php
require_once ($_SERVER['DOCUMENT_ROOT']) . '/HotelCrudPHP/.core/index.php';

$employees = EmployeeActions::getAllEmployees();

$errors = EmployeeActions::deleteEmployee();

?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/HotelCrudPHP/src/templates/header.php'); ?>
<main class="container">
    <h2>Cотрудники гостиницы</h2>
    <a class="btn btn-primary float-end" role="button" data-bs-toggle="button"
       href="employeeForm.php?action=create">
        Создать
    </a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ФИО</th>
            <th scope="col">email</th>
            <th scope="col">Номер телефона</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <?php if (count($employees) > 0): ?>
            <?php foreach ($employees as $employee): ?>
                <tbody>
                <tr>
                    <th scope="row"><?= htmlspecialchars($employee['id']) ?></th>
                    <td><?= htmlspecialchars($employee['fullname']) ?></td>
                    <td><?= htmlspecialchars($employee['email']) ?></td>
                    <td><?= htmlspecialchars($employee['phone_number']) ?></td>
                    <td class="text-nowrap">
                        <form method="post">
                            <a class="btn btn-primary" role="button" data-bs-toggle="button"
                               href=<?= 'employeeForm.php?action=edit&id=' . htmlspecialchars($employee['id']) ?>>
                                Изменить
                            </a>
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value=<?= htmlspecialchars($employee['id']) ?>>
                            <button type="submit" name="delete" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
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
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/HotelCrudPHP/src/templates/footer.php'); ?>
