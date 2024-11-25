<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" text="text/css">
    <title>ログインページ</title>
</head>
<body>
    <h1>JOHO</h1>
    <h2>大阪情報専門学校</h2>
    <form action="" method="get" class="login">
        <div class="form_login">
            <label for="mail">メールアドレス</label>
            <input type="text" name="mail" id="mail" required />
        </div>
        <div class="login_pass">
            <label for="pass">パスワード</label>
            <input type="text" name="pass" id="pass" required />
        </div>
        <div class="login_button">
            <input id="login" type="submit" value="ログイン">
        </div>
    </form>
</body>
</html>