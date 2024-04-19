<?php
session_start();
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
include "funcs.php";
sschk();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <title>User Resistration</title>
  <link href="./css/sample.css?ver=1.0.1" rel="stylesheet">
  <script src="./js/jquery-2.1.3.min.js"></script>
  
<link href="https://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">
</head>

<body class="loginbody">

<!-- Head[Start] -->
<header class="userheader">
    <?php echo $_SESSION["name"]; ?>さん
    <div class="menu">
    <a href="select.php">Profile List</a>
    <a href="login.php">Login</a>
    <a href="logout.php" class="logoutbtn">Logout</a></div>
    </div>
</header>

<!-- Head[End] -->

<!-- Main[Start] -->
<div class="loginform">
<form method="post" action="user_insert.php" class="login-form">
      <label>User Resistration</label><br>
     <label>Name：<input type="text" name="name"></label><br>
     <label>Login ID：<input type="text" name="lid"></label><br>
     <label>Login PW：<input type="text" name="lpw"></label><br>
     <label>Admin flag：
     General User<input type="radio" name="kanri_flg" value="0">
     Administrator<input type="radio" name="kanri_flg" value="1">
    </label>
    <br>
     <!-- <label>退会FLG：<input type="text" name="life_flg"></label><br> -->
     <input type="submit" value="submit">
</form>
</div>
<!-- Main[End] -->


</body>
</html>
