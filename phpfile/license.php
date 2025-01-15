<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/license.css" text="text/css">
    <title>Document</title>
</head>
<body>
    <?php include('header_site.php');?>

<form action="/form.php" method="post">
    <ul class="uull">
        <li class="name">
            <div>
                <label for="name">資格名</label>
                <input type="text">
            </div>
        </li>
        <li class="acquisition">
            <div>
                <label class="message">取得日</label>
                <label class="date-edit"><input type="date" value="2025-01-01"/></label>
            </div>
        </li>
    </ul>
            <input type="submit" value="送信する"class="example">
</form>
</body>
</html>
