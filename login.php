<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <?php
  include "./dbconn.php";
  session_start();
  if(preg_match("/admin|or|select|Union|by|having|substring|substr|from|char|delay|0x|hex|asc|desc|ascii|=|-/i", $_POST["userId"])) exit("~~filtering~~");
  if(preg_match("/admin|or|select|Union|by|having|substring|substr|from|char|delay|0x|hex|asc|desc|ascii|=|-/i", $_POST["userPw"])) exit("~~filtering~~");

  $userId = $_POST["userId"];
  $userPw = $_POST["userPw"];

  $query = "select id from users where id='{$userId}' and pw='{$userPw}';";
  $result = mysqli_fetch_array(mysqli_query($conn ,$query));

  $loginMessage = "";
  if($result != null) {
    $_SESSION['userId'] = $result['id'];
    $loginMessage = "로그인에 성공했습니다.";
  } else {
    $loginMessage = "로그인에 실패했습니다.";
  }
?>
  <script>
    alert("<?php echo $loginMessage; ?>");
    location.href = "index.php";
  </script>
</body>
</html>