<?php
try {

session_start();

$dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
$username='admin';
$password='password';
$dbh = new PDO($dsn, $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$terms = $_POST['terms'];
$teacher_number = $_SESSION['teacher_number'];

$sql2 = "SELECT * FROM LESSONS_TAUGHT WHERE teacher_number = :teacher_number";
$stmt2 = $dbh->prepare($sql2);
$stmt2->bindParam(':teacher_number', $teacher_number, PDO::PARAM_STR);
$stmt2->execute();
$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$count = count($result2);

$lesName = $result2[0]['lesson_name'];


// 検索の処理制作
if($terms != "" ){ 
    $sql = "SELECT s.student_number, s.class_number, s.name, s.kana, s.miss_number  from STUDENT s INNER JOIN LESSONS_TAUGHT l ON s.class = l.class_name WHERE l.lesson_name = :terms";
    // $sql = "SELECT student_number, name, kana, miss_number  from STUDENT where '" . $terms . "' LIKE '" . $input1 . "'";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':terms', $terms, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else {
    $sql = "SELECT s.student_number, s.class_number, s.name, s.kana, s.miss_number  from STUDENT s INNER JOIN LESSONS_TAUGHT l ON s.class = l.class_name Where l.lesson_name = :terms";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':terms', $lesName, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
catch (Exception $e) {
    echo "エラーが発生しました: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/lessons_teacher.css" text="text/css">
    <title>Document</title>
</head>
<body>
<?php include('header_site_teacher.php');?>


<form action="lessons_teacher.php" method="post" class="search_menu">
                <select name="terms" class="pulldown_menu" >
                <?php 
                    for($i=0;$i<$count;$i++){
                ?>
                    <option value="<?php print $result2[$i]['lesson_name']; ?>" <?php if ($_POST['terms'] == $result2[$i]['lesson_name']) echo 'selected'; ?>>
                        <?php print $result2[$i]['lesson_name']; ?>
                    </option>
                <?php
                    }
                ?>
                </select>
                <input type="submit" name="submit" value="検索" class="search">
            </form>  
            <div class="result" style="overflow-y:scroll;">
        <table> 
            <tr>
                <th class="title">名前</th><th class="date">フリガナ</th><th class="student_number">学籍番号</th><th class="miss_number">欠課数</th>
            </tr>
            <?php
                foreach ($result as $allresult) {
                    echo '<tr><td>' . $allresult['name'] . '</td><td>' . $allresult['kana'] . '</td><td>' . $allresult['student_number'] . '</td><td>' . $allresult['miss_number'] . '</td></tr>';
                }
            ?>   
            

               
        </table>
    </div>
      
</body>
</html>