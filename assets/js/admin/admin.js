$(document).ready(function(){

    $(".__eventStatusChange").click(function(){
        var id = $(this).data('id');
        var url = $("#admin_url").data('href')+'updateEventFlag_AJAX';
        var divID = $("#flagID"+id);
        $.get(url,{'id': id},function(data){
            //console.log($(this));
            divID.text(data);
        });
    });
});
