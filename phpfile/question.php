<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/question.css" text="text/css">
    <title>質問送信</title>
</head>
<?php include('header_site.php');?>
<?php
    try{
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbh -> prepare('SELECT * FROM TEACHER');
        $stmt -> execute();
        
    } catch (PDOException $e) {
        exit('データベースエラー');
    }
?>

<body>

    <?php
        foreach($stmt as $allteacher){
            $teacher .= "<option value='". $allteacher['teacher_number'];
            $teacher .= "'>". $allteacher['name']. "</option>";
        }
    ?>
    <div class = "session1">
        <ul class ="question">
            <!-- 氏名とクラス番号をなくしてタイトルをつける -->
            <form action="question_create.php" method="post">
                <li class ="title">
                    <div>
                        <label for="title">タイトル（必須）</label>
                        <input type="text" id="name" name="title" size="20">
                    </div>
                </li>
                <li class = "teacher">
                    <label for="teacher_name">質問先の先生</label>
                        <select name="teacher_name" id="menu">
                            <?php 
                                echo $teacher;
                            ?>
                        </select>
                </li>
                <li>
                    <label for="message">内容</label>
                    <textarea id="message" name="question" size="100" class="text"></textarea>
                </li>
                <li>
                    <input type="submit" value="送信する"class="example">
                </li>
            </form>
        </ul>
    </div>
    
</body>
</html>