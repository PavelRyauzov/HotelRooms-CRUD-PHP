<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/header.php");
?>

    <main class="container">
        <form action="" method="post">
            <div class="container">
                <div class="mb-3 row">
                    <label for="fullname" class="col-sm-2 col-form-label">ФИО</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fullname" id="fullname">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="phoneNumber" class="col-sm-2 col-form-label">Номер телефона</label>
                    <div class="col-sm-10">
                        <input type="tel" pattern="\+7\-[0-9]{3}\-[0-9]{3}\-[0-9]{2}\-[0-9]{2}" class="form-control"
                               name="phoneNumber" id="phoneNumber">
                    </div>
                </div>

                <button type="button" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </main>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/HotelCrudPHP/src/templates/footer.php");
?>