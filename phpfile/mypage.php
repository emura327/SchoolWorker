<?php
    /**
     * 生徒用マイページ
     */
    session_start();
    //データベースに接続
    try{
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn,$username,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }  catch (PDOException $e) {
        exit('データベースエラー1');
    }
    //$_SESSIONで該当する生徒を抽出した結果を$resultに代入
    try {
        $stmt = $dbh -> prepare('SELECT * FROM STUDENT WHERE student_number=?');
        $stmt -> bindParam(1, $_SESSION["student_number"], PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        exit('データベースエラー2');
    }

    //$answerにLESSONテーブルの結果を代入
    try{
        $stmt = $dbh -> prepare('SELECT * FROM MISS_LESSON WHERE student_number=?');
        $stmt -> bindParam(1, $_SESSION["student_number"], PDO::PARAM_STR);
        $stmt -> execute();
        $answer = $stmt -> fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        exit('データベースエラー3');
    }
    //$ntitleにNOTICEテーブルの結果を代入
    try{
        $stmt = $dbh -> prepare('SELECT * FROM NOTICE WHERE class=? or class = "全体"');
        $stmt -> bindParam(1, $_SESSION["class"], PDO::PARAM_STR);
        $stmt -> execute();
        $ntitle = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        exit('データベースエラー4');
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/mypage.css" text="text/css">
    <title>Document</title>
</head>
<?php include('header_site.php');?>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
<body>
    <div class="student_info">
        <h3 class="g1">学籍番号 名前</h3> 
        <p class="student_number"><?php print $result['student_number'] ?> </p>
        <p class="name"><?php print $result['name'] ?></p>
    </div>
    <h3 class="g2">
        合計欠課数
            <p><?php print $result['miss_number'] ?></p>
    </h3> 
    <h3 class="g3">
       多欠授業名
            <p class="lesson_Name"><?php print $answer['lesson_name']?></p>
    </h3>
    <div class ="notice_title">
        <h3 class="g4">お知らせ</h3>
        <ul>
            <?php 
                for ($i = 0; $i < 2; $i++){
                    echo '<li>' . $ntitle[$i]['title'] . '</li>' ;
                }
            ?>
        </ul>
    </div>
</body>
</html>