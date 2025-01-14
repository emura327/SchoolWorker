<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/license.css" text="text/css">
    <title>Document</title>
</head>

    <?php include('header_site.php');?>
    
<body>
<form action="/form.php" method="post">
    <ul>
        <li class="name">
            <div>
                <label for="name">資格名</label>
                <input type="text" id="name" name="name" size="60">
            </div>
        </li>
        <li class="acquisition">
            <div>
                <label for="message">取得日</label>
                <input type="text" id="message" name="message" size="60" ></textarea>
            </div>
        </li>
    </ul>
            <input type="submit" value="送信する"class="example">
</form>
</body>
</html>
