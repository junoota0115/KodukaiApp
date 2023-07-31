let counter = 0;

$('button').click(function() {
counter++;


    $.ajax({
        url: '/data',
        type: 'GET',
        dataType: 'json',
        timeout: 3000,
        
        
    }).done(function ($data){
        if(counter % 2 == 1){
            $(".money-total").text("*******")
        }else{
            $(".money-total").text($data)
        };
        
    });
});

function toggleIcon() {
    var button = document.getElementById("hyouji");
    var icon = button.querySelector("i");//buttonという変数に代入された要素内で最初に見つかる<i>要素を取得。
    
// アイコンのクラスを切り替える
if (icon.classList.contains("fa-eye")) {//icon要素のクラスリストに"fa-eye"というクラスが含まれているかを確認するメソッド
    icon.classList.remove("fa-eye");//もし含まれていれば削除
    icon.classList.add("fa-eye-slash");//fa-eye-slashをその位置に追加
  } else {
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}

// ボタン要素を取得し、クリックイベントにtoggleIcon関数を割り当てる
var buttonElement = document.getElementById("hyouji");
buttonElement.addEventListener("click", toggleIcon);