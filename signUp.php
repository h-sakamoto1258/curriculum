<?php

require_once ('db_connect.php');

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $name = $_POST['name'];
    // $password = $_POST['password'];
// }
?>

<?php
$name = "";
$password = "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  if (!empty($_POST['name']) && !empty($_POST['password'])) {
    $named = $_POST['name'];
    $passed = $_POST['password'];
} else {
    exit;
  }
}

// else {
//     echo "氏名もしくはパスワードが未入力です。";
// }

// $name = trim(filter_input(INPUT_POST, 'name'));
// $password = trim(filter_input(INPUT_POST, 'password'));

if (isset($named , $passed)) {
    echo "登録が完了しました";
    }

function db_connect() {
    try {
        $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        die();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>新規登録</h1>
    <form method="POST" action="signUp.php">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
</body>
</html>
