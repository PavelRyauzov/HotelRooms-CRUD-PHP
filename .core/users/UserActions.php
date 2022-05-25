<?php

class UserActions
{
    public static function signUp(): array
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return [];
        }

        $email = $_POST['userEmail'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];
        $fullName = $_POST['userFullName'];
        $dateOfBirth = $_POST['userDateOfBirth'];
        $address = $_POST['userAddress'];
        $gender = $_POST['userGender'];
        $interests = $_POST['userInterests'];
        $vkLink = $_POST['userVkLink'];
        $bloodType = $_POST['userBloodType'];
        $rhesusFactor = $_POST['userRhesusFactor'];

        $errors = UserLogic::signUp($email, $password, $repeatPassword, $fullName, $dateOfBirth, $address, $gender,
            $interests, $vkLink, $bloodType, $rhesusFactor);

        if (empty($errors)) {
            $_SESSION['user_email'] = $email;
            header("Location: roomsPage.php");
            die();
        }

        return $errors;
    }

    public static function signIn(): array
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return [];
        }

        $email = $_POST['userEmail'];
        $password = $_POST['password'];

        $errors = UserLogic::signIn($email, $password);

        if (empty($errors)) {
            $_SESSION['user_email'] = $email;
            header("Location: roomsPage.php");
            die();
        }

        return $errors;
    }
}