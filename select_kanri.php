<?php
// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");
sessionCheck();
//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();
//３．データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);
} else {
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="detail_kanri.php?id=' . $r["id"] . '">';
        $view .= $r["id"] . "|" . $r["name"] . "|" . $r["pjno"]. "|" . $r["amount"]. "|" . $r["text"];
        $view .= '</a>';
        $view .= "　";
        $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r["id"] . '">';
        $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index_kanri.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron"><?= $view ?></div>
    </div>
    <!-- Main[End] -->
</body>
</html>