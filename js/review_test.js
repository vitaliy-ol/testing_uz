$('select[name=position]').change(function() {
    if($(this).val() == 0){
        location.href = document.location.origin + document.location.pathname;
    }else{
        location.href = document.location.origin + document.location.pathname + '?test_id=' + $(this).val();   
    }
});

$('.delete-test, .delete-question').click(function() {
    var id = Number($(this).data('id')),
        flag = $(this).data('flag');
    
    $(this)
        .prop('disabled', true)
        .text('Почекайте...');
    
    $.ajax
        ({
            url: "../php/deleteTest.php",
            type: "post",
            data: 
            { 
                flag: flag,
                id: id
            },
            cache: false,
            success: function(msg){
                if(msg == 'complete'){
                    if(flag == 'dt'){
                        location.href = document.location.origin + document.location.pathname;   
                    }else if(flag == 'dq'){
                        location.reload();
                    }
                }
            }
    });

});