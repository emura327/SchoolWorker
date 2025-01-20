<?php
    try {

        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $input1 = $_POST['input1'] . "%";
        $terms = $_POST['terms'];

        if($_POST["input1"] != "" ){ 
            switch ($terms) {
                case 'title':
                    $sql =  "SELECT Q.title, Q.qdatetime, Q.student_number, S.name  from  QUESTION Q INNER JOIN STUDENT S on Q.student_number = S.student_number where Q.student_number LIKE '" . $input1 . "'";
                    break;
                
                case 'qdatetime':
                    $sql =  "SELECT Q.title, Q.qdatetime, Q.student_number, S.name  from  QUESTION Q INNER JOIN STUDENT S on Q.student_number = S.student_number where Q.student_number LIKE '" . $input1 . "'";
                    break;

                case 'student_number':
                    $sql =  "SELECT Q.title, Q.qdatetime, Q.student_number, S.name  from  QUESTION Q INNER JOIN STUDENT S on Q.student_number = S.student_number where Q.student_number LIKE '" . $input1 . "'";
                    break;

                case 'name':
                    $sql =  "SELECT Q.title, Q.qdatetime, Q.student_number, S.name  from  QUESTION Q INNER JOIN STUDENT S on Q.student_number = S.student_number where Q.student_number LIKE '" . $input1 . "'";
                    break;

                default:
                    print_r("err");
                    break;
            }
            // $sql = "SELECT Q.title, Q.qdatetime, Q.student_number, S.name  from  QUESTION Q INNER JOIN STUDENT S on Q.student_number = S.student_number where Q.student_number LIKE '" . $input1 . "'";
            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $sql =  "SELECT  Q.title, Q.qdatetime, Q.student_number, S.name  from  QUESTION Q INNER JOIN STUDENT S on Q.student_number = S.student_number";
            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }catch (Exception $e) {
            echo "エラーが発生しました: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/question_teacher.css" text="text/css">
    <title>質問</title>
</head>
<body>
<?php include('header_site_teacher.php');?>
            <form action="question_teacher.php" method="post" class="search_menu">
                <select name="terms" class="pulldown_menu" >
                    <option value="title" <?php if ($_GET['terms'] == 'title') echo 'selected'; ?>>タイトル</option>
                    <option value="qdatetime" <?php if ($_GET['terms'] == 'qdatetime') echo 'selected'; ?>>日時</option>
                    <option value="student_number" <?php if ($_GET['terms'] == "student_number") echo 'selected'; ?>>学籍番号</option>
                    <option value="name" <?php if ($_GET['terms'] == "name") echo 'selected'; ?>>名前</option>
                </select>
                <select name="syouzyun" class="narabikae">
                
                <input type="text" name="input1" class="searchbox" value="<?php echo $_POST['input1']?>"><br>
                <input type="submit" name="submit" value="検索" class="search">
            </form>  
         
    <div class="result" style="overflow-y:scroll;">
        <table> 
            <tr>
                <th class="title">タイトル</th><th class="date">日時</th><th class="student_number">学籍番号</th><th class="name">名前</th>
            </tr>
            <?php
                foreach ($result as $allresult) {
                    echo '<tr><td>' . $allresult['title'] . '</td><td>' . $allresult['qdatetime'] . '</td><td>' . $allresult['student_number'] . '</td><td>' . $allresult['name'] . '</td></tr>';
                }
            ?>   
            

               
        </table>
    </div>
    
</body>
</html>