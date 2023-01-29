<?php

require_once ('db_connect.php');

if(isset($_POST["signUp"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
// if ($_SERVER['REQUEST_METHOD'] === "POST") {
//   if (!empty($_POST['name']) && !empty($_POST['password'])) {
//     $named = $_POST['name'];
//     $passed = $_POST['password'];

    $sql = "INSERT INTO users (name, password) VALUES ('{$name}','{$password_hash}')";

    $pdo = db_connect();

// $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);

//     try {
//         $sql = 'SELECT * FROM users WHERE id < :id';
//         $hash = password_hash($passed, PASSWORD_DEFAULT);
//         $prepare = $pdo->prepare($sql);
//         $pdo->query(
//             "INSERT INTO users (name, password) VALUE($named, $passed)"
//         );
//         $prepare->execute();
//         if (isset($named , $passed)) {
//             echo "登録が完了しました";
//             }
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         return $pdo;
//     } catch(PDOException $e) {
//         echo 'Error: ' . $e->getMessage();
//         die();
//     }
// }

try{
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam('name', $name , PDO::PARAM_INT);
      $stmt->bindParam('password', $password_hash , PDO::PARAM_INT);
      $stmt->execute();
      echo "登録が完了しました";
      
    }catch(PDOExeption $e){
      echo 'Error:'.$e->getMessage();
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
    <form method="POST" action="">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
</body>
</html>
