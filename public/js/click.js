let counter = 0;

$('button').click(function() {
counter++;

$.ajax({
    url: '/data',
    type: 'GET',
    dataType: 'json',
    timeout: 3000,


}).done(function ($data){
    if(counter % 2 ==1){
        $(".money-total").text("*******")
     }else{
         $(".money-total").text($data)
     };

});
});
