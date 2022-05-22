<?php

class EmployeeActions
{
    public static function createEmployee(): array
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return [];
        }

        if ($_POST['action'] != 'create') {
            return [];
        }

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];

        $errors = EmployeeLogic::createEmployee($fullname, $email, $phoneNumber);

        if (count($errors) == 0) {
            header('Location: employeesPage.php');
            die();
        } else {
            return $errors;
        }
    }

    public static function updateEmployee(): array
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return [];
        }

        if ($_POST['action'] != 'update') {
            return [];
        }

        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];

        $errors = EmployeeLogic::updateEmployee($id, $fullname, $email, $phoneNumber);

        if (count($errors) == 0) {
            header('Location: employeesPage.php');
            die();
        } else {
            return $errors;
        }
    }

    public static function deleteEmployee(): array
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return [];
        }

        if ($_POST['action'] != 'delete') {
            return [];
        }

        $id = $_POST['id'];

        $errors = EmployeeLogic::deleteEmployee($id);

        if (count($errors) == 0) {
            header('Location: employeesPage.php');
            die();
        } else {
            return $errors;
        }
    }

    public static function getAllEmployees(): array{
        return EmployeeLogic::getAllEmployees();
    }

    public static function getEmployeeById(int $id): array{
        return EmployeeLogic::getEmployeeById($id);
    }
}
