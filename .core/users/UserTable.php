<?php

class UserTable
{
    public static function signUp(string $email, string $password, string $fullName,
                                  string $dateOfBirth, string $address, int $gender, string $interests, string $vkLink,
                                  int    $bloodType, int $rhesusFactor)
    {
        $query = Database::prepare("INSERT INTO `users` (`user_email`, `password`, `fullname`, `dateOfBirth`," .
                    "`address`, `gender`, `interests`, `vkLink`, `bloodType`, `rhesusFactor`)" .
                    "VALUES (:userEmail, :password, :fullname, :dateOfBirth, :address, :gender, :interests, :vkLink," .
                    ":bloodType, :rhesusFactor)");
        $query->bindValue(":userEmail", $email, PDO::PARAM_STR);
        $query->bindValue(":password", $password, PDO::PARAM_STR);
        $query->bindValue(":fullname", $fullName, PDO::PARAM_STR);
        $query->bindValue(":dateOfBirth", $dateOfBirth, PDO::PARAM_STR);
        $query->bindValue(":address", $address, PDO::PARAM_STR);
        $query->bindValue(":gender", $gender, PDO::PARAM_INT);
        $query->bindValue(":interests", $interests, PDO::PARAM_STR);
        $query->bindValue(":vkLink", $vkLink, PDO::PARAM_STR);
        $query->bindValue(":bloodType", $bloodType, PDO::PARAM_INT);
        $query->bindValue(":rhesusFactor", $rhesusFactor, PDO::PARAM_INT);

        if(!$query->execute()) {
            throw new PDOException('При попытке регистрации произошла ошибка');
        }
    }

    public static function getUserByEmail(string $email): array
    {
        $query = Database::prepare("SELECT * FROM `users` WHERE `user_email` = :userEmail");
        $query->bindValue(":userEmail", $email, PDO::PARAM_STR);
        $query->execute();

        $data = $query->fetchAll();

        if (!count($data)) {
            return [];
        }

        return $data[0];
    }
}