<?php
// db_connect.phpの読み込み
require_once ('db_connect.php');

// function.phpの読み込み
require_once ('function.php');

// ログインしていなければ、login.phpにリダイレクト
if (!(isset($_SESSION["user_id"]))) {
    header('Location: login.php'); // ログインしていれば
    exit; // 処理終了
}

// PDOのインスタンスを取得
$pdo = db_connect();

try{
    // SQL文の準備
    $sql = "SELECT * FROM posts";
    // $stml = array();
    // foreach ($dbh->query($sql) as $row) {
    // array_push($stml, $row);
    // }

    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);
    // 実行
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
    <title>メイン</title>
</head>
<body>
    <h1>メインページ</h1>
    <p>ようこそ<?php echo $_SESSION["user_name"]; ?>さん</p>
    <a href="logout.php">ログアウト</a><br />
    <a href="create_post.php">記事投稿！</a><br />
    <table>
        <tr>
            <td>記事ID</td>
            <td>タイトル</td>
            <td>本文</td>
            <td>投稿日</td>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td><?php echo $row['time']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
