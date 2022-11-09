<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
  </head>
  <body>
    <div id="content">
        <div id="login">
          <form id="login_form" action="index.php" method="GET">
            <input type="text" name="username" placeholder="아이디" required>
            <input type="password" name="password" placeholder="비밀번호" required>
            <input type="submit" value="로그인">
          </form>
          <div id="message">Login to admin account.</div>
        </div>
    </div>
<?php
  ini_set('display_errors', '0');

  if(isset($_GET['username']) || isset($_GET['password'])) {
    include "./dbconn.php";

    if(preg_match("/admin|select|Union|by|having|substring|substr|from|char|delay|0x|hex|asc|desc|ascii/i", $_GET["username"])) exit("~~filtering~~");
    if(preg_match("/admin|select|Union|by|having|substring|substr|from|char|delay|0x|hex|asc|desc|ascii/i", $_GET["password"])) exit("~~filtering~~");

    $username = $_GET["username"];
    $password = $_GET["password"];

    $query = "select * from users where id='{$username}' and pw='{$password}';";
    $result = mysqli_fetch_array(mysqli_query($conn ,$query)) or die(mysqli_error($conn));

    if(isset($result['id'])) {
      if($result["pw"] == $password) {
        if($result["id"] == "admin") {
?>
          <script type="text/javascript">
            document.getElementById("message").innerHTML = "POX{4crfcnuo3xb6wy10xwmg0291ukujwjro9}";
          </script>
<?php
        } else {
?>
          <script type="text/javascript">
            document.getElementById("message").innerHTML = '<?php echo "Hello, {$result['id']}!" ?>';
          </script>
<?php
        }
      } else {
?>
        <script type="text/javascript">
          document.getElementById("message").innerHTML = "query: true";
        </script>
<?php
      }
    } 
  }    
?>
  </body>
</html>