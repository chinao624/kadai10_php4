<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

// 1. DB接続
include("funcs.php");
$pdo = db_conn();

// 2. idで取得
$id = $_GET['id'];

// 3. 対象のidのデータ取得
$sql = "SELECT * FROM profile_builder WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
} else {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

// 4. jpegでもpngでもいけるように、ファイルタイプの判別
function getImageType($data) {
    $info = getimagesizefromstring($data);
    if ($info === false) {
        return null;
    }
    return image_type_to_mime_type($info[2]);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Profile</title>
    <link href="./css/sample.css?ver=1.0.2" rel="stylesheet">
    <script src="./js/jquery-2.1.3.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">

    <!-- モーダル追加のためのcss -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
</head>

<body class="profile">
   
<header id="header2">
        <h3>PROFILE</h3>
        <div class="profile_header">
        <p><?=h($row['genre'])?></p>
            <h3><?=h($row['name'])?></h3>
        </div>
    </header>

    <div class="profile_container">
        <div class="profile_image">
            <?php
            $portraitType = getImageType($row['portrait']);
            if ($portraitType == 'image/jpeg') {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['portrait']) . '" alt="portrait">';
            } elseif ($portraitType == 'image/png') {
                echo '<img src="data:image/png;base64,' . base64_encode($row['portrait']) . '" alt="portrait">';
            }
            ?>
        </div>
        <div class="profile_text">
            <p><?=h($row['profile'])?></p>
        </div>
    </div>

    <h4>works</h4>
         <div class="works">
            <?php
            $works1Type = getImageType($row['works1']);
            $works2Type = getImageType($row['works2']);
            $works3Type = getImageType($row['works3']);
            $works4Type = getImageType($row['works4']);
            $works5Type = getImageType($row['works5']);
            ?> 
            <div class="work_image">
                <?php if ($works1Type == 'image/jpeg') {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['works1']) . '" alt="works1">';
                } elseif ($works1Type == 'image/png') {
                    echo '<img src="data:image/png;base64,' . base64_encode($row['works1']) . '" alt="works1">';
                } ?>
            </div>
            <div class="work_image">
                <?php if ($works2Type == 'image/jpeg') {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['works2']) . '" alt="works2">';
                } elseif ($works2Type == 'image/png') {
                    echo '<img src="data:image/png;base64,' . base64_encode($row['works2']) . '" alt="works2">';
                } ?>
            </div>
            <div class="work_image">
                <?php if ($works3Type == 'image/jpeg') {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['works3']) . '" alt="works3">';
                } elseif ($works3Type == 'image/png') {
                    echo '<img src="data:image/png;base64,' . base64_encode($row['works3']) . '" alt="works3">';
                } ?>
            </div>
            <div class="work_image">
                <?php if ($works4Type == 'image/jpeg') {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['works4']) . '" alt="works4">';
                } elseif ($works4Type == 'image/png') {
                    echo '<img src="data:image/png;base64,' . base64_encode($row['works4']) . '" alt="works4">';
                } ?>
            </div>
            <div class="work_image">
                <?php if ($works5Type == 'image/jpeg') {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['works5']) . '" alt="works5">';
                } elseif ($works5Type == 'image/png') {
                    echo '<img src="data:image/png;base64,' . base64_encode($row['works5']) . '" alt="works5">';
                } ?>
            </div>
        </div>
    
    <!-- クリックしたら写真が全部見えるようにしたい -->
    <!-- モーダル追加 ？-->
    <div id="modal" class="modal">
  <span class="close-btn">&times;</span>
  <img class="modal-content" id="modal-img">
</div>

<!-- contact部分 -->
<div class="contact_wrap">
    <p class="contact_title">CONTACT</p>
    <p class="contact_text">Agent: <?=h($row['agent'])?></p>
            <p class="contact_text">Email: <a href="mailto:<?=h($row['email'])?>"><?=h($row['email'])?></a></p>
            <p class="contact_text">URL: <a href="<?=h($row['url'])?>"><?=h($row['url'])?></a></p>
            </div>
    <div class="tobtn"><a href="select.php" class="btn">Back to List</a></div>
           
    <script src="./js/script.js"></script>
</body>
</html>