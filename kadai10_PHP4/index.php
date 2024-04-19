<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <title>Create Portfolio</title>
  <link href="./css/sample.css?ver=1.0.1" rel="stylesheet">
  <script src="./js/jquery-2.1.3.min.js"></script>
  
<link href="https://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">
</head>

<body>

<!-- Head[Start] -->
<header id="header">
<h1>PROFILE BUILDER</h1>
     <img src="header.png" alt="header">
</header>

<!-- Head[End] -->

<!-- Main[Start] -->
<!-- formタグでくくっている中身だけが飛んでいく -->
<div class=container>
    <h3>Register your profile</h3>
    <form id ="wrap" action="insert.php" method="post" enctype="multipart/form-data">

    <div>
                <label for="name" class="spacer">Name</label>
                <input type="text" name="name">
            </div>

    <div>
    <label for="genre" class="spacer">Genre</label>
            <select id="genre" name="genre">
                <option value="">select genre</option>
                <option value="stylist">stylist</option>
                <option value="photographer">photographer</option>
                <option value="hairmake">hair&make-up</option>
            </select>
    </div>        

    <div>
            <label for="profile">Profile</label><br>
        <textarea name="profile" rows="7" cols="50"></textarea>
        </div>

        <div>
                <label for="portrait" class="spacer">Portrait</label>
                <input type="file" name="portrait">
            </div>

            <div>
                <label for="works" class="spacer">Works</label><br>
                <input type="file" name="works1">
                <input type="file" name="works2"><br>
                <input type="file" name="works3">
                <input type="file" name="works4">
                <input type="file" name="works5">
                <label for="url" class="sublabel2">more works</label>
                <input id="url" name="url" type="text" placeholder="https://example.com">
            </div>

           <div class="contact">
            <label for="contact">Contact</label><br>
            <label for="agent" class="sublabel">Agency</label>
                <input id ="agent" name="agent" type="text" />
                <label for="email" class="sublabel2">Email</label>
                <input id ="email" name="email" type="text" />
            </div>
       
     

            <div class="save_btn"><button id="save" type="submit">SAVE</button></div>
    </form>
    
    <div class="tobtn"><a href="select.php" class="btn">Profile List</a></div>
    </div>



<!-- Main[End] -->

<script src="./js/script.js"></script>
</body>
</html>
