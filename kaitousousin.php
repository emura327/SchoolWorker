<?php
echo $_GET['message'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kaitousousin.css" text="text/css">
    <title>Document</title>
</head>
<body>
        <div class="triangle"></div>
        <div class="header">
            <h1 class="homename1">
                質問回答
            </h1>
            <h2 class="license">
                担任クラス
            </h2>
            <h2 class="syukatu">
                担当授業
            </h2>
            <h2 class="timetable">
                生徒登録
            </h2>
            <h2 class="question">
                質問
            </h2>
            <h2 class="help">
                 ヘルプ
            </h2>
            </div>
              
        <?php
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        try {
          $sql = "SELECT student_number, question, qdatetime,reloadtime, answer, teacher_number, adatetime FROM QUESTION";
          $stmt = $dbh->query($sql);
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        }catch (Exception $e){
          echo "エラーが発生しました: " . $e->getMessage();
        }

        
      
        ?>
        <h3 class="naiyou">
            質問内容
        </h3>
        <div class="box" id="makeImg">
        <p style="margin: 0;"><?php echo $result[0]['question']; ?></p>
        </div>
        <h4>
            質問回答
        </h4>
       <h5>
        先生の名前
       </h5>
        
        <textarea name="message" rows="50" cols="250"></textarea><br>
        </div>
       
        <form action="send.php" method="post" class="switch">
        <input type="text" name="message" class="textbox"><br>
      <input type="submit" value="回答送信">
    </form>
</body>
</html>