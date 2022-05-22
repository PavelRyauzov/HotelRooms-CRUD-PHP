<?php
require_once($_SERVER['DOCUMENT_ROOT']) . '/HotelCrudPHP/.core/index.php';

$employees = EmployeeActions::getAllEmployees();
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/HotelCrudPHP/src/templates/header.php'); ?>
<main class="container">
    <a href="employeeForm.php" class="btn btn-primary float-end" role="button" data-bs-toggle="button">Создать</a>

    <table class="table">
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
            <th scope="row"><?php echo $employee['id'] ?></th>
            <td><?php echo $employee['fullname'] ?></td>
            <td><?php echo $employee['email'] ?></td>
            <td><?php echo $employee['phone_number'] ?></td>
            <td class="text-nowrap">
                <a href="employeeForm.php" class="btn btn-primary" role="button" data-bs-toggle="button">Изменить</a>
                <button type="button" class="btn btn-danger">Удалить</button>
            </td>
        </tr>
        </tbody>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/HotelCrudPHP/src/templates/footer.php'); ?>
