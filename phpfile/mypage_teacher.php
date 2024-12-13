<?php
    /**
     * 先生用マイページ
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
    //$_SESSIONで該当する先生を抽出した結果を$resultに代入
    try {
        $stmt = $dbh -> prepare('SELECT * FROM TEACHER WHERE class=?');
        $stmt -> bindParam(1, $_SESSION["class"], PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        exit('データベースエラー2');
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
    //$nquestionにquestionテーブルの結果を代入
    try{
        $stmt = $dbh -> prepare('SELECT * FROM QUESTION WHERE class=? or class = "全体"');
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
    <link rel="stylesheet" href="../cssfile/mypage_teacher.css" text="text/css">
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
    <div class="teacher_info">
        <h3 class="g1">社員番号 名前</h3>
            <p class="teacher_number"><?php print $result['teacher_number']?></p>
            <p class="name"><?php print $resilt['name']?></p>
    </div> 
    <h5 class="g2">
        多欠生徒名
    </h5> 
    <div class="notice_title">
        <h5 class="g3">お知らせ</h5>
        <ul>
            <?php
                for ($i = 0; $i < 2; $i++){
                    echo '<li>' . $ntitle[$i]['title'] . '</li>' ;
                }
            ?>
        </ul>  
            </div>
    <div class="question_number">
            <h5 class="g4">生徒からの質問</h5>
            <ul>
                <?php
                    for ($i = 0; $i < 2; $i++){
                        echo '<li>' . $nquestion[$i]['queestion'] . '</li>' ;
                    }
                ?>
            </ul>
    <div class="g5">
        <h8>ログアウト</h8>
    </div>
</body>
</html>