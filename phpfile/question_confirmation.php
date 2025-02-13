<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/question_confirmation.css" text="text/css">
    <title>Document</title>
</head>
<body>
<?php include('header_site.php');?>
              
        <?php
        $questionN = $_POST['reply'];

       $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
       $username='admin';
       $password='password';
       $dbh = new PDO($dsn, $username, $password);
       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        try {
          $sql = "SELECT student_number, question, qdatetime, answer, teacher_number, adatetime FROM QUESTION where question_number = '" . $questionN ."' ";
          $stmt = $dbh->query($sql);
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        }catch (Exception $e){
          echo "エラーが発生しました: " . $e->getMessage();
        }

        
      
        ?>
            <h3 class="naiyou">
                質問内容
            </h3>
        <textarea class="reply" rows="10" cols="150" readonly><?php echo $result[0]['question']; ?></textarea>
       
        
        </div>
        
      
        <h4 class="answer">
            質問回答
        </h4>
      
        
        <textarea class="name" rows="10" cols="150" readonly><?php echo $result[0]['answer']; ?></textarea><br>
        </div>

        
    </form>
</body>
</html>