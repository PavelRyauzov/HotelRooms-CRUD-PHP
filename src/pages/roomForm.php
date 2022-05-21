<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/header.php");
?>

<main class="container">
    <form action="" method="post">
        <div class="mb-3 row">
            <label for="photo" class="col-sm-2 col-form-label">Фотография</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" name="photo" id="photo">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="employee" class="col-sm-2 col-form-label text-nowrap">Ответственный сотрудник</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Disabled select example" id="employee" name="employee">
                    <option value="1">Карпов Платон Львович</option>
                    <option value="2">Поляков Сергей Дмитриевич</option>
                    <option value="3">Алексина Ольга Юрьевна</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="description" id="description">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Стоимость за сутки</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="price" id="price">
            </div>
        </div>

        <button type="button" class="btn btn-primary">Сохранить</button>
    </form>
</main>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/footer.php");
?>
