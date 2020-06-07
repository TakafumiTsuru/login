<?php
mb_internal_encoding("utf8");

session_start();
$name=$_SESSION['name'];
$mail=$_SESSION['mail'];
$password=$_SESSION['password'];
$picture=$_SESSION['picture'];
$comments=$_SESSION['comments'];

if(empty($_POST['form_mypage'])){
    header('Location:login_error.php');
}

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>マイページ編集</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
</head>

<body>
    <header>
    <img src="4eachblog_logo.jpg">
    <div class="logout"><a href="log_out.php">ログアウト</a></div>
    </header>
    
    <main>
        <form action="mypage_update.php" method="post" enctype="multipart/form-data">
            <div class="form_contents">
                <h2>会員情報</h2>
                <div class="heloo_name">
                    こんにちは！<?php echo $name; ?>さん
                </div>
                <div class="profile">
                    <div class="left">
                        <div class="picture">
                            <?php 
                            $image="./image/".$picture;
                            echo "<img src='$image'>"; ?>
                        </div>
                    </div>
                    <div class="right">    
                        <ul>
                            <li>氏名:<input type="text" class="formbox" size="40" name="name" value=<?php echo $name; ?> required></li>
                            <li>メール:<input type="text" class="formbox" size="40" name="mail" value=<?php  echo $mail; ?> required></li>
                            <li>パスワード:<input type="text" class="formbox" size="40" name="password" value=<?php echo $password; ?> required></li>
                        </ul>
                    </div>
                </div>
                <div class="comments_button">
                    <div class="comments">
                        <p><input type="text" class="formbox" size="40" name="comments" value=<?php echo $comments; ?> required></p>
                    </div>
                    <div class="edit">
                        <input type="submit" class="submit_button" size="35" value="この内容に変更する">
                    </div>
                </div>
            </div>
        </form>
        </main>
    <footer>Ⓒ2018 InterNous.Inc.All rights reserved</footer>
</body>
</html>   


