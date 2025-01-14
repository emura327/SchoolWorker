<!DOCTYPE html>
<html lang="ja">
<head>
    <title>テスト</title>
<meta charset="UTF-8">
</head>
<body>
<?php

    try{
        $dsn='mysql:host=database-2.c3cwkcssqi74.ap-northeast-3.rds.amazonaws.com;dbname=SCHOOL_WORKER;charset=utf8';
        $username='admin';
        $password='password';
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	$sql = 'SELECT student_number,name FROM STUDENT';
        $stmt=$dbh->prepare($sql);
        $stmt->execute();

        $dbh=null;

        while(true){
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false){
            break;
        }
        print $rec['class'];
        print $rec['name'];
    }

    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }

?>

</body>
</html>


