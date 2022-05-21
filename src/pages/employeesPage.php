<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/header.php");
?>

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
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Карпов Платон Львович</td>
            <td>karpov@gmail.com</td>
            <td>79888233463</td>
            <td class="text-nowrap">
                <a href="employeeForm.php" class="btn btn-primary" role="button" data-bs-toggle="button">Изменить</a>
                <button type="button" class="btn btn-danger">Удалить</button>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Поляков Сергей Дмитриевич</td>
            <td>polyakov@mail.ru</td>
            <td>79278223413</td>
            <td class="text-nowrap">
                <a href="employeeForm.php" class="btn btn-primary" role="button" data-bs-toggle="button">Изменить</a>
                <button type="button" class="btn btn-danger">Удалить</button>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Алексина Ольга Юрьевна</td>
            <td>alexina@list.ru</td>
            <td>79035558866</td>
            <td class="text-nowrap">
                <a href="employeeForm.php" class="btn btn-primary" role="button" data-bs-toggle="button">Изменить</a>
                <button type="button" class="btn btn-danger">Удалить</button>
            </td>
        </tr>
        </tbody>
    </table>
</main>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/footer.php");
?>
