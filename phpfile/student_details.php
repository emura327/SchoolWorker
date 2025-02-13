<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/student_details.css" text="text/css">
    <title>Document</title>
</head>
<body>
  <?php include('header_site_teacher.php');?>
        
      <?php
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // postされたデータを使って探索
        $student = $_POST['detail'];

        try {
          $sql = "SELECT student_number, class_number, name, telnumber, mailaddress FROM STUDENT where student_number = '" . $student . "' ";
          $stmt = $dbh->query($sql);
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

          $sql = "SELECT student_number, company_name, phase, phase_day, remarks FROM JOB_HUNTING where student_number = '" . $student . "'  ORDER BY phase_day";
          $stmt = $dbh->query($sql);
          $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

          $sql = "SELECT student_number, license_name, getday FROM LICENSE where student_number = '" . $student ."' ";
          $stmt = $dbh->query($sql);
          $result3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
          // エラー吐かれる
          $sql = "SELECT student_number, lesson_name, lesson_miss_number FROM MISS_LESSON where student_number = '" . $student . "' ";
          $stmt = $dbh->query($sql);
          $result4 = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
        }catch (Exception $e){
          echo "エラーが発生しました: " . $e->getMessage();
        }

        
      
      ?>
        <!-- 選択した人の個人情報など -->
        <table class="simei">
          <?php
            foreach ($result as $allresult) {
              echo '<td class="student_number">' . $result[0]['student_number'] . '</td>';
              echo '<td class="class_number">' . $result[0]['class_number'] . '</td>';
              echo '<td class="name">' . $result[0]['name'] . '</td>';
              echo '<td class="telnumber">' . $result[0]['telnumber'] . '</td>';
              echo '<td class="mailaddress">' . $result[0]['mailaddress'] .'</td>';  
            } 
          ?>
            
            
            
            
            
        </table>
        
        <ul class="sort">
          <li>
            <div class="student_status">
              <table class="syukatuzyoukyou">
                <thead>
                  <tr>
                    <th class="company_name">企業名</th><th class="phase">選考状況</th><th class="phase_day">日付</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($result2 as $allresult2){
                    echo '<tr>';
                    echo '<td class="company_name_td">' . $allresult2['company_name'] . '</td><td class="phase_td">' . $allresult2['phase'] . '</td><td class="phase_day_td">' . $allresult2['phase_day'] . '</td>';
                    echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <div class="student_license">
            <table class="sikaku">
                <thead>
                  <tr><th class="getday">取得日</th><th class="license_name">資格名</th></tr>
                </thead>
                <tbody>
                <?php
                  foreach($result3 as $allresult3){
                      echo '<tr>';
                      echo '<td class="getday_td">' . $allresult3['getday'] . '</td><td class="license_name_td">' . $allresult3['license_name'] . '</td>';
                      echo '</tr>';
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </li>

          
          <li>
            <div class="miss">
              <table  class="kekka" >
                <thead>
                  <tr>
                    <th class="lesson_name">欠課授業</th><th class="lesson_miss_number">欠課日数</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($result4 as $allresult4){
                      echo '<tr>';
                      echo '<td class="lesson_name_td">' . $allresult4['lesson_name'] . '</td><td class="lesson_miss_number_td">' . $allresult4['lesson_miss_number'] . '</td>';
                      echo '</tr>';
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </li>
        

          <!-- <li>

          </li> -->
        </ul>
      </body>
</html>