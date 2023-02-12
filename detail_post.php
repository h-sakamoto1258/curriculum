<?php
// db_connect.phpの読み込み
require_once('db_connect.php');

// function.phpの読み込み
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// URLの?以降で渡されるIDをキャッチ
$id = $_GET['id'];

redirect_main_unless_parameter($id);


// PDOのインスタンスを取得
$pdo = db_connect();

find_post_by_id($id);

// try {
    // SQL文の準備
    // $sql = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
    // プリペアドステートメントの作成
    // $stmt = $pdo->prepare($sql);
    // idのバインド
//     $stmt->bindParam(':id', $id);
//     FILL_IN
// } catch (PDOException $e) {
    // エラーメッセージの出力
    // echo 'Error: ' . $e->getMessage();
    // 終了
//     die();
// }

// 結果が1行取得できたら
// if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $title = $row['title'];
    $content = $row['content'];
// } else {
//     // 対象のidでレコードがない => 不正な画面遷移
//     echo "対象のデータがありません。";
// }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>記事詳細</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <table>
            <tr>
                <td>ID</td>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <td>タイトル</td>
                <td><?php echo $title; ?></td>
            </tr>
            <tr>
                <td>本文</td>
                <td><?php echo $content; ?></td>
            </tr>
        </table>
        <a href="create_comment.php?post_id=<?php echo $id ?>">この記事にコメントする</a><br />
        <a href="main.php">メインページに戻る</a>
    </body>
</html>
