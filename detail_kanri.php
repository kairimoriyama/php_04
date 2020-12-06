<?php
session_start();
include("funcs.php");

$id = $_GET["id"]; //?id~**を受け取る

sessionCheck();
$pdo = db_conn();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
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
                <div class="navbar-header"><a class="navbar-brand" href="select_kanri.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    <!-- Main[Start] -->
    <form method="POST" action="update_kanri.php">
        <div class="jumbotron">
            <fieldset>
                <legend>[編集]</legend>
                <label>案件名：<input type="text" name="name" value="<?= $row["name"] ?>"></label><br>
                <label>案件番号：<input type="text" name="pjno" value="<?= $row["pjno"] ?>"></label><br>
                <label>金額：<input type="text" name="amount" value="<?= $row["amount"] ?>"></label><br>
                <label><textArea name="text" rows="4" cols="40"><?= $row["text"] ?></textArea></label><br>
                <input type="submit" value="更新">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>
</html>