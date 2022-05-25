<?php

class UserLogic
{
    public static function signUp(string $email, string $password, string $repeatPassword, string $fullName,
                                  string $dateOfBirth, string $address, int $gender, string $interests, string $vkLink,
                                  int    $bloodType, int $rhesusFactor): array
    {
        $errors = [];

        $filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if ('' === trim($email)) {
            $errors['email'] = "Не указан email";
        } elseif (!$filteredEmail) {
            $errors['email'] = "Некорректный email";
        } elseif (!empty(UserTable::getUserByEmail($filteredEmail))) {
            $errors['email'] = "Пользователь с таким email уже существует";
        }

        if (!empty($password)) {
            if (strlen($password) <= 6) {
                $errors['password'] = "Пароль должен быть длинее 6 символов";
            } elseif (!preg_match("#[0-9]+#", $password)) {
                $errors['password'] = "Пароль должен содержать хотя бы одну цифру";
            } elseif (!preg_match("#[A-Z]+#", $password)) {
                $errors['password'] = "Пароль должен содержать хотя бы одну заглавную букву";
            } elseif (!preg_match("#[a-z]+#", $password)) {
                $errors['password'] = "Пароль должен содержать хотя бы одну строчную латинскую букву";
            } elseif (!preg_match("#[_\-=\+<>/*$&^%\#()@№:.,;\"\'!`~\[\]\{\}§± ]#", $password)) {
                $errors['password'] = "Пароль должен содержать хотя бы один спецсимвол, пробел, тире и подчеркивание";
            } elseif (preg_match("/^[А-ЯЁ][а-яё]*$/", $password)) {
                $errors['password'] = "Пароль должен содержать только латинские буквы";
            } elseif ($password !== $repeatPassword) {
                $errors['password'] = "Пароли не совпадают";
            }
        } else {
            $errors['password'] = "Не указан пароль";
        }

        if (empty($fullName)) {
            $errors['fullName'] = "Не указано ФИО";
        }

        if (empty($dateOfBirth)) {
            $errors['dateOfBirth'] = "Не указана дата рождения";
        }

        if (empty($address)) {
            $errors['address'] = "Не указан адрес";
        }

        if (empty($gender)) {
            $errors['gender'] = "Не указан пол";
        }

        if (empty($interests)) {
            $errors['interests'] = "Не указаны интересы";
        }

        if (!empty($vkLink)) {
            if (!preg_match("#https://vk\.com/id.*[1-9]#", $vkLink)) {
                $errors['vkLink'] = "Некорректная ссылка на профиль ВК";
            }
        } else {
            $errors['vkLink'] = "Не указана ссылка на профиль ВК";
        }

        if (empty($bloodType)) {
            $errors['bloodType'] = "Не указана группа крови";
        }

        if (empty($rhesusFactor)) {
            $errors['rhesusFactor'] = "Не указан резус фактор";
        }

        if (empty($errors)) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            UserTable::signUp($email, $password, $fullName, $dateOfBirth, $address, $gender,
                $interests, $vkLink, $bloodType, $rhesusFactor);
        }

        return $errors;
    }

    public static function signIn(string $email, string $password): array
    {
        $errors = [];

        $filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!$filteredEmail) {
            $errors['email'] = "Некорректный email";
        } else {
            $user = UserTable::getUserByEmail($filteredEmail);

            if (empty($user)) {
                $errors['email'] = "Пользователя с таким email не существует";
            } elseif (empty($password)) {
                $errors['password'] = "Не указан пароль";
            } elseif (!password_verify($password, $user['password'])) {
                $errors['password'] = "Неверный пароль";
            }
        }

        return $errors;
    }
}
