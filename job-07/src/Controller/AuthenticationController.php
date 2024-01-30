<?php namespace App;
    
    function register(
        string $email,
        string $password,
        string $fullname,
    ): bool {
        $newUser = new User();
        $user = $newUser->findOneByEmail($email);
        if(!$user) {
            $newUser->setEmail($email);
            $newUser->setPassword($password);
            $newUser->setFullname($fullname);
            $newUser->save();
        }
        return false;
    }

    function login(
        string $email,
        string $password,
    ): bool {
        $user = new User();
        $user = $user->findOneByEmail($email);
        if(!$user) {
            return false;
        }
        if(password_verify($password, $user->getPassword())) {
            $_SESSION['user'] = $user;
            return true;
        }
    }

    function logout(): void {
        unset($_SESSION['user']);
    }