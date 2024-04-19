<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

session_start();

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM profile_builder";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //true or false

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <title>Artist List</title>
  <link href="./css/sample.css?ver=1.0.1" rel="stylesheet"> 
  <script src="./js/jquery-2.1.3.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">
</head>

<body class="select">
<!-- Head[Start] -->
<header id="header">
<?php echo '<span class="headername">' .$_SESSION["name"].'さん</span>';?>
<h2>Artist List</h2>
     <!-- <img src="header2.jpg" alt="header"> -->
</header>
<!-- Head[End] -->


<!-- Main[Start] -->

    <div class="list_container">
      <?php foreach($values as $value){ ?>
     <div class="list">
     <p><?=h($value["genre"])?></p>
    <?=h($value["name"])?>
    <div class="link">
    <a href="profile.php?id=<?=h($value["id"])?>">show all</a>
    <?php if($_SESSION["kanri_flg"]=="1"){?>
      <a href="#" class="deletebtn" data-id="<?=h($value["id"])?>">delete</a>
    <a href="detail.php?id=<?=h($value["id"])?>">update</a>
    <?php }?>
    </div> 
      </div>
        <?php } ?>
      </div>

<div class="btnwrap">
<div class="tobtn"><a href="logout.php" class="logoutbtn">Logout</a></div>
<div class="tobtn"><a href="index.php" class="btn">Profile Resist</a></div>
<?php if($_SESSION["kanri_flg"]=="1"){?>
  <div class="tobtn"><a href="user.php" class="btn">User Resist</a></div>
  <?php }?>
  
</div>
<!-- Main[End] -->

<script src="./js/script.js"></script>

</body>
</html>
