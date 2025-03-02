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
        $stmt = $dbh -> prepare('SELECT * FROM TEACHER WHERE teacher_number=?');
        $stmt -> bindParam(1, $_SESSION["teacher_number"], PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        exit('データベースエラー2');
    }
    //$nmissに多欠生徒を代入
    try {
        $stmt = $dbh -> prepare('SELECT * FROM STUDENT WHERE class=? AND miss_number > 0 ORDER BY miss_number DESC LIMIT 10');
        $stmt -> bindParam(1, $_SESSION["class"], PDO::PARAM_STR);
        $stmt -> execute();
        $nmiss = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        exit('データベースエラー3');
    }
    //$ntitleにNOTICEテーブルの結果を代入
    try{
        $stmt = $dbh -> prepare('SELECT * FROM NOTICE WHERE class=? or class = "全体" LIMIT 5');
        $stmt -> bindParam(1, $_SESSION["class"], PDO::PARAM_STR);
        $stmt -> execute();
        $ntitle = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        exit('データベースエラー4');
    }
    //$nquestionにquestionテーブルの結果を代入
    try{
        $stmt = $dbh -> prepare('SELECT * FROM QUESTION WHERE teacher_number=? LIMIT 5');
        $stmt -> bindParam(1, $_SESSION["teacher_number"], PDO::PARAM_STR);
        $stmt -> execute();
        $nquestion = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        exit('データベースエラー5');
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/mypage_teacher.css" text="text/css">
    <title>先生用マイページ</title>
</head>
<?php include('header_site_teacher.php');?>
<body>
    <div class="section1">    
        <div class="teacher_info">
            <h3 class="g1">社員番号 </h3>
            <p class="teacher_number"><?php print $result['teacher_number']?></p>
            <h3 class="n1">名前</h3>
            <p class="name"><?php print $result['name']?></p>
        </div> 
        <div class="miss_student">
            <h5 class="g2">多欠生徒名</h5> 
            <ul class="miss">
                <?php
                    foreach($nmiss as $nmissall) {
                        echo '<li>' . $nmissall['name'] . ' ' . $nmissall['miss_number'] . '</li>' ;
                    }
                ?>
            </ul>
        </div>
    </div><!-- section1 -->

    <div class ="section2">
        <ul class="section2-1">
            <li class="notice_title">
                <h5 class="g3">お知らせ</h5>
                    <ul class="notice">
                        <?php
                            foreach($ntitle as $ntitleall){
                                echo '<li>' . $ntitleall['title'] . '</li>' ;
                            }
                        ?>
                    </ul>  
            </li>
            
            <li class="question_number">
                <h5 class="g4">生徒からの質問</h5>
                <ul class="question">
                    <?php
                        foreach ($nquestion as $nquestionall){
                            echo '<li>' . $nquestionall['title'] . '</li>' ;
                        }
                    ?>
                </ul>
            </li>
        </ul>
    </div>

    <div class="g5">
        <input type="button" class="logout" onclick="location.href='login.php'" value="ログアウト">
    </div>
</body>
</html>