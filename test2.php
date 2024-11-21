
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test2.css" text="text/css">
    <title>生徒時間割</title>
</head>
<body>
    <div class="header">
        <h1 class="homename">
            JOHO
        </h1>
        <h2 class="license">
            保有資格
        </h2>
        <h2 class="syukatu">
            就活
        </h2>
        <h2 class="timetable">
            時間割
        </h2>
        <h2 class="question">
            質問
        </h2>
        <h2 class="help">
            ヘルプ
        </h2>

        <?php
        try{
            $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
            $username='admin';
            $password='password';
            $dbh = new PDO($dsn, $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sql = 'SELECT class,second FROM TIMETABLE';// エラーが発生する可能性のあるコード
                $stmt = $dbh->query($sql);
                $jikan = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                    echo $jikan[0]['class'];
                    echo $jikan[1]['class'];

            }catch (Exception $e) {
                // エラーハンドリングのコード
                echo "エラーが発生しました: " . $e->getMessage();
            }
        ?>
    <table border="3">
        <tr>
            <th class="kado">/</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
        </tr>
        <tr>
            <th>1</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>2</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>3</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>4</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>5</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    
</body>
</html>