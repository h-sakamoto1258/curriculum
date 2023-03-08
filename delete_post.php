<?php
require_once('db_connect.php');
require_once('function.php');

check_user_logged_in();

$id = $_GET['id'];
// if (empty($id)) {
//     header("Location: main.php");
//     exit;
// }

// redirect_main_unless_parameter($id);

$pdo = db_connect();

try {
    $sql = "DELETE FROM books WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: main.php");
    exit;
} catch (PDOException $e) {
    echo 'Error'.$e->getMessage();
    exit;
    // exit('データベース接続失敗。' . $e->getMessage());
    // die();
}
?>