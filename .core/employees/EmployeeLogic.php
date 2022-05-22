<?php

class EmployeeLogic
{
    public static function createEmployee(string $fullname, string $email, string $phoneNumber): array
    {
        $errors = [];

        if(empty($fullname)) {
            $errors['fullname_err'] = 'Не указано ФИО';
        }

        $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (empty($email)) {
            $errors['email_err'] = 'Не указан email';
        } else {
            if (!$validEmail) {
                $errors['email_err'] = 'Некорректный email';
            }
        }

        if (empty($phoneNumber)) {
            $errors['phone_number_err'] = 'Не указан номер телефона';
        } else {
            if (!preg_match("^\+?[78][\(]?\d{3}\)??\d{3}?\d{2}?\d{2}$", $phoneNumber)) {
                $errors['phone_number_err'] = 'Некорректный номер телефона';
            }
        }

        if (empty($errors)) {
            EmployeeTable::create($fullname, $email, $phoneNumber);
        }

        return $errors;
    }

    public static function deleteEmployee(int $id): array
    {
        $errors = [];

        try {
            EmployeeTable::delete($id);

        } catch (PDOException $e) {
            $errors['delete_err'] = 'Невозможно удалить сотрудника, так как он указан в описании номера';
            return $errors;
        }

        return $errors;
    }

    public static function updateEmployee(int $id, string $fullname, string $email, string $phoneNumber): array
    {
        $errors = [];

        if(empty($fullname)) {
            $errors['fullname_err'] = 'Не указано ФИО';
        }

        $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (empty($email)) {
            $errors['email_err'] = 'Не указан email';
        } else {
            if (!$validEmail) {
                $errors['email_err'] = 'Некорректный email';
            }
        }

        if (empty($phoneNumber)) {
            $errors['phone_number_err'] = 'Не указан номер телефона';
        } else {
            if (!preg_match("^\+?[78][\(]?\d{3}\)??\d{3}?\d{2}?\d{2}$", $phoneNumber)) {
                $errors['phone_number_err'] = 'Некорректный номер телефона';
            }
        }

        if (empty($errors)) {
            EmployeeTable::update($id, $fullname, $email, $phoneNumber);
        }

        return $errors;
    }

    public static function getAllEmployees(): array
    {
        return EmployeeTable::getAll();
    }

    public static function getEmployeeById(int $id): array
    {
        return EmployeeTable::getById($id);
    }
}
