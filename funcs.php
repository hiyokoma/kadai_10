<?php

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn(){
    try {
        //ID:'root', Password: xamppは 空白 ''
        $pdo = new PDO('mysql:dbname=book;charset=utf8;host=localhost', 'root', '');
        return $pdo;

    } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()
function loginCheck()
{
    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
        // ログインがおかしい、偽物
        exit('LOGIN ERROR');
    } else {
        // ログインok
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}