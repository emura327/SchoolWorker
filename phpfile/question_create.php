<?php

    session_start();

    $SNumber = $_SESSION['student_number'];
    $PTitle = $_POST['title'];
    $PQuestion = $_POST['question'];
    $PTNumber = $_POST['teacher_number'];

    try{
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO QUESTION (student_number, title, question, qdatetime, teacher_number)
                VALUES (:SNumber, :PTitle, :PQuestion, now(), :PTNumber);';

        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':SNumber', $SNumber, PDO::PARAM_STR);
        $stmt->bindParam(':PTitle', $PTitle, PDO::PARAM_STR);
        $stmt->bindParam(':PQuestion', $PQuestion, PDO::PARAM_STR);
        $stmt->bindParam(':PTNumber', $PTNumber, PDO::PARAM_STR);
        $stmt->execute();

        $dbh = null;

        header('Location:question.php');
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
?>