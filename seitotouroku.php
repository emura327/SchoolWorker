<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/seitotouroku.css" text="text/css">
    <title>生徒登録</title>
</head>
<body>
<?php include('header_site.php');?>
</body>
<body>
<form action = "student_registration.php" method = "POST">
  <div class="parent">
    <!--table作成とヘッダーだけ先に-->
    <table id="tbl" border="1" style="border-collapse:collapse;">
      <tr>
        <th class="number">学籍番号</th>
        <th class="number2">クラス番号</th>
        <th class="name">名前</th>
        <th class="hurigana">名前(フリガナ)</th>
        <th class="dennwa">電話番号</th>
        <th class="mail">メールアドレス</th>
        <th class="pass">パスワード</th>
      </tr>
      <tr>
        <td class="a" name = "student_number"><input type="text"></td>
        <td class="b" name = "class_number"><input type="text"></td>
        <td class="c" name = "name"><input type="text"></td>
        <td class="d" name = "kana"><input type="text"></td>
        <td class="e" name = "telnumber"><input type="text"></td>
        <td class="f" name = "mailaddress"><input type="text"></td>
        <td class="g" name = "password"><input type="text"></td>
      </tr>
    </table>
  </div>
</from>

  <!--ボタン配置--> 
  <div class="button" >
      <button class="add" onclick="add()">行追加</button>
      <button class="del" onclick="del()">行削除</button>
      <button class="touroku" type="submit">登録</button>
  </div>

  <script>
      //繰り返し使うtableだけ先に定数に格納
    const tbl = document.getElementById("tbl");


    //行追加
    function add(){

    //空の行要素を先に作成tr
    let tr = document.createElement("tr"); 

    //以下、繰り返し処理 
    for(let i=0;i<7;i++){
      let td = document.createElement("td");      //新しいtd要素を作って変数tdに格納
      td.className = "a";
      let inp = document.createElement("input");  //tdに何か追加。ここは例としてinput
      td.appendChild(inp);        //tdにinpを追加
      tr.appendChild(td);         //trにtdを追加
    }

    //完成したtrをtableに追加
    tbl.appendChild(tr);  
    }

    //以下、末尾行削除処理
    function del(){

      let rw = tbl.rows.length;//行数取得
      if(rw > 2){
        tbl.deleteRow(rw-1);//最終行を指定して削除
      }
    }
  </script>
  
    
 
</body>
</html>