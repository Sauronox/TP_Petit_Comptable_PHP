<?php
    require_once '../Models/UserModels.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        addUserForm();               
    ?>
        <form method="POST" action="index.php">
            <p>
                <span>Présentation</span>
            </p>
            <input type="email" name="email" placeHolder="email" required><br>
            <input type="text" name="password" placeHolder="Password" required><br>
            <input type="submit" name="submit">
        </form>
</body>
</html>