<?php
// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");
sessionCheck();

$id = $_SESSION["id"]; //?id~**を受け取る

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();
//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー情報</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="index.php">データ登録</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    <!-- Main[Start] -->
    <form method="POST" action="user_update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>[編集]</legend>
                <label>ユーザー名：<input type="text" name="name" value="<?= $row["name"] ?>"></label><br>
                <label>ID：<input type="text" name="lid" value="<?= $row["lid"] ?>"></label><br>
                <label>PASS：<input type="text" name="lpw" value="<?= $row["lpw"] ?>"></label><br>
                <input type="submit" value="更新">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>
</html>








