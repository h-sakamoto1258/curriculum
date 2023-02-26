<?php
require_once ('db_connect.php');
require_once ('function.php');

check_user_logged_in();

$pdo = db_connect();


$sql = "INSERT INTO books (title, date, stock) VALUES 
  ('JAVA初級','date('Y-m-d')', 10), 
  ('JAVA中級','date('Y-m-d')', 20), 
  ('JAVA初級','date('Y-m-d')', 15), 
  ('PHP初級','date('Y-m-d')', 10), 
  ('PHP中級','date('Y-m-d')', 20), 
  ('PHP上級','date('Y-m-d')', 15) ";

try{
    $sql = "SELECT * FROM books ORDER BY id ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
  }catch(PDOExeption $e){
    echo 'Error:'.$e->getMessage();
    die();
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
    <input type="text" name="name" id="name" placeholder="タイトル">
    <br>
    </div>
    <div class="name">
    <input type="text" name="name" id="name" placeholder="発売日">
    <br>
    </div>
    在庫数
    <div>
    <!-- <div class="zaiko"> -->
        <label>
            <SELECT>
                <option>選択してください</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </SELECT>
        </label>
    <!-- <input type="text" name="name" id="name" placeholder="選択してください"> -->
    <br>
    </div>
    <a href="" class="btn">登録</a>
</body>
</html>
