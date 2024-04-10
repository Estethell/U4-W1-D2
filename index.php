<?php 
echo '<pre>' . print_r($_POST, true) . '</pre>';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $errors = [];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email non valida';
    }

    if (strlen($password) < 8) {
        $errors['password'] = 'Password non valida';
    }

    $ageValue = intval($age); 
    
    if ($ageValue < 10 || $ageValue > 90) {
        $errors['age'] = 'Età non valida';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U4-W1-D2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form action="" method="post">
        <label for="username">Nome</label>
        <input type="text" name="username" id="username" placeholder="Inserire nome"><br>
        
        <label for="surname">Cognome</label>
        <input type="text" name="surname" id="surname" placeholder="Inserire cognome"><br>
        
        <label for="age">Età</label>
        <input type="number" name="age" id="age"><br>
        <div class="error"><?= $errors['age'] ?? "" ?></div><br>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Example@mail.com"><br>
        <div class="error"><?= $errors['email'] ?? "" ?></div><br>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="xxxxxx" class="<?= isset($errors['password']) ? 'is-invalid' : '' ?>"><br>
        <div class="error"><?= $errors['password'] ?? '' ?></div><br>
    
        <button type="submit">Invia</button>
    </form>
</body>
</html>
