<?php

    $PSNumber = $_POST['student_number'];
    $PCNumber = $_POST['class_number'];
    $PClass = $_POST['class'];
    $PName = $_POST['name'];
    $PKana = $_POST['kana'];
    $PMailaddress = $_POST['mailaddress'];
    $PTNumber = $_POST['telnumber'];

    try{
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	$sql = 'INSERT INTO STUDENT (student_number, class_number, name, kana, mailaddress, telnumber, job, miss_number, class)
        VALUES (:PSNumber, :PCNumber, :PClass, :PName, :PKana, :PMailaddress, :PTNumber);';
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':PSNumber', $PSNumber, PDO::PARAM_INT);
        $stmt->bindParam(':PCNumber', $PCNumber, PDO::PARAM_STR);
        $stmt->bindParam(':PClass', $PClass, PDO::PARAM_STR);
        $stmt->bindParam(':PName', $PName, PDO::PARAM_STR);
        $stmt->bindParam(':PKana', $PKana, PDO::PARAM_STR);
        $stmt->bindParam(':PMailaddress', $PMailaddress, PDO::PARAM_STR);
        $stmt->bindParam(':PTNumber', $PTNumber, PDO::PARAM_STR);

        $stmt->execute();

        $dbh=null;

    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
?>