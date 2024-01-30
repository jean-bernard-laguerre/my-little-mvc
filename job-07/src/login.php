<?php
    namespace App;
    
    $errorMessage = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if(login($email, $password)) {
            header('Location: shop.php');
        }
        else {
            $errorMessage = 'Les identifiants fournis ne correspondent à aucun utilisateur';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form
        method="post"
    >
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Login">
    </form>
</body>
</html>