<?php
       $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
       $username='admin';
       $password='password';
       $dbh = new PDO($dsn, $username, $password);
       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $question_number = $_POST['reply'];
       
        try {
          $sql = "SELECT question_number, student_number, question, answer  FROM QUESTION where question_number = '" . $question_number ."'";
          $stmt = $dbh->query($sql);
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        }catch (Exception $e){
          echo "エラーが発生しました: " . $e->getMessage();
        }

        
     
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/sendreply.css" text="text/css">
    <title>Document</title>
</head>
<body>
<?php include('header_site_teacher.php');?>
              
            <h3 class="naiyou">
                質問内容
            </h3>
            
        <textarea class="reply" readonly><?php echo $result[0]['question']; ?>
        </textarea>
       
        
        
      
        <h4 class="answer">
            質問回答
        </h4>
       
        
      <form action="question_answer.php" method="post" class="switch">   
        <textarea class="name" name="answer"><?php echo $result[0]['answer']; ?></textarea><br> 
        <input type="hidden" name="question_number" value=<?php  echo $question_number; ?>>
        <input type="submit" class="send" value="回答送信">
      </form>
</body>
</html>