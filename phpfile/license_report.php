<?php

    session_start();

    $SNumber = $_SESSION['student_number'];
    $PLName = $_POST['license_name'];
    $PGDay = $_POST['getday'];

    try{
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO JOB_HUNTING (student_number, license_name, getday)
                VALUES (:SNumber, :PLName, :PGDay);';

        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':SNumber', $SNumber, PDO::PARAM_STR);
        $stmt->bindParam(':PLName', $PLName, PDO::PARAM_STR);
        $stmt->bindParam(':PGDay', $PGDay, PDO::PARAM_STR);;
        $stmt->execute();

        $dbh = null;
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
?>