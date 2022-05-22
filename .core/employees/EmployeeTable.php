<?php

class EmployeeTable
{
    public static function create(string $fullname, string $email, string $phoneNumber)
    {
        $query = Database::prepare(
            'INSERT INTO `employees` (`fullname`, `email`, `phone_number`) VALUES (:fullname, :email, :phoneNumber)');
        $query->bindValue(":fullname", $fullname, PDO::PARAM_STR);
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        $query->bindValue(":phoneNumber", $phoneNumber, PDO::PARAM_INT);

        if (!$query->execute()) {
            throw new PDOException('При добавлении сотрудника произошла ошибка');
        }
    }

    public static function update(int $id, string $fullname, string $email, string $phoneNumber)
    {
        $query = Database::prepare('UPDATE `employees` SET `fullname` = :fullname,' .
                       '`email` = :email, `phone_number` = :phoneNumber WHERE `id` = :id');
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":fullname", $fullname, PDO::PARAM_STR);
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        $query->bindValue(":phoneNumber", $phoneNumber, PDO::PARAM_STR);

        if (!$query->execute()) {
            throw new PDOException('При редактировании данных о сотруднике произошла ошибка');
        }
    }

    public static function delete(int $id) {
        $query = Database::prepare('DELETE FROM `employees` WHERE `id`= :id');
        $query->bindValue(":id", $id, PDO::PARAM_INT);

        if (!$query->execute()) {
            throw new PDOException('При удалении сотрудника произошла ошибка');
        }
    }

    public static function getAll(): array
    {
        $query = Database::prepare('SELECT * FROM `employees`');
        $query->execute();

        return $query->fetchAll();
    }

    public static function getById(int $id): array
    {
        $query = Database::prepare('SELECT * FROM `employees` WHERE `id` = :id LIMIT 1');
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetchAll();

        if (!count($data)) {
            return [];
        }

        return $data[0];
    }
}
