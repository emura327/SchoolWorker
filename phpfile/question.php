<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/question.css" text="text/css">
    <title>質問送信</title>
</head>
    <?php include('header_site.php');?>
<body>
<div class = "session1">
    <ul class ="question">
        <!-- 氏名とクラス番号をなくしてタイトルをつける -->
        <li class ="title">
            <div>
                <label for="title">タイトル（必須）</label>
                <input type="text" id="name" name="name" size="20">
            </div>
        </li>
        <li class = "teacher">
            <label for="teacher">質問先の先生</label>
                <select name="teacher_name">
                    <option>aaaaaaa</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
        </li>
        <li>
            <label for="message">内容</label>
            <textarea id="message" name="message" size="100" ></textarea>
        </li>
        <li>
            <input type="submit" value="送信する"class="example">
        </li>
    </ul>
</div>
    
</body>
</html>