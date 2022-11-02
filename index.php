<?php
  session_start();
  $massage = "";
  if(isset($_POST['username'], $_POST['password'])) {
    include "./dbconn.php";

    if(preg_match("/admin|select|Union|by|having|substring|substr|from|char|delay|0x|hex|asc|desc|ascii/i", $_POST["username"])) exit("~~filtering~~");
    if(preg_match("/admin|select|Union|by|having|substring|substr|from|char|delay|0x|hex|asc|desc|ascii/i", $_POST["password"])) exit("~~filtering~~");

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "select * from users where id='{$username}' and pw='{$password}';";
    $record = mysqli_query($conn ,$query);
    if(!$record) 
      die(mysqli_error($conn));
    
    $result = mysqli_fetch_array($record);

    if($result) {
      $massage = "query: true";
      if($result["pw"] == $password) {
        $massage = "";
        $_SESSION["username"] = $result["id"];
        if($result["id"] == "admin")
          $_SESSION["flag"] = "POX{4crfcnuo3xb6wy10xwmg0291ukujwjro9}";  
      }
    } 
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
  </head>
  <body>
    <div id="content">
      <?php
        if(isset($_SESSION['username'])) { 
      ?>
          <div id='logout'>
          <?php 
            echo "<h2>{$_SESSION['username']}님 환영합니다!</h2>";
            if(isset($_SESSION["flag"])) echo "<p>{$_SESSION['flag']}</p>";
          ?>
            <button onclick='location.href = `logout.php`;'>로그아웃</button>
          </div>
      <?php 
        } else { 
      ?>
        <div id="login">
          <form id="login_form" action="index.php" method="POST">
            <input type="text" name="username" placeholder="아이디" required>
            <input type="password" name="password" placeholder="비밀번호" required>
            <input type="submit" value="로그인">
          </form>
        </div>
      <?php
        }
        echo "<p class='query'>{$massage}</p>";
      ?>
    </div>
  </body>
</html>
<!-- hint: guest / guest -->