<?php
//ログインシステム
    session_start();

    //データベースに接続
    try {
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn,$username,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        exit('データベースエラー1');
    }
    
    //ログイン状態の場合ログイン後のページにリダイレクト
    if(isset($_SESSION["login"])) {
        session_regenerate_id(TRUE);
        header("Location: test.php");
        exit();
    }
    //postされてこなかったとき
    if (count($_POST) === 0) {
        echo "";   
    }
    //postされて来てユーザ名とパスワードが送信されてこなかった場合
    else if (empty($_POST['mail']) || empty($_POST['pass'])) {
        echo $_POST['mail'] . $_POST['pass'] . 1;
    }  
    //postされて来たユーザ名がDBにあるか検索
    else {
        try {
            $stmt = $dbh -> prepare('SELECT * FROM LOGIN WHERE id=?');
            $stmt -> bindParam(1, $_POST['mail'], PDO::PARAM_STR);
            $stmt -> execute();
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit('データベースエラー2');
        }
        
        //検索したユーザ名に対してパスワードが正しいか検証
        //正しくないとき
        if ($_POST['pass'] != $result['password']){
            echo "ユーザー名かパスワードが違います";
        }
        //正しいとき
        else {
            //役職が生徒の時
            if ($result['pos'] == 0) {
                session_regenerate_id(TRUE);
                $stmt = $dbh -> prepare("SELECT * from STUDENT WHERE mailaddress = ? ");
                $stmt -> bindParam(1, $_POST['mail'], PDO::PARAM_STR);
                $stmt -> execute();
                //全体で使う変数を格納する配列
                $ary = $stmt -> fetch(PDO::FETCH_ASSOC);
                $_SESSION["class"] = $ary["class"];
                $_SESSION["student_number"] = $ary["student_number"];
                $_SESSION["name"] = $ary["name"];
                header("Location: mypage.php");
                exit();
            //役職が先生の時
            }else {
                session_regenerate_id(TRUE);
                $stmt = $dbh -> prepare("SELECT * from STUDENT WHERE mailaddress = ? ");
                $stmt -> bindParam(1, $_POST['mail'], PDO::PARAM_STR);
                $stmt -> execute();
                header("Location: mypage_teacher.php");
                
            }
        }
    }
        
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/login.css" text="text/css">
    <title>ログインページ</title>
</head>
<body>
    <h1>JOHO</h1>
    <h2>大阪情報専門学校</h2>
    <form action="login.php" method="post" class="login">
        <div class="form_login">
            <label for="mail">メールアドレス</label>
            <input type="text" name="mail" id="mail" required />
        </div>
        <div class="login_pass">
            <label for="pass">パスワード</label>
            <input type="password" name="pass" id="pass" required />
        </div>
        <div class="login_button">
            <input id="login" type="submit" value="ログイン">
        </div>
    </form>
</body>
</html>