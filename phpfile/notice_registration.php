<?php

    $PTitle = $_POST['title'];
    $PNotice = $_POST['notice'];
    $PFDaytime = $_POST['finish_daytime'];
    $PClass = $_POST['class'];
    $PTNumber = $_POST['teacher_number'];

    try{
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO NOtICE (title, notice, post_daytime, post_daytime, finish_daytime, class, teacher_number)
                VALUES (:PTitle, :PNotice, now(), :PFDaytime, :PClass, :PTNumber);';

        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':PTitle', $PTitle, PDO::PARAM_STR);
        $stmt->bindParam(':PNotice', $PNotice, PDO::PARAM_STR);
        $stmt->bindParam(':PFDaytime', $PFDaytime, PDO::PARAM_STR);
        $stmt->bindParam(':PClass', $PClass, PDO::PARAM_STR);
        $stmt->bindParam(':PTNumber', $PTNumber, PDO::PARAM_STR);
        $stmt->execute();

        $dbh = null;
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
?>