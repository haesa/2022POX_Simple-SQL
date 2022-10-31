<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Blind SQL Injection</title>
  </head>
  <body>
    <div id="content">
      <?php
        if (isset($_SESSION['userId'])) {
          echo "<div id='logout'>";
          echo "<h2>{$_SESSION['userId']}님 환영합니다!</h1>";
          if($_SESSION["userId"] == "admin") echo "<p>POX{POWER_OF_XX_2022}</p>";
          echo "<button onclick='location.href = `logout.php`;'>로그아웃</button>";
          echo "</div>";
        } else {
      ?>
      <div id="login">
        <form id="login_form" action="login.php" method="POST">
          <input type="text" name="userId" placeholder="아이디" required>
          <input type="password" name="userPw" placeholder="비밀번호" required>
          <input type="submit" value="로그인">
        </form>
      </div>
      <?php 
        }
      ?>
    </div>
  </body>
</html>