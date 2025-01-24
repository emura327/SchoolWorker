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

<form action="license_report.php" method="post">
    <ul class="uull">
        <li class="name">
            <div>
                <label for="name">資格名</label>
                <input type="text" name="license_name" class="lname">
            </div>
        </li>
        <li class="acquisition">
            <div>
                <label class="message">取得日</label>
                <label class="date-edit"><input type="date" name="getday" value="2025-01-01"/></label>
            </div>
        </li>
            <input type="submit" value="送信する"class="example">
    </ul>
</form>
</body>
</html>
