
function showNotify(title,message,type){
    if(type != ""){
        $.notify({
            title: '<strong>'+title+'</strong>',
            message: message
        },{
            type: type
        });
    }else{
        $.notify({
            title: '<strong>'+title+'</strong>',
            message: message
        });        
    }
}