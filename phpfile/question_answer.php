<?php

    session_start();

    $PQNumber = $_POST['question_number'];
    $PAnswer = $_POST['answer'];

    try{
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'UPDATE QUESTION SET answer = :PAnswer, adatetime = now() WHERE question_number = :PQNumber;';

        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':PQNumber', $PQNumber, PDO::PARAM_STR);
        $stmt->bindParam(':PAnswer', $PAnswer, PDO::PARAM_STR);
        $stmt->execute();

        $dbh = null;

        header('Location:question.php');
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
?>