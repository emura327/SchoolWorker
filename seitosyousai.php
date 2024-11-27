<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="seitosyousai.css" text="text/css">
    <title>Document</title>
</head>
<body>
        <div class="triangle"></div>
        <div class="header">
            <h1 class="homename1">
                生徒詳細
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
        $dsn2='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username2='admin2';
        $password2='password2';
        $dbh2 = new PDO($dsn, $username, $password);
        $dbh2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dsn3='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username3='admin3';
        $password3='password3';
        $dbh3 = new PDO($dsn, $username, $password);
        $dbh3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dsn4='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username4='admin3';
        $password4='password3';
        $dbh4 = new PDO($dsn, $username, $password);
        $dbh4->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        try {
          $sql = "SELECT student_number, class_number, name, telnumber, mailaddress FROM STUDENT";
          $stmt = $dbh->query($sql);
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $sql2 = "SELECT student_number, company_name, phase, phase_day, remarks FROM JOB_HUNTING";
          $stmt2 = $dbh2->query($sql2);
          $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
          $sql3 = "SELECT student_number, license_name, getday FROM LICENSE";
          $stmt3 = $dbh3->query($sql3);
          $result3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
          $sql4 = "SELECT student_number, lesson_name, lesson_miss_number FROM LESSON";
          $stmt4 = $dbh4->query($sql4);
          $result4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
         
        
        }catch (Exception $e){
          echo "エラーが発生しました: " . $e->getMessage();
        }

        
      
        ?>
        <table class="simei">
            <td width="300"><p style="margin: 0;"><?php echo $result[0]['student_number']; ?></p></td><td width="250"><p style="margin: 0;"><?php echo $result[0]['class_number']; ?></p></td><td width="361"><p style="margin: 0;"><?php echo $result[0]['name']; ?></p></td><td width="370"><p style="margin: 0;"><?php echo $result[0]['telnumber']; ?></p></td><td width="420"><p style="margin: 0;"><?php echo $result[0]['mailaddress']; ?></p></td>
        </table>
        <table class="syukatuzyoukyou">
            <tr>
              <th width="279">企業名</th><th width="245" >選考状況</th><th width="301">日付</th>
            </tr>
            <tr>
            <td><p style="margin: 0;"><?php echo $result2[0]['company_name']; ?></p></td><td><p style="margin: 0;"><?php echo $result2[0]['phase']; ?></td><td><p style="margin: 0;"><?php echo $result2[0]['phase_day']; ?></td>
            </tr>
            <tr>
              <td><?php echo $result2[1]['company_name']; ?></td><td><p style="margin: 0;"><?php echo $result2[1]['phase']; ?></td><td><p style="margin: 0;"><?php echo $result2[1]['phase_day']; ?></td>
            </tr>
          </table>
          <table class="sikaku">
            <tr>
              <th width="314">取得日</th><th width="513">資格名</th>
            </tr>
            <tr>
              <td><p style="margin: 0;"><?php echo $result3[0]['getday']; ?></p></td><td><p style="margin: 0;"><?php echo $result3[0]['license_name']; ?></p></td>
            </tr>
            <tr>
              <td><p style="margin: 0;"><?php echo $result3[1]['getday']; ?></p></td><td><p style="margin: 0;"><?php echo $result3[0]['license_name']; ?></p></td>
            </tr>
            <tr>
                <td><p style="margin: 0;"><?php echo $result3[0]['getday']; ?></p></td><td><p style="margin: 0;"><?php echo $result3[0]['license_name']; ?></p></td>
              </tr>
          </table>
          <table  class="kekka" >
            <tr>
              <th width="373">欠課授業</th><th width="326">欠課日数</th>
            </tr>
            <tr>
              <td><p style="margin: 0;"><?php echo $result4[0]['lesson_name']; ?></p></td><td><p style="margin: 0;"><?php echo $result4[0]['lesson_miss_number']; ?></p></td>
            </tr>
            <tr>
              <td><p style="margin: 0;"><?php echo $result4[1]['lesson_name']; ?></p></td><td><p style="margin: 0;"><?php echo $result4[0]['lesson_miss_number']; ?></p></td>
            </tr>
            <tr>
                <td><p style="margin: 0;"><?php echo $result4[0]['lesson_name']; ?></p></td><td><p style="margin: 0;"><?php echo $result4[0]['lesson_miss_number']; ?></p></td>
              </tr>
              <tr>
                <td><p style="margin: 0;"><?php echo $result4[0]['lesson_name']; ?></p></td><td><p style="margin: 0;"><?php echo $result4[0]['lesson_miss_number']; ?></p></td>
              </tr>
              <tr>
                <td><p style="margin: 0;"><?php echo $result4[0]['lesson_name']; ?></p></td><td><p style="margin: 0;"><?php echo $result4[0]['lesson_miss_number']; ?></p></td>
              </tr>
          </table>
       
</body>
</html>