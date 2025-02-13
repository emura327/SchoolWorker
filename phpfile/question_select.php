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
                    $sql =  "SELECT  Q.question_number, Q.title, Q.qdatetime, T.kana, T.name  from  QUESTION Q INNER JOIN TEACHER T on Q.teacher_number = T.teacher_number where Q.title LIKE '" . $input1 . "'";
                    break;
                
                case 'qdatetime':
                    $sql =  "SELECT  Q.question_number, Q.title, Q.qdatetime, T.kana, T.name  from  QUESTION Q INNER JOIN TEACHER T on Q.teacher_number = T.teacher_number where Q.qdatetime LIKE '" . $input1 . "'";
                    break;

                case 'kana':
                    $sql =  "SELECT  Q.question_number, Q.title, Q.qdatetime, T.kana, T.name  from  QUESTION Q INNER JOIN TEACHER T on Q.teacher_number = T.teacher_number where T.kana LIKE '" . $input1 . "'";
                    break;

                case 'name':
                    $sql =  "SELECT  Q.question_number, Q.title, Q.qdatetime, T.kana, T.name  from  QUESTION Q INNER JOIN TEACHER T on Q.teacher_number = T.teacher_number where T.name LIKE '" . $input1 . "'";
                    break;

                default:
                    print_r("err");
                    break;
            }
            // $sql = "SELECT Q.title, Q.qdatetime, Q.student_number, S.name  from  QUESTION Q INNER JOIN STUDENT S on Q.student_number = S.student_number where Q.student_number LIKE '" . $input1 . "'";
            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $sql =  "SELECT Q.question_number, Q.title, Q.qdatetime, T.kana, T.name  from  QUESTION Q INNER JOIN TEACHER T on Q.teacher_number = T.teacher_number";
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
<?php include('header_site.php');?>
    
    <form action="question_select.php" method="post" class="search_menu">
    <input type="button" class="new" onclick="location.href='question.php'" value="新規作成">
        <select name="terms" class="pulldown_menu" >
            <option value="title" <?php if ($_POST['terms'] == 'title') echo 'selected'; ?>>タイトル</option>
            <option value="qdatetime" <?php if ($_POST['terms'] == 'qdatetime') echo 'selected'; ?>>日時</option>
            <option value="name" <?php if ($_POST['terms'] == "name") echo 'selected'; ?>>名前</option>
            <option value="kana" <?php if ($_POST['terms'] == "kana") echo 'selected'; ?>>カナ</option>
        </select>
            <input type="text" name="input1" class="searchbox" value="<?php echo $_POST['input1']?>"><br>
            <input type="submit" name="submit" value="検索" class="search">
    </form>  
         
    <div class="result" style="overflow-y:scroll;">
        <table> 
            <tr>
                <th class="title">タイトル</th><th class="date">日時</th><th class="name">名前</th><th class="kana">カナ</th>
            </tr>
            <?php
                $int = 0;
                foreach ($result as $allresult) {
                    echo '<form action="question_confirmation.php" name=replys method="post" class="reply">';
                    echo '<tr><td><a href="javascript:replys['.$int.'].submit()">' . $allresult['title'] . '</td><td>' . $allresult['qdatetime'] . '</td><td>' . $allresult['name'] . '</td><td>' . $allresult['kana'] . '</td></tr>';
                    echo '<input type="hidden" id="reply" name="reply" value="' . $allresult['question_number'] . '">';
                    echo '</form>';
                    $int = $int + 1;
                }
                    
            ?>   

        </table>
    </div>
    
</body>
</html>