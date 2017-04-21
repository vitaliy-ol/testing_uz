var files,
    namefile = Number(new Date().getFullYear() + '' + new Date().getMonth() + '' + new Date().getDate() + '' + new Date().getHours() + '' + new Date().getMinutes() + '' + new Date().getSeconds()),
    data = new FormData();

$('input[type=file]').change(function() {
    files = this.files;
 
    $.each( files, function( key, value ){
        data.append( key, value );
    });
    
    $.ajax({
        url: '../php/upload.php?namefile='+namefile,
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(respond, textStatus){
            $('input[type=hidden]').val(respond.replace('../', ''));
        }
    });
});