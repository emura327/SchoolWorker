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
    <div>
        <form action="job_report.php" method="post">
            <ul class = job>
                <li class="company">
                    <label for="name">企業名</label>
                    <input type="text" id="name" name="cname" class="co">
                </li>
                <li class="situation">
                    <label for="phase" id="text">就活状況</label>
                    <select name="phase" id="phase">
                        <option value="">選択してください</option>
                        <option value="説明会">説明会</option>
                        <option value="エントリー中">エントリー中</option>
                        <option value="適性検査">適性検査</option>
                        <option value="一次面接">一次面接</option>
                        <option value="二次面接">二次面接</option>
                        <option value="三次面接">三次面接</option>
                        <option value="四次面接">四次面接</option>
                        <option value="最終面接">最終面接</option>
                        <option value="面談">面談</option>
                        <option value="内定">内定</option>
                        <option value="辞退">辞退</option>
                    </select><br>
                    <label for="phase_day" class="date">日付</label>
                    <input type="date" id="phase_day" name="phase_day">
                </li>
                <li class="remakes">
                    <label for="message">内容</label>
                    <textarea id="message" name="remarks" size="100" ></textarea>
                </li>
                <input type="submit" value="送信する"class="example">
            </ul>
            
        </form>
    </div>
</body>