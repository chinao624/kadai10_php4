<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
// ↑エラー内容を表示してくれる魔法の言葉

//1. POSTデータ取得

$name = $_POST["name"];
$genre = $_POST["genre"];
$profile = $_POST["profile"];
$url = $_POST["url"];
$agent = $_POST["agent"];
$email = $_POST["email"];

//portrait画像データについての取得
$portraitTmpName = $_FILES["portrait"]["tmp_name"]; // ファイルの一時的な場所
$portraitName = $_FILES["portrait"]["name"];
$portraitData = file_get_contents($portraitTmpName);

// var_dump($_FILES);
// exit();

// works1の画像データについての取得
$works1TmpName = $_FILES["works1"]["tmp_name"]; // ファイルの一時的な場所
$works1Name = $_FILES["works1"]["name"];
$works1Data = file_get_contents($works1TmpName);

// works2の画像データについての取得
$works2TmpName = $_FILES["works2"]["tmp_name"]; // ファイルの一時的な場所
$works2Name = $_FILES["works2"]["name"];
$works2Data = file_get_contents($works2TmpName);

// works3の画像データについての取得
$works3TmpName = $_FILES["works3"]["tmp_name"]; // ファイルの一時的な場所
$works3Name = $_FILES["works3"]["name"];
$works3Data = file_get_contents($works3TmpName);

// works4の画像データについての取得
$works4TmpName = $_FILES["works4"]["tmp_name"]; // ファイルの一時的な場所
$works4Name = $_FILES["works4"]["name"];
$works4Data = file_get_contents($works4TmpName);

// works5の画像データについての取得
$works5TmpName = $_FILES["works5"]["tmp_name"]; // ファイルの一時的な場所
$works5Name = $_FILES["works5"]["name"];
$works5Data = file_get_contents($works5TmpName);


//2. DB接続します　PHPの構文　これはこのまま使ってOK
include("funcs.php"); //外部ファイル読み込み
$pdo = db_conn();


//３．データ登録SQL作成
$sql = "INSERT INTO profile_builder(name,genre,profile,portrait,works1,works2,works3,works4,works5,url,agent,email)
VALUES(:name,:genre,:profile,:portrait,:works1,:works2,:works3,:works4,:works5,:url,:agent,:email);";

$stmt = $pdo->prepare($sql);
// bind変数を使って、危ない文字がないかクリーニングして、VALUEに渡す
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（文字列の場合 PDO::PARAM_STR)
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);  
$stmt->bindValue(':profile', $profile, PDO::PARAM_STR);  
$stmt->bindValue(':portrait', $portraitData, PDO::PARAM_LOB);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':works1', $works1Data, PDO::PARAM_LOB);  
$stmt->bindValue(':works2', $works2Data, PDO::PARAM_LOB);  
$stmt->bindValue(':works3', $works3Data, PDO::PARAM_LOB);  
$stmt->bindValue(':works4', $works4Data, PDO::PARAM_LOB);  
$stmt->bindValue(':works5', $works5Data, PDO::PARAM_LOB); 
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  
$stmt->bindValue(':agent', $agent, PDO::PARAM_STR);   
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  

$status = $stmt ->execute();


//４．データ登録処理後
if($status==false){
    // SQL実行時にエラーがある場合
    $error = $stmt->errorInfo();
    $errorMessage = "SQL_ERROR: " . $error[2];
    exit($errorMessage);
} else {
    // リダイレクト前にセッションを開始する
    session_start();
    // index.phpへリダイレクト
    header("Location: index.php");
    exit();
}


?>
