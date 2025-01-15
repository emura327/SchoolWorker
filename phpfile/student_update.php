<?php

    $PSNumber = $_POST['student_number'];
    $PCNumber = $_POST['class_number'];
    $PName = $_POST['name'];
    $PKana = $_POST['kana'];
    $PTNumber = $_POST['telnumber'];

    $count = count($PSNumber);

    for($i=0;$i<$count;$i++){
        $ANumber[$i] = substr($PCNumber[$i],0,4);
    }

    try{
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        for($i=0;$i<$count;$i++){
    	    $sql = 'UPDATE STUDENT SET class_number = :PCNumber, name = :PName, kana = :PKana, mailaddress = :PMailaddress, telnumber = :PTNumber, WHERE student_number = :PSNumber;'
            $stmt=$dbh->prepare($sql);
            $stmt->bindParam(':PSNumber', $PSNumber[$i], PDO::PARAM_INT);
            $stmt->bindParam(':PCNumber', $PCNumber[$i], PDO::PARAM_STR);
            $stmt->bindParam(':PName', $PName[$i], PDO::PARAM_STR);
            $stmt->bindParam(':PKana', $PKana[$i], PDO::PARAM_STR);
            $stmt->bindParam(':PTNumber', $PTNumber[$i], PDO::PARAM_STR);
            $stmt->bindParam(':ANumber', $ANumber[$i], PDO::PARAM_STR);

            $stmt->execute();
        }

        $dbh=null;

    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
?>