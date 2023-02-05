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

// 提出ボタンが押された場合
// if (isset($_POST['title'] && $_POST['content'])) {
if (isset($_POST)) {
    // titleとcontentの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["content"])) {
        echo 'コンテンツが未入力です。';
    }

    // 入力したtitleとcontentを格納
    if (!empty($_POST["title"]) && !empty($_POST["content"])) {
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        $content = htmlspecialchars($_POST['content'], ENT_QUOTES);
        // PDOのインスタンスを取得
        $po = db_connect();

        try {
            // SQL文の準備
            $sql = "SELECT * FROM posts WHERE title = $title && content = $content";
            // プリペアドステートメントの準備
            $stmt = $pdo -> prepare($sql);
            // $stmt = $pdo -> prepare("INSERT INTO posts(title , content) VALUE (;title , ;content)");
            // タイトルをバインド
            $stmt -> bindValue(':title' , $title , PDO::PARAM_STR);
            // 本文をバインド
            $stmt -> bindValue(':content' , $content , PDO::PARAM_STR);
            // 実行
            $stmt -> excute();
            // main.phpにリダイレクト
            
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo 'Error: ' . $e->getMessage();
            // 終了
            die();
        }
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
    <h1>記事登録</h1>
    <form method="POST" action="">
        title:<br>
        <input type="text" name="title" id="title" style="width:200px;height:50px;">
        <br>
        content:<br>
        <input type="text" name="content" id="content" style="width:200px;height:100px;"><br>
        <input type="submit" value="submit" id="post" name="post">
    </form>
</body>
</html>
