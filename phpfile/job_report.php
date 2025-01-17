<?php

    session_start();

    $SNumber = $_SESSION['student_number'];
    $PCName = $_POST['cname'];
    $PPhase = $_POST['phase'];
    $PPday = $_POST['phase_day'];
    $PRemarks = $_POST['remarks'];

    try{
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO JOB_HUNTING (student_number, company_name, phase, phase_day, remarks)
                VALUES (:SNumber, :PCName, :PPhase, :PPday, :PRemarks);';

        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':SNumber', $SNumber, PDO::PARAM_STR);
        $stmt->bindParam(':PCName', $PCName, PDO::PARAM_STR);
        $stmt->bindParam(':PPhase', $PPhase, PDO::PARAM_STR);
        $stmt->bindParam(':PPday', $PPday, PDO::PARAM_STR);
        $stmt->bindParam(':PRemarks', $PRemarks, PDO::PARAM_STR);
        $stmt->execute();

        $dbh = null;
        header('Location:mypage.php');
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
?>