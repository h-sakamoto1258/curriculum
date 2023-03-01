<?php
require_once ('db_connect.php');

if(isset($_POST["signUp"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, password) VALUES ('{$name}','{$password_hash}')";

    $pdo = db_connect();

try{
      $stmt = $pdo->prepare($sql);
      // $stmt->bindParam('name', $name , PDO::PARAM_INT);
      // $stmt->bindParam('password', $password_hash , PDO::PARAM_INT);
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
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h2>ユーザー登録画面</h2>
    <form method="POST" action="">
      <div class="name">
        <input type="text" name="name" id="name" placeholder="ユーザー名">
        <br>
      </div>
      <div class="pass">
        <input type="password" name="password" id="password" placeholder="パスワード"><br>
        <!-- <input type="submit" value="submit" id="signUp" name="signUp"> -->
      </div>
      <div>
      <button class="button" type="submit" value="submit" id="signUp" name="signUp">新期登録</button>
      <!-- <button>
        <input type="" value="submit" id="signUp" name="signUp">
      </button> -->
      <!-- <a href="login.php">新規登録</a><br /> -->
      </div>
    </form>
</body>
</html>
