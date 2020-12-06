<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$pjno = $_POST["pjno"];
$text = $_POST["text"];
$amount    = $_POST["amount"]; //追加されています

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(id, name,pjno,amount,text,indate)VALUES(NULL,:name,:pjno,:amount,:text,sysdate())");
$stmt->bindValue(':name', h($name), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pjno', h($pjno), PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':amount', h($amount), PDO::PARAM_INT);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text', h($text), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("index.php");
}
