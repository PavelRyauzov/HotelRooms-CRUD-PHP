<?php

class RoomLogic
{
    public static function createRoom(string $imgPath, string $name, int $employeeId, string $desc, string $price): array
    {
        $errors = [];

        if (empty($imgPath)) {
            $errors['image_err'] = "Не выбрано изображение";
        }

        if(empty($name)) {
            $errors['name_err'] = "Не указано название номера";
        }

        if(empty($employeeId) && $employeeId != '0') {
            $errors['employee_id_err'] = "Не указан ответственный сотрудник";
        }

        if(empty($desc)) {
            $errors['desc_err'] = "Не указано описание номера";
        }

        if(empty($price)) {
            $errors['price_err'] = "Не указана стоимость номера";
        }

        if(empty($errors)) {
            RoomTable::create($imgPath, $name, $employeeId, $desc, $price);
        }

        return $errors;
    }

    public static function updateRoom(int $id, string $imgPath, string $name, int $employeeId, string $desc, string $price): array
    {
        $errors = [];

        if (empty($imgPath)) {
            $errors['image_err'] = "Не выбрано изображение";
        }

        if(empty($name)) {
            $errors['name_err'] = "Не указано название номера";
        }

        if(empty($employeeId) && $employeeId != '0') {
            $errors['employee_id_err'] = "Не указан ответственный сотрудник";
        }

        if(empty($desc)) {
            $errors['desc_err'] = "Не указано описание номера";
        }

        if(empty($price)) {
            $errors['price_err'] = "Не указана стоимость номера";
        }

        if(empty($errors)) {
            RoomTable::update($id, $imgPath, $name, $employeeId, $desc, $price);
        }

        return $errors;
    }

    public static function deleteRoom(int $id): array
    {
        $errors = [];

        RoomTable::delete($id);

        return $errors;
    }

    public static function getAllRooms(): array
    {
        return RoomTable::getAll();
    }

    public static function getRoomById(int $id): array
    {
        return RoomTable::getById($id);
    }
}