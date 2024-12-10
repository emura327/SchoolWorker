<?php
    try {

        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $input1 = $_POST['input1'] . "%";

        if($_POST["input1"] != "" ){ 
            $sql = "SELECT student_number, name, kana, miss_number  from STUDENT where kana LIKE '" . $input1 . "'";
            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $sql = "SELECT student_number, name, kana, miss_number FROM STUDENT";
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
    <link rel="stylesheet" href="student_list.css" text="text/css">
    <title>生徒一覧</title>
</head>
<body>
<?php include('header_site.php');?>
            <form action="tanntouzyugyou.php" method="post" class="search_menu">
                <select name="terms" class="pulldown_menu" >
                    <option value="name" >名前</option>
                    <option value="furigana">フリガナ</option>
                    <option value="student_number">学籍番号</option>
                    <option value="miss_number">欠課数</option>
                </select>
                <input type="text" name="input1" class="searchbox" value="<?php echo $_POST['input1']?>"><br>
                <input type="submit" name="submit" value="検索" class="search">
            </form>  
         
    <div class="result" style="overflow-y:scroll;">
        <table> 
            <tr>
                <th class="name">名前</th><th class="furigana">フリガナ</th><th class="student_number">学籍番号</th><th class="miss_number">欠課数</th>
            </tr>
            <tr>
                <td><?php echo $result[0]['name']; ?></td> <td><?php echo $result[0]['kana']; ?></td> <td><?php echo $result[0]['student_number']; ?></td> <td><?php echo $result[0]['miss_number']; ?></td>
            </tr>
            <tr>
                <td><?php echo $result[1]['name']; ?></td> <td><?php echo $result[1]['kana']; ?></td> <td><?php echo $result[1]['student_number']; ?></td> <td><?php echo $result[1]['miss_number']; ?></td>
            </tr>
            

               
        </table>
    </div>

</body>
</html>