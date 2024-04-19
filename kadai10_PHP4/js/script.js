$(document).ready(function() {
    $(window).scroll(function() {
        var header = $('#header');
        if ($(this).scrollTop() > 100) { // スクロール量に応じて調整
            header.css('height', '200px'); // 修正: ヘッダーの高さを適切な値に変更
        } else {
            header.css('height', '600px'); // 元の高さに戻す
        }
    });
});



// テキスト部分に文字入力サンプルを入れておく（入れると消えるように）
$(document).ready(function() {
    $("#url").on("input", function() {
      if ($(this).val() !== "") {
        $(this).removeAttr("placeholder");
      } else {
        $(this).attr("placeholder", "http://example.com");
      }
    });
  });

  // // profile.php分
  $(document).ready(function() {
    $(".work_image img").click(function() {
      var imgSrc = $(this).attr("src");
      $("#modal-img").attr("src", imgSrc);
      $("#modal").css("display", "block");
    });
  
    // モーダルウィンドウ閉じる処理
    $(".close-button, #modal").click(function() {
      $("#modal").css("display", "none");
    });
  });

  // 削除の時にアラートで確認

 $(document).ready(function() {
  $(".deletebtn").click(function(e) {
    e.preventDefault(); 
// console.log((".deletebtn").length);

    const id = $(this).data("id");
    const confirmMessage = confirm("データを削除しますか？");

    if (confirmMessage) {
      window.location.href = "delete.php?id=" + id;
    }
  });
});