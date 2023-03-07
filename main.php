<?php
require_once ('db_connect.php');
require_once ('function.php');

check_user_logged_in();

$pdo = db_connect();

try{
    $sql = "SELECT * FROM books ORDER BY id ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
  }catch(PDOExeption $e){
    echo 'Error:'.$e->getMessage();
    die();
  }

if(!empty($_POST)){
    if(empty($_POST["title"])){
    echo "タイトルが未入力です。";
    }
    if(empty($_POST["date"])){
    echo "発売日が未入力です。";
    }
    if(empty($_POST["stock"])){
    echo "在庫数が未入力です。";
    }
}

if(!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["stock"])){
      $title = $_POST["title"];
      $date = $_POST["date"];
      $stock = $_POST["stock"];

      $add_sql = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";

      $pdo = db_connect();
      try{
        $add_stmt = $pdo->prepare($add_sql);
        $add_stmt->bindParam(':title', $title);
        $add_stmt->bindParam(':date', $date);
        $add_stmt->bindParam(':stock', $stock);
        $add_stmt->execute();
        header("Location: main.php");
      }catch(PDOExeption $e){
        echo "Error:".$e->getMessage();
        die();
      }
    }
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>在庫一覧画面</h2>
        <a href="new_post.php" class="new">新規登録</a>
        <!-- <a href="logout.php">ログアウト</a><br> -->
        <a href="logout.php" class="logout">ログアウト</a><br />
        <!-- <a href="create_post.php">記事投稿！</a> -->
    </header>
    <table>
        <tr>
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th></th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><a href="delete_post.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
        <?php } ?>
    </table>
    <h2>本登録画面</h2>
    <form method="POST" action="">
        <div class="name">
            <input type="text" name="title" id="name" placeholder="タイトル">
            <br>
        </div>
        <div class="name">
            <input type="text" name="date" id="name" placeholder="発売日">
            <br>
        </div>
        在庫数
        <div>
        <!-- <div class="zaiko"> -->
            <label>
                <SELECT name="stock" id="name">
                    <option value="">--選択してください--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </SELECT>
            </label>
            <br>
        </div>
        <button class="btn" type="submit" value="submit" id="signUp" name="signUp">登録</button>
        <a href=""></a><br />
    </form>
    <!-- <a href="" class="btn">登録</a><br /> -->
</body>
</html>
