<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/seitotouroku.css" text="text/css">
    <title>生徒登録</title>
</head>
<body>
<?php include('header_site_teacher.php');?>
</body>
<body>
<form action = "student_registration.php" method = "POST">
  <div class="parent">
    <h1 class="registration">登録</h1>
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
        <td class="a" ><input type="text" name = "student_number[]"></td>
        <td class="a" ><input type="text" name = "class_number[]"></td>
        <td class="a" ><input type="text" name = "name[]"></td>
        <td class="a" ><input type="text" name = "kana[]"></td>
        <td class="a" ><input type="text" name = "telnumber[]"></td>
        <td class="a" ><input type="text" name = "mailaddress[]"></td>
        <td class="a" ><input type="text" name = "password[]"></td>
      </tr>
    </table>
  </div>
  
  <div class="button" >
      <button class="add" type="button" onclick="add()">行追加</button>
      <button class="del" type="button" onclick="del()">行削除</button>
      <button class="touroku" type="submit">登録</button>
  </div>
</form>

  <!--ボタン配置--> 

  <script>
      //繰り返し使うtableだけ先に定数に格納
    const tbl = document.getElementById("tbl");

    //POSTするためのnameの配列作成
    const post = ["student_number[]", "class_number[]", "name[]", "kana[]", "telnumber[]", "mailaddress[]", "password[]"];

    //行追加
    function add(){

    //空の行要素を先に作成tr
    let tr = document.createElement("tr"); 

    //以下、繰り返し処理 
    for(let i=0;i<7;i++){
      let td = document.createElement("td");      //新しいtd要素を作って変数tdに格納
      td.className = "a";
      let inp = document.createElement("input");  //tdに何か追加。ここは例としてinput
      inp.type = 'text';
      inp.name = post[i];
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
  <form action = "student_update.php" method = "POST">
  <div class="parent">
    <h1 class="up">更新</h1>
    <!--table作成とヘッダーだけ先に-->
    <table id="tb2" border="1" style="border-collapse:collapse;">
      <tr>
        <th class="number">学籍番号</th>
        <th class="number2">クラス番号</th>
        <th class="name">名前</th>
        <th class="hurigana">名前(フリガナ)</th>
        <th class="dennwa">電話番号</th>
      </tr>
      <tr>
        <td class="a" ><input type="text" name = "student_number[]"></td>
        <td class="a" ><input type="text" name = "class_number[]"></td>
        <td class="a" ><input type="text" name = "name[]"></td>
        <td class="a" ><input type="text" name = "kana[]"></td>
        <td class="a" ><input type="text" name = "telnumber[]"></td>
      </tr>
    </table>
  </div>

  <!--ボタン配置--> 
  <div class="button" >
      <button class="add" type="button" onclick="add2()">行追加</button>
      <button class="del" type="button" onclick="del2()">行削除</button>
      <button class="update" type="submit">更新</button>
  </div>
</form>

  <script>
      //繰り返し使うtableだけ先に定数に格納
    const tb2 = document.getElementById("tb2");


    //POSTするためのnameの配列作成
    const post2 = ["student_number[]", "class_number[]", "name[]", "kana[]", "telnumber[]"];

    //行追加
    function add2(){

    //空の行要素を先に作成tr
    let tr = document.createElement("tr"); 

    //以下、繰り返し処理 
    for(let i=0;i<5;i++){
      let td = document.createElement("td");      //新しいtd要素を作って変数tdに格納
      td.className = "a";
      let inp = document.createElement("input");  //tdに何か追加。ここは例としてinput
      inp.type = 'text';
      inp.name = post2[i];
      td.appendChild(inp);        //tdにinpを追加
      tr.appendChild(td);         //trにtdを追加
    }

    //完成したtrをtableに追加
    tb2.appendChild(tr);  
    }

    //以下、末尾行削除処理
    function del2(){

      let rw = tb2.rows.length;//行数取得
      if(rw > 2){
        tb2.deleteRow(rw-1);//最終行を指定して削除
      }
    }
  </script>
 
</body>
</html>