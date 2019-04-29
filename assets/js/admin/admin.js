$(document).ready(function(){
    //update event status
    $(".__eventStatusChange").click(function(){
        var id = $(this).data('id');
        var url = $("#admin_url").data('href')+'updateEventFlag_AJAX';
        var divID = $("#flagID"+id);
        $.get(url,{'id': id},function(data){
            //console.log($(this));
            divID.text(data);
        });
    });

    //
    $(".link-onoff").on('click', function () {        
        var __field = $(this).attr('name');
        var postURL = $("#admin_url").data('href')+'updateWebsettings_AJAX'
        //console.log(__field);
        $.ajax({
            url: postURL,
            type: "post",
            data: {'__field': __field},
            success: function (data)
            {
                //console.log(data);
            }
        });
    });

    $(".updateChead").on('click', function () {        
        var __flag = $(this).data('name');
        var attr = "input[name="+__flag+"]";
        //alert(attr);
        var __value = $(attr).val();
        //alert(__value);
        var postURL = $("#admin_url").data('href')+'updateContents_AJAX'
        console.log(__flag);
        $.ajax({
            url: postURL,
            type: "post",
            data: {'__flag': __flag, '__value': __value },
            success: function (data)
            {
                alert("Text updated successfully!");
            }
        });
    });

    $('#enQ').DataTable({
        responsive: true
    });

});
