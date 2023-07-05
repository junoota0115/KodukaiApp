
$(function() {
$('button').click(function() {

    var deleteCheker = confirm("本当に削除しますか？");
    if(deleteCheker == true){
    var clickBtn = $(this)
    var dreamID = clickBtn.attr('dream_id')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
    $.ajax({
        type: 'post',
        url: 'dreamDelete',
        data: {'id':dreamID,},
        datatype: 'json',
        async:true,
        cache:false,
    })
    .done(function(data){
        alert("OK");
    })
    .fail(function(jqXHR,textStatus,errorThrown){
        alert("No");
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
    }else{
        (function(e){
            e.preventDefault()
        });
    };

});
});
