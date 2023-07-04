$('button').click(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var deleteCheker = confirm("本当に削除しますか？");
    if(deleteCheker == true){
    var clickBtn = $(this)
    var dreamID = clickBtn.attr('dream_id')

        
    $.ajax({
        url: 'dreamDelete',
        type: 'POST',
        data: {_token: csrfToken,
            'id':dreamID,},
        dataType: 'json',
        timeout: 3000,
        
    })
    .done(function(data){
        alert("OK");
    })
    .fail(function(){
        alert("No");
    });

    }else{
        (function(e){
            e.preventDefault()
        });
    };

});