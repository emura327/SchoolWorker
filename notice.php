<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="notice.css" text="text/css">
    <title>生徒時間割</title>
</head>
<body>
    <div class="header">
        <h1 class="homename">
            お知らせ入力
        </h1>
        <h2 class="license">
            保有資格
        </h2>
        <h2 class="syukatu">
            就活
        </h2>
        <h2 class="timetable">
            時間割
        </h2>
        <h2 class="question">
            質問
        </h2>
        <h2 class="help"> 
            ヘルプ
        </h2>
    <h3>タイトル</h3>
    <form action = "notice.php" method = "POST">
    <input class="title" type="text" placeholder="title"/>

    <h4>お知らせ内容</h4>
    <textarea type="text" placeholder="notice" ></textarea>
    <button type="submit">送信</button>
</body>
</html>
