<?php
    try {

        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $input1 = $_POST['input1'] . "%";
        $terms = $_POST['terms'];


        // 検索の処理制作
        if($_POST["input1"] != "" ){ 
            switch ($terms) {
                case 'name':
                    $sql = "SELECT student_number, name, kana, miss_number  from STUDENT where name LIKE '" . $input1 . "'";
                    break;
                
                case 'kana':
                    $sql = "SELECT student_number, name, kana, miss_number  from STUDENT where kana LIKE '" . $input1 . "'";
                    break;

                case 'student_number':
                    $sql = "SELECT student_number, name, kana, miss_number  from STUDENT where student_number LIKE '" . $input1 . "'";
                    break;

                case 'miss_number':
                    $sql = "SELECT student_number, name, kana, miss_number  from STUDENT where miss_number LIKE '" . $input1 . "'";
                    break;

                default:
                    print_r("err");
                    break;
            }
            // $sql = "SELECT student_number, name, kana, miss_number  from STUDENT where '" . $terms . "' LIKE '" . $input1 . "'";
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
    <link rel="stylesheet" href="../cssfile/student_list.css" text="text/css">
    <title>担当授業</title>
</head>
<body>
<?php include('header_site.php');?>
            <form action="student_list.php" method="post" class="search_menu">
                <select name="terms" class="pulldown_menu" >
                    <option value="name" <?php if ($_POST['terms'] == 'name') echo 'selected'; ?>>名前</option>
                    <option value="kana" <?php if ($_POST['terms'] == 'kana') echo 'selected'; ?>>フリガナ</option>
                    <option value="student_number" <?php if ($_POST['terms'] == "student_number") echo 'selected'; ?>>学籍番号</option>
                    <option value="miss_number" <?php if ($_POST['terms'] == "miss_number") echo 'selected'; ?>>欠課数</option>
                </select>
                <input type="text" name="input1" class="searchbox" value="<?php echo $_POST['input1']?>"><br>
                <input type="submit" name="submit" value="検索" class="search">
            </form>  
         
    <div class="result" style="overflow-y:scroll;">
        <table> 
            <tr>
                <th class="name">名前</th><th class="furigana">フリガナ</th><th class="student_number">学籍番号</th><th class="miss_number">欠課数</th>
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
