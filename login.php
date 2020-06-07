<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPEHTML>
<hrml lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログインページ</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <header>
    <img src="4eachblog_logo.jpg">
    <div class="login"><a href="login.php">ログイン</a></div>
    </header>
    
    <main>
    <form action="mypage.php" method="post" enctype="multipart/form-data">
        <div class="log_in">
        <div class="mail">
            <label>メールアドレス</label><br>
            <input type="text" class="formbox" size="60" name="mail" value="<?php if(isset($_COOKIE['mail'])){echo $_COOKIE['mail'];}  ?>" required>
        </div>
        <div class="password">
            <label>パスワード</label><br>
            <input type="password" class="formbox" size="60" name="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>" required>
        </div>
        <div class="log_button">
            <input type="submit" class="submit_button" size="30" value="ログイン">
        </div>
        </div>
        </form>
    </main>
    
    <footer>
    Ⓒ2018 InterNous.Inc.All rights reserved</footer>
    
    </body>
</hrml>