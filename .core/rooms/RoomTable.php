<?php

class RoomTable
{
    public static function create(string $imgPath, string $name, int $employeeId, string $desc, string $price)
    {
        $query = Database::prepare(
            'INSERT INTO `rooms` (img_path, name, employee_id, description, price)' .
            'VALUES (:imgPath, :name, :employeeId, :desc, :$price)');
        $query->bindValue(':imgPath', $imgPath, PDO::PARAM_STR);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':employeeId', $employeeId, PDO::PARAM_INT);
        $query->bindValue(':desc', $desc, PDO::PARAM_STR);
        $query->bindValue(':price', $price, PDO::PARAM_STR);

        if (!$query->execute()) {
            throw new PDOException('При добавлении гостиничного номера произошла ошибка');
        }
    }

    public static function update(int $id, string $imgPath, string $name, int $employeeId, string $desc, string $price)
    {
        $query = Database::prepare('UPDATE `rooms` SET `$img_path` = :imgPath,' .
            '`name` = :name, `employee_id` = :employeeId, `description` = :desc, `price` = :price WHERE `id` = :id');
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":imgPath", $imgPath, PDO::PARAM_STR);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':employeeId', $employeeId, PDO::PARAM_INT);
        $query->bindValue(':desc', $desc, PDO::PARAM_STR);
        $query->bindValue(':price', $price, PDO::PARAM_STR);

        if (!$query->execute()) {
            throw new PDOException('При редактировании данных о гостиничном номере произошла ошибка');
        }
    }

    public static function delete(int $id) {
        $query = Database::prepare('DELETE FROM `rooms` WHERE `id`= :id');
        $query->bindValue(":id", $id, PDO::PARAM_INT);

        if (!$query->execute()) {
            throw new PDOException('При удалении гостиничного номера произошла ошибка');
        }
    }

    public static function getAll(): array
    {
        $query = Database::prepare(
            'SELECT rooms.id, rooms.img_path, rooms.name, rooms.description, rooms.price, employee_id,' .
      'employees.fullname as employee_name FROM `rooms` JOIN `employees` ON employee_id = employees.id ORDER BY rooms.id ASC');
        $query->execute();

        return $query->fetchAll();
    }

    public static function getById(int $id): array
    {
        $query = Database::prepare('SELECT * FROM `rooms` WHERE `id` = :id LIMIT 1');
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetchAll();

        if (!count($data)) {
            return [];
        }

        return $data[0];
    }
}
