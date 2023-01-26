<?php

require_once ('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  if (!empty($_POST['name']) && !empty($_POST['password'])) {
    $named = $_POST['name'];
    $passed = $_POST['password'];
// } else {
//     exit;
//   }
}
// if (isset($named , $passed)) {
//     echo "登録が完了しました";
//     }
$pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);

// function db_connect() {
    try {
        $sql = 'SELECT * FROM users WHERE id < :id';
        $hash = password_hash($passed, PASSWORD_DEFAULT);
        $prepare = $pdo->prepare($sql);
        $pdo->query(
            "INSERT INTO users (name, password) VALUE($named, $passed)"
        );
        $prepare->execute();
        if (isset($named , $passed)) {
            echo "登録が完了しました";
            }
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
