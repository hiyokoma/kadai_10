
<?php
/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

 
$name = $_POST['name'];
$url = $_POST['url'];
$com = $_POST['com'];



//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();
//３．データ登録SQL作成



// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO
                        gs_bm_table(id, name, url, com, date)
                        VALUES(NULL, :name, :url, :com, sysdate() )");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':com', $com, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);
} else {
    //５．index.phpへリダイレクト
    header('Location: index.php');
}