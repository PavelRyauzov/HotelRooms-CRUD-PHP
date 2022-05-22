<?php

class RoomActions
{
    private static function imgDir(): string {
        return $_SERVER['DOCUMENT_ROOT'] . '/assets/rooms_images/';
    }

    public static function createRoom(): array
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST') {
            return [];
        }

        if($_POST['action'] != 'create') {
            return [];
        }

        $image = "";
        if (!empty(basename($_FILES['image']['name']))) {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], self::imgDir().basename($_FILES['image']['name']))) {

            }
            $image = self::imgDir().basename($_FILES['image']['name']);
        }

        $name = $_POST['name'];
        $employeeId = $_POST['employee'];
        $desc = $_POST['description'];
        $price = $_POST['price'];

        $errors = RoomLogic::createRoom($image, $name, $employeeId, $desc, $price);

        if(count($errors) == 0){
            header("Location: roomsPage.php");
            die();
        }
        else {
            return $errors;
        }
    }

    public static function updateRoom(): array
    {
        if($_SERVER['REQUEST_METHOD'] != 'POST') {
            return [];
        }

        if($_POST['action'] != 'edit') {
            return [];
        }

        $id = $_POST['id'];
        $name = $_POST['name'];
        $employeeId = $_POST['employee'];
        $desc = $_POST['description'];
        $price = $_POST['price'];

        $image = RoomLogic::getRoomById($id)['image'];
        if (!empty(basename($_FILES['image']['name']))) {
            $image = self::imgDir().basename($_FILES['image']['name']);
        }

        $errors = RoomLogic::updateRoom($id, $image, $name, $employeeId, $desc, $price);

        if(count($errors) == 0){
            header("Location: roomsPage.php");
            die();
        }
        else {
            return $errors;
        }
    }

    public static function deleteRoom(): array
    {
        if($_SERVER['REQUEST_METHOD'] != "POST"){
            return [];
        }

        if($_POST['action'] != "delete"){
            return [];
        }

        $id = $_POST['id'];

        $errors = RoomLogic::deleteRoom($id);

        if(count($errors) == 0){
            header("Location: roomsPage.php");
            die();
        }
        else{
            return $errors;
        }
    }

    public static function getAllRooms(): array
    {
        return RoomLogic::getAllRooms();
    }

    public static function getRoomById($id): array
    {
        return RoomLogic::getRoomById($id);
    }
}
