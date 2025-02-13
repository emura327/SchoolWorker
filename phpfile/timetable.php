
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>生徒時間割</title>
</head>
<body>
    <?php 
    include('header_site.php');
    ?>
        <?php
        session_start();
        $SClass=$_SESSION['class'];
        try{
            $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
            $username='admin';
            $password='password';
            $dbh = new PDO($dsn, $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
                $sql = 'SELECT first,fwhere,second,swhere,third,twhere,fourth,fowhere,fifth,fiwhere FROM TIMETABLE where  day_of_week = "月" AND class = :SClass';// エラーが発生する可能性のあるコード
                $stmt=$dbh->prepare($sql);
                $stmt->bindParam(':SClass', $SClass, PDO::PARAM_STR);
                $stmt->execute();
                $jikanMon = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $sql = 'SELECT first,fwhere,second,swhere,third,twhere,fourth,fowhere,fifth,fiwhere FROM TIMETABLE where  day_of_week = "火" AND class = :SClass';// エラーが発生する可能性のあるコード
                $stmt=$dbh->prepare($sql);
                $stmt->bindParam(':SClass', $SClass, PDO::PARAM_STR);
                $stmt->execute();
                $jikanTues = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $sql = 'SELECT first,fwhere,second,swhere,third,twhere,fourth,fowhere,fifth,fiwhere FROM TIMETABLE where  day_of_week = "水" AND class = :SClass';// エラーが発生する可能性のあるコード
                $stmt=$dbh->prepare($sql);
                $stmt->bindParam(':SClass', $SClass, PDO::PARAM_STR);
                $stmt->execute();
                $jikanWednes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                $sql = 'SELECT first,fwhere,second,swhere,third,twhere,fourth,fowhere,fifth,fiwhere FROM TIMETABLE where  day_of_week = "木" AND class = :SClass';// エラーが発生する可能性のあるコード
                $stmt=$dbh->prepare($sql);
                $stmt->bindParam(':SClass', $SClass, PDO::PARAM_STR);
                $stmt->execute();
                $jikanThurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                $sql = 'SELECT first,fwhere,second,swhere,third,twhere,fourth,fowhere,fifth,fiwhere FROM TIMETABLE where  day_of_week = "金" AND class = :SClass';// エラーが発生する可能性のあるコード
                $stmt=$dbh->prepare($sql);
                $stmt->bindParam(':SClass', $SClass, PDO::PARAM_STR);
                $stmt->execute();
                $jikanSatur = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                

            }catch (Exception $e) {
                // エラーハンドリングのコード
                echo "エラーが発生しました: " . $e->getMessage();
            }
        ?>
        <h3><?php echo $SClass ;?></h3>
    <table class="tb" border="3" border-width="1">
        <tr>
            <th class="kado"></th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
        </tr>
            
        <tr>
            <th>1</th> 
            <td><?php echo $jikanMon[0]['first']; ?> <br>
            <?php echo $jikanMon[0]['fwhere']; ?></td>
            <td><?php echo $jikanTues[0]['first']; ?><br>
            <?php echo $jikanTues[0]['fwhere']; ?></td>
            <td><?php echo $jikanWednes[0]['first']; ?><br>
            <?php echo $jikanWednes[0]['fwhere']; ?></td>
            <td><?php echo $jikanThurs[0]['first']; ?><br>
            <?php echo $jikanThurs[0]['fwhere']; ?></td>
            <td><?php echo $jikanSatur[0]['first']; ?><br>
            <?php echo $jikanSatur[0]['fwhere']; ?></td>
        </tr>
        
    
        <tr>
            <th>2</th>
            <td><?php echo $jikanMon[0]['second']; ?><br>
            <?php echo $jikanMon[0]['swhere']; ?></td>
            <td><?php echo $jikanTues[0]['second']; ?><br>
            <?php echo $jikanTues[0]['swhere']; ?></td>
            <td><?php echo $jikanWednes[0]['second']; ?><br>
            <?php echo $jikanWednes[0]['swhere']; ?></td>
            <td><?php echo $jikanThurs[0]['second']; ?><br>
            <?php echo $jikanThurs[0]['swhere']; ?></td>
            <td><?php echo $jikanSatur[0]['second']; ?><br>
            <?php echo $jikanSatur[0]['swhere']; ?></td>
        </tr>
        <tr>
            <th>3</th>
            <td><?php echo $jikanMon[0]['third']; ?><br>
            <?php echo $jikanMon[0]['twhere']; ?></td>
            <td><?php echo $jikanTues[0]['third']; ?><br>
            <?php echo $jikanTues[0]['twhere']; ?></td>
            <td><?php echo $jikanWednes[0]['third']; ?><br>
            <?php echo $jikanWednes[0]['twhere']; ?></td>
            <td><?php echo $jikanThurs[0]['third']; ?><br>
            <?php echo $jikanThurs[0]['twhere']; ?></td>
            <td><?php echo $jikanSatur[0]['third']; ?><br>
            <?php echo $jikanSatur[0]['twhere']; ?></td>
        </tr>
        <tr>
            <th>4</th>
            <td><?php echo $jikanMon[0]['fourth']; ?><br>
            <?php echo $jikanMon[0]['fowhere']; ?></td>
            <td><?php echo $jikanTues[0]['fourth']; ?><br>
            <?php echo $jikanTues[0]['fowhere']; ?></td>
            <td><?php echo $jikanWednes[0]['fourth']; ?><br>
            <?php echo $jikanWednes[0]['fowhere']; ?></td>
            <td><?php echo $jikanThurs[0]['fourth']; ?><br>
            <?php echo $jikanThurs[0]['fowhere']; ?></td>
            <td><?php echo $jikanSatur[0]['fourth']; ?><br>
            <?php echo $jikanSatur[0]['fowhere']; ?></td>
        </tr>
        <tr>
            <th>5</th>
            <td><?php echo $jikanMon[0]['fifth']; ?><br>
            <?php echo $jikanMon[0]['fiwhere']; ?></td>
            <td><?php echo $jikanTues[0]['fifth']; ?><br>
            <?php echo $jikanTues[0]['fiwhere']; ?></td>
            <td><?php echo $jikanWednes[0]['fifth']; ?><br>
            <?php echo $jikanWednes[0]['fiwhere']; ?></td>
            <td><?php echo $jikanThurs[0]['fifth']; ?><br>
            <?php echo $jikanThurs[0]['fiwhere']; ?></td>
            <td><?php echo $jikanSatur[0]['fifth']; ?><br>
            <?php echo $jikanSatur[0]['fiwhere']; ?></td>
        </tr>
    </table>
        
    <link rel="stylesheet" href="../cssfile/timetable.css" text="text/css">
        
</body>
</html>