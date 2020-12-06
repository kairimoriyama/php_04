<?php

include("funcs.php");

//1. POSTデータ取得
$name   = $_POST["name"];
$pjno  = $_POST["pjno"];
$text = $_POST["text"];
$amount    = $_POST["amount"];
$id     = $_POST["id"];

//2. DB接続します

$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_an_table SET name=:name,pjno=:pjno,amount=:amount,text=:text,indate=sysdate() WHERE id=:id");
$stmt->bindValue(':name',  h($name),   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pjno',  h($pjno),  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':amount',  h($amount),    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text', h($text), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',  h($id),     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select_kanri.php");
}
