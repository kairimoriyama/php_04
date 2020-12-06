<?php
session_start();
include("funcs.php");

$id = $_GET["id"]; //?id~**を受け取る

sessionCheck();
$pdo = db_conn();
//２．データ登録SQL作成
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
    <title>データ更新</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="user_kanri.php">ユーザー一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    <!-- Main[Start] -->
    <form method="POST" action="user_update_kanri.php">
        <div class="jumbotron">
            <fieldset>
                <legend>[編集]</legend>
                <label>名前：<input type="text" name="name" value="<?= $row["name"] ?>"></label><br>
                <label>ID：<input type="text" name="lid" value="<?= $row["lid"] ?>"></label><br>
                <label>PASS<input type="text" name="lpw" value="<?= $row["lpw"] ?>"></label><br>
                <label>管理者<input type="text" name="kanri_flg" value="<?= $row["kanri_flg"] ?>"></label><br>

                <input type="submit" value="更新">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>
</html>