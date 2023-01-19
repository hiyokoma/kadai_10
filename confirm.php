<?php

// post受け取る
$name = $_POST['name'];
$url = $_POST['url'];
$com = $_POST['com'];


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- errorを受け取ったら、エラー文出力。 -->

    <form method="POST" action="insert.php" enctype="multipart/form-data" class="mb-3">
        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="hidden" name="name" value="<?= $name ?>">
            <p><?= $name ?></p>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">記事内容</label>
            <input type="hidden"name="com" value="<?= $com ?>">
            <div><?= $com ?></div>
        </div>

        
        <div class="mb-3">
            <label for="content" class="form-label">url</label>
            <input type="hidden"name="url" value="<?= $url ?>">
            <div><?= $url ?></div>
        </div>


        <button type="submit" class="btn btn-primary">投稿</button>
    </form>

    <a href="index.php">前の画面に戻る</a>
</body>
</html>