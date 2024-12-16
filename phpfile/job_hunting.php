<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cssfile/job_hunting.css" text="text/css" >
    <title>Document</title>
</head>
<body>
    <?php include('header_site.php');?>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <div>
        <form action="/form.php" method="post"></form>
            <ul class = job>
                <li class="company">
                    <label for="name">企業名</label>
                    <input type="text" id="name" name="name" size="80">
                </li>
                <li class="situation">
                    <label for="就活状況">就活状況</label>
                    <select name="就活状況">
                        <option value="">選択してください</option>
                        <option value="briefing_session">説明会</option>
                        <option value="entry">エントリー中</option>
                        <option value="test">適性検査</option>
                        <option value="first_interview">一次面接</option>
                        <option value="second_interview">二次面接</option>
                        <option value="third_interview">三次面接</option>
                        <option value="fourth_interview">四次面接</option>
                        <option value="last_interview">最終面接</option>
                        <option value="interview">面談</option>
                        <option value="offer">内定</option>
                        <option value="refusal">辞退</option>
                    </select>
                </li>
                <li class="remakes">
                    <label for="message">内容</label>
                    <textarea id="message" name="message" size="100" ></textarea>
                </li>
                <input type="submit" value="送信する">
            </ul>
            
        </form>
    </div>
</body>