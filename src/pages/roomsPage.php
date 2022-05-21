<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/header.php");
?>

<main class="container">
    <a href="roomForm.php" class="btn btn-primary float-end" role="button" data-bs-toggle="button">Создать</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Фотография</th>
            <th scope="col">Название</th>
            <th scope="col">Ответственный сотрудник</th>
            <th scope="col">Описание</th>
            <th scope="col">Стоимость за сутки</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td><img src="../../assets/images/rooms_images/room1.jpeg" alt=""></td>
            <td>Люкс-1</td>
            <td>Карпов Платон Львович</td>
            <td>Отличный выбор</td>
            <td>10000</td>
            <td class="text-nowrap">
                <a href="roomForm.php" class="btn btn-primary" role="button" data-bs-toggle="button">Изменить</a>
                <button type="button" class="btn btn-danger">Удалить</button>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td><img src="../../assets/images/rooms_images/room2.jpeg" alt=""></td>
            <td>Комфорт-312</td>
            <td>Поляков Сергей Дмитриевич</td>
            <td>Хороший номер для любителей минимализма</td>
            <td>3000</td>
            <td class="text-nowrap">
                <a href="roomForm.php" class="btn btn-primary" role="button" data-bs-toggle="button">Изменить</a>
                <button type="button" class="btn btn-danger">Удалить</button>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td><img src="../../assets/images/rooms_images/room3.jpeg" alt=""></td>
            <td>Эконом-111</td>
            <td>Алексина Ольга Юрьевна</td>
            <td>Небольшой номер для одного человека</td>
            <td>1000</td>
            <td class="text-nowrap">
                <a href="roomForm.php" class="btn btn-primary" role="button" data-bs-toggle="button">Изменить</a>
                <button type="button" class="btn btn-danger">Удалить</button>
            </td>
        </tr>
        </tbody>
    </table>
</main>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/footer.php");
?>
