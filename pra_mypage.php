<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
    <title>マイページ練習</title>
    <link rel="stylesheet" type="text/css" href="style.css">
          </head>
<body>
          
<?php
     mb_internal_encoding("utf8");
     $pdo=new PDO("mysql:dbname=tsuru;host=localhost;","root","");
         
    
$stmt=$pdo->prepare("select * from login_mypage where mail=? && password=?");

$stmt->bindValue(1,$_POST["mail"]);
$stmt->bindValue(2,$_POST["password"]);

    
$stmt->execute();
$pdo=NULL;
    
    
    while($row=$stmt->fetch()){
          echo "<h1>".$row["name"]."</h1>";
          echo "<br>";
          echo "<h2>".$row["mail"]."</h2>";
          echo "<br>";
        $image_path="./image/".$row["picture"];
              
          echo "<img src=$image_path>";
          echo "<br>";
          echo "<h3>".$row["comments"]."</h3>";
          }
          ?>
</body>
</html>
        