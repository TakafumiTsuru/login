<?php
mb_internal_encoding("utf8");
session_start();


try{
    $pdo=new PDO("mysql:dbname=tsuru;host=localhost;","root","");
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
}

$stmt=$pdo->prepare("select * from login_mypage where mail=? && password=?");

if(isset($_SESSION['mail'])){
    $_POST['mail']=$_SESSION['mail'];
    $_POST['password']=$_SESSION['password'];
}

$stmt->bindValue(1,$_POST["mail"]);
$stmt->bindValue(2,$_POST["password"]);

$stmt->execute();
$pdo=NULL;

while($row=$stmt->fetch()){
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

$image='./image/'.$_SESSION['picture'];

if(empty($_SESSION['mail']&&['password'])){
    header("Location:login_error.php");
}



setcookie('mail',$_SESSION['mail'],time()+60*60*24*7,'/');
setcookie('password',$_SESSION['password'],time()+60*60*24*7,'/');

 ?>


<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>マイページ</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
</head>

<body>
    <header>
    <img src="4eachblog_logo.jpg">
    <div class="logout"><a href="log_out.php">ログアウト</a></div>
    </header>
    
    <main>
        <form action="mypage_hensyu.php" method="post" enctype="multipart/form-data">
            <div class="form_contents">
                <h2>会員情報</h2>
                <div class="heloo_name">
                    こんにちは！<?php echo $_SESSION['name'] ?>さん
                </div>
                <div class="profile">
                    <div class="left">
                        <div class="picture">
                            <?php echo "<img src='$image'>" ?>
                        </div>
                    </div>
                    <div class="right">    
                        <ul>
                            <li>氏名: <?php echo $_SESSION['name'] ?></li>
                            <li>メール:<?php echo $_SESSION['mail'] ?></li>
                            <li>パスワード:<?php echo $_SESSION['password'] ?></li>
                        </ul>
                    </div>
                </div>
                <div class="comments_button">
                    <div class="comments">
                        <p><?php echo $_SESSION['comments'] ?></p>
                    </div>
                    <input type="hidden" value="<?php echo rand(1,10); ?>" name="form_mypage">
                    <div class="edit">
                        <input type="submit" class="submit_button" size="35" value="編集する">
                    </div>
                </div>
            </div>
        </form>
        </main>
    <footer>Ⓒ2018 InterNous.Inc.All rights reserved</footer>
</body>
</html>   


