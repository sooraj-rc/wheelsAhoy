$.ajaxSetup({
    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});
$(document).ready(function () {

    //***** View sub-category in popup
    $('.subcategory').click(function () {
        var cat_id = $(this).data('id');
        var cat_name = $(this).data('catname');
        var post_url = 'subcat_list';
        $.ajax({
            url: post_url,
            type: "post",
            data: {
                'cat_id': cat_id,
                'cat_name': cat_name
            },
            success: function (response) {
                $('#subcategoryModal').modal('show');
                $('#subcategoryContents').html(response);
            }
        });
    });

    //***** Add manage category filter popup
    $('.manage_filter').click(function () {
        var cat_id = $(this).data('id');
        var cat_name = $(this).data('catname');
        $('.form-filter')[0].reset();
        $('#filteraddModal').modal('show');
        $('#filter_cat_name').text(cat_name);
        $('#filter_cat_id').val(cat_id);

        var post_url = 'list_filters';
        $.ajax({
            url: post_url,
            type: "post",
            data: {
                'cat_id': cat_id
            },
            success: function (response) {
                //console.log(response);
                $('#filteraddModal').modal('show');
                $('#list_filters').html(response);
            }
        });



    });

    //***** Add filter
    $('#add_filter').click(function (event) {
        event.preventDefault();
        var filter_name = $("#filter_name").val();
        var filter_value = $("#filter_value").val();
        var cat_id = $("#filter_cat_id").val();
        var token = $('input[name=_token]').val();
        var post_url = 'add_filter';
        if ($(".form-filter").valid()) {

            $.ajax({
                url: post_url,
                type: "post",
                dataType: "html",
                data: {
                    'cat_id': cat_id,
                    'filter_id': filter_name,
                    'filter_value': filter_value,
                    '_token': token
                },
                success: function (response) {
                    //console.log(response);
                    //$('.form-filter')[0].reset();
                    $("#filter_value").val("");
                    $("#list_filters").html(response);

                }
            });
        }

        //alert(filter_name);
    });

    // edit filter
    $("#edit_filter").on("click", function () {
        event.preventDefault();
        var filter_name = $("#filter_name_edit").val();
        var filter_value1 = $("#filter_value_edit").val();
        var filter_id = $("#filter_id_edit").val();
        var filter_cat_id = $("#filter_cat_id").val();
        //if ($(".form-filter").valid()) {
        $.ajax({
            url: "edit_filter",
            type: "post",
            data: {
                "cat_id": filter_cat_id,
                "filter_id": filter_id,
                "filter_name": filter_name,
                "filter_value": filter_value1
            },
            success: function (response) {
                $("#list_filters").html(response);
                //$(".form-filter")[0].reset(); 
                $("#add_filter_frm").show();
                $("#edit_filter_frm").hide();
            }
        });
        //}
    });

    //Update category status
    $(".change_cat_status").on("click", function () {
        var cat_id = $(this).data('id');
        var cat_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_cat_status").find("option[value=" + status + "]").attr('selected', true);

        $('#statusModal').modal('show');
        $('#status_cat_name').text(cat_name);
        $('#status_cat_id').val(cat_id);

    });

    // Prevent ente key submit
//    $(window).keydown(function (event) {
//        if (event.keyCode == 13) {
//            event.preventDefault();
//            return false;
//        }
//    });

    //***************************** Manage Location ***************************
    // Populate add country popup
    $("#add_country_id").click(function () {
        $('#addcountryModal').modal('show');
        $(".form-addcountry")[0].reset();
    });

    // Add country form submission
    $("#add_country_submit").click(function (e) {
        e.preventDefault();
        if ($(".form-addcountry").valid()) {
            $(".form-addcountry").submit();
        }
    });

    // Populate edit country popup
    $(".edit_country_id").click(function () {
        var country_id = $(this).data('id');
        var country_name = $(this).data('name');
        var country_code = $(this).data('code');

        $('#editcountryModal').modal('show');
        //$(".form-editcountry")[0].reset();

        $("#country_name_id").val(country_name);
        $("#country_code_id").val(country_code);
        $("#country_id_id").val(country_id);


    });

    // Edit country form submission
    $("#edit_country_submit").click(function (e) {
        e.preventDefault();
        if ($(".form-editcountry").valid()) {
            $(".form-editcountry").submit();
        }
    });

    // Populate add state popup
    $("#add_state_id").click(function () {
        $('#addstateModal').modal('show');
        $(".form-addstate")[0].reset();
    });

    // Add state form submission
    $("#add_state_submit").click(function (e) {
        e.preventDefault();
        if ($(".form-addstate").valid()) {
            $(".form-addstate").submit();
        }
    });


    //Edit state
    // Populate edit country popup
    $(".edit_state_id").click(function () {
        var state_id = $(this).data('id');
        var state_name = $(this).data('state');
        var country_name = $(this).data('country');
        var country_id = $(this).data('countryid');

        $('#editstateModal').modal('show');
        //$(".form-editcountry")[0].reset();

        $("#country_name_id").text(country_name);
        $("#state_id_id").val(state_id);
        $("#state_name_id").val(state_name);
        $("#country_id_id").val(country_id);


    });

    // Edit state form submission
    $("#edit_state_submit").click(function (e) {
        e.preventDefault();
        if ($(".form-editstate").valid()) {
            $(".form-editstate").submit();
        }
    });

    //view sub_sub
    $(".view_sub_sub").click(function () {
        var sub_cat_id = $(this).data("id");
        var divid = "#cat_" + sub_cat_id;
        $.ajax({
            url: "view_sub_sub",
            type: "post",
            data: {
                "sub_cat_id": sub_cat_id
            },
            success: function (response) {
                //alert(response);
                $(divid).html(response);

            }
        });
    });

    //More link category description
    $(".cat_descr").click(function () {
        var descr = $(this).data("descr");
        var catname = $(this).data("name");
        $("#catdescrModal").modal('show');
        $("#descr_cat_name").text(catname);
        $("#descr_details").html(descr);
    });

    //************* data tables
    var table = $("#example1").DataTable();
    
    $('#city_table').DataTable({
        "paging": false,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
    });
    
    //************** MENU HIGHLITER
    var strarr = window.top.location.href;
    var loc = strarr.split("/").reverse();
    var admin_url = $("#admin_url").data('href');
    if (loc[0]) {
        $("[href='" + admin_url + loc[0].split("?")[0] + "']").parents().removeClass("collapse");
        //$("[href='" + admin_url + loc[0].split("?")[0] + "']").addClass("active");
        $("[href='" + admin_url + loc[0].split("?")[0] + "']").parents("li").addClass("active");
    } else {
        $("[href='" + admin_url + "dashboard" + "']").parents("li").addClass("active");
    }
    //************** MENU HIGHLITER

    //************** MANAGE CITY *********************************
    // Populate add city popup
    $("#add_city_id").click(function () {
        $('#addcityModal').modal('show');
        $(".form-addcity")[0].reset();
    });

    // Add city form submission
    $("#add_city_submit").click(function (e) {
        e.preventDefault();
        if ($(".form-addcity").valid()) {
            $(".form-addcity").submit();
        }
    });

    //Populate state when select country
    $("#city_add_country_id").on('change', function () {
        var country_id = $(this).val();
        $.ajax({
            url: "list_state_ajax",
            type: "post",
            data: {
                "country_id": country_id
            },
            success: function (response) {
                //alert(response);
                $("#state_id").html(response);

            }
        });
    });

    // Populate edit city popup
    $(".edit_city_id").click(function () {
        var city_id = $(this).data('id');
        var state_id = $(this).data('stateid');
        var city_name = $(this).data('name');
        var state_name = $(this).data('state');
        var country_name = $(this).data('country');

        $('#editcityModal').modal('show');

        $("#country_name_id").text(country_name);
        $("#state_name_id").text(state_name);
        $("#city_id_id").val(city_id);
        $("#state_id_id").val(state_id);
        $("#city_name_id").val(city_name);
    });

    // Edit state form submission
    $("#edit_city_submit").click(function (e) {
        e.preventDefault();
        if ($(".form-editcity").valid()) {
            $(".form-editcity").submit();
        }
    });
    //************** END MANAGE CITY *********************************

    //************* Manage products *************************************
    //Update category status
    $('#example1 tbody').on('click', '.change_product_status', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#productstatusModal').modal('show');
        $('#status_product_name').text(product_name_name);
        $('#status_product_id').val(product_id);

    });

    $('#example1 tbody').on('click', '.change_custom_status', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#widgetstatus').modal('show');
        $('#widgetstatus #status_product_name').text(product_name_name);
        $('#widgetstatus #status_product_id').val(product_id);

    });

    $('#example1 tbody').on('click', '.change_custompage_status', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#custompagestatus').modal('show');
        $('#custompagestatus #status_product_name').text(product_name_name);
        $('#custompagestatus #status_product_id').val(product_id);

    });

    $('#example1 tbody').on('click', '.change_custompage_listing_status', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#custompagelistingstatus').modal('show');
        $('#custompagelistingstatus #status_product_name').text(product_name_name);
        $('#custompagelistingstatus #status_product_id').val(product_id);

    });

    $('#example1 tbody').on('click', '.change_custompage_menu_status', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#custompagemenustatus').modal('show');
        $('#custompagemenustatus #status_product_name').text(product_name_name);
        $('#custompagemenustatus #status_product_id').val(product_id);

    });

    $('#example1 tbody').on('click', '.change_custompage_menu_status', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#custompagemenustatus').modal('show');
        $('#custompagemenustatus #status_product_name').text(product_name_name);
        $('#custompagemenustatus #status_product_id').val(product_id);

    });

    $('#example1 tbody').on('click', '.custom_menu_name', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#custom_menu_name').modal('show');
        $('#custom_menu_name #status_product_name').text(product_name_name);
        $('#custom_menu_name .put_value').val(product_name_name);
        $('#custom_menu_name #status_product_id').val(product_id);

    });

    $('#example1 tbody').on('click', '.custom_menu_nav', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#custom_menu_nav').modal('show');
        $('#custom_menu_nav #status_product_name').text(product_name_name);
        $('#custom_menu_nav #status_product_id').val(product_id);

    });

    $('#example1 tbody').on('click', '.change_menu_status', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#change_menu_status').modal('show');
        $('#change_menu_status #status_product_name').text(product_name_name);
        $('#change_menu_status #status_product_id').val(product_id);
    });

    $('.custom_menu_name_new').on('click',function (){
        $('#custom_menu_name_new').modal('show');
    });

    $('#example1 tbody').on('click', '.change_team_member_status', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#custompagelistingstatus').modal('show');
        $('#custompagelistingstatus #status_product_name').text(product_name_name);
        $('#custompagelistingstatus #status_product_id').val(product_id);

    });

    $('#example1 tbody').on('click', '.change_career_status', function (){
        var product_id = $(this).data('id');
        var product_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_product_status").find("option[value=" + status + "]").attr('selected', true);

        $('#change_career_status').modal('show');
        $('#change_career_status #status_product_name').text(product_name_name);
        $('#change_career_status #status_product_id').val(product_id);

    });



    // Select all and delete
    $('#select_all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function () {
                this.checked = false;
            });
        }
    });

    $("#multiple_product_delete").click(function () {
        var atLeastOneIsChecked = false;
        $('input:checkbox').each(function () {
            if ($(this).is(':checked')) {
                atLeastOneIsChecked = true;
                // Stop .each from processing any more items
                return false;
            }
        });
        if (atLeastOneIsChecked) {
            if (confirm("Are you sure you want to delete these products ?")) {
                $("#prod_mul_del_frm").submit();
            }
        }
        else {
            alert("Please select atleast one product and delete.");
        }
    });
    //************* Manage Products *************************************    
    //-------------- manage terms of use ----------------

    $(".policy_data_type").click(function () {
        var val = $(this).val();
        //alert(val);
        if (val === "text") {
            $("#policy_text").show();
            $("#policy_pdf").hide();
        }
        else {
            $("#policy_text").hide();
            $("#policy_pdf").show();
        }
    });
    //Update category status
    $("#example1_wrapper").on("click",'.change_policy_status',function () {
        var policy_id = $(this).data('id');
        var policy_name_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_policy_status").find("option[value=" + status + "]").attr('selected', true);

        $('#policystatusModal').modal('show');
        $('#status_policy_name').text(policy_name_name);
        $('#status_policy_id').val(policy_id);

    });
    //-------------- manage terms of use ----------------
    $("#example1_wrapper").on("click",'.popup_content_view',function () {
        var content = $(this).data("content");
        var popup_name = $(this).data("name");
        $("#popupcontentsModal").modal('show');
        $("#popup_name_id").text(popup_name);
        $("#popup_content_id").html(content);
    });


    // subadmin reset password popup
    $("#example1_wrapper").on("click",'.reset_password_edmin',function () {
        var id = $(this).data('id');
        var admin_name = $(this).data('name');
        var contact_email = $(this).data('email');
        var user_name = $(this).data('username');
        //alert(contact_email);
        $("#resetpasswordModal").modal('show');
        $("#id_id").val(id);
        $("#contact_email_id").val(contact_email);
        $("#admin_name").val(admin_name);
        $("#user_name").val(user_name);
        $("#admin_name_id").text(admin_name);


    });

    // subadmin reset password form submit
    $("#sa_reset_pwd_button").click(function () {
        if ($(".sa_reset_pwd_form").valid()) {
            $(".sa_reset_pwd_form").submit();
        }
    });

    //Delete attribute value
    $(".remove_attr_value").click(function () {
        if (confirm('Delete this attribute value?')) {
            var id = $(this).data('id');
            $.ajax({
                url: "delete_attribute_value/" + id,
                type: "get",
                success: function (response) {
                    //alert(response);
                    $("#attr_val_li" + id).hide();

                }
            });
        }
    });

    //add unit popup
    $("#add_unit_id").click(function () {
        $("#addunitModal").modal('show');
    });
    //edit unit popup
    $(".edit_unit_id").click(function () {
        $("#editunitModal").modal('show');
        $("#unit_name").val($(this).data('unit'));
        $("#unit_id").val($(this).data('id'));

    });
    // add unit form submit
    $("#add_unit_button").click(function () {
        if ($(".add_unit_form").valid()) {
            $(".add_unit_form").submit();
        }
    });
    // add unit form submit
    $("#edit_unit_button").click(function () {
        if ($(".edit_unit_form").valid()) {
            $(".edit_unit_form").submit();
        }
    });

    //DATE PICKERS
    //Date picker - for events
    $('#event_date_from').datepicker({
        autoclose: true,
        startDate: new Date(),
        format: "yyyy-mm-dd"
    });
    $('#event_date_to').datepicker({
        autoclose: true,
        startDate: new Date(),
        format: "yyyy-mm-dd"
    });

    $('#from_date_sr').datepicker({
        autoclose: true,
        // startDate: new Date(),
        format: "yyyy-mm-dd"
    });

    $('#to_date_sr').datepicker({
        autoclose: true,
        // startDate: new Date(),
        format: "yyyy-mm-dd"
    });

    //DATE PICKERS
    //Date picker - for promocode
 


    //********** MANAGE SPOTISAN USER LIST *********
    // user details popup
    $('table tbody').on('click', '.user_details_click', function (){
        var id = $(this).data('id');
        var user_name = $(this).data('name');

        $("#userdetailsModal").modal('show');
        $("#user_name_id").text(user_name);
        $("#user_details_id").html('<i class="fa fa-refresh fa-spin"></i>');
        $.ajax({
            url: "user_details/" + id,
            type: "get",
            success: function (response) {
                $("#user_details_id").html(response);
            }
        });
    });

    //Update user status
    $("#example1_wrapper").on("click",'.change_user_status',function () {
        var user_id = $(this).data('id');
        var user_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_user_status").find("option[value=" + status + "]").attr('selected', true);

        $('#userstatusModal').modal('show');
        $('#status_user_name').text(user_name);
        $('#status_user_id').val(user_id);

    });

    //Update user status
    $("#example1_wrapper").on("click",'.useractivationModal',function () {
        var user_id = $(this).data('id');
        var user_name = $(this).data('name');
        var status = $(this).data('status');

        $("#select_user_status_act").find("option[value=" + status + "]").attr('selected', true);

        $('#useractivationModal').modal('show');
        $('#status_user_name_act').text(user_name);
        $('#status_user_id_act').val(user_id);
    });

    //Update user status
    $("#example1_wrapper").on("click",'.change_sellerasbuyer_status',function () {
        var user_id = $(this).data('id');
        var user_name = $(this).data('name');
        var status = $(this).data('status');
        console.log(user_id);
        console.log(user_name);
        console.log(status);
        $("#select_sab_user_status").find("option[value=" + status + "]").attr('selected', true);

        $('#sab_statusModal').modal('show');
        $('#status_sab_user_name').text(user_name);
        $('#status_sab_user_id').val(user_id);

    });

    //Update user type
    $("#example1_wrapper").on("click",'.change_user_type',function () {
        var user_id = $(this).data('id');
        var user_name = $(this).data('name');
        var role_id = $(this).data('roleid');

        $("#select_user_type").find("option[value=" + role_id + "]").attr('selected', true);

        $('#usertypeModal').modal('show');
        $('#type_user_name').text(user_name);
        $('#type_user_id').val(user_id);

    });
    
        //Update product review status
    $("#example1_wrapper").on("click",'.change_review_status',function () {
        //$('#product_review')[0].reset();
        document.getElementById("select_review_status").selectedIndex = "0"
        var review_id = $(this).data('id');
        var product_name = $(this).data('name');
        var review = $(this).data('review');
        var user_name = $(this).data('username');
        var review_status = $(this).data('review_status');
        
        $('#select_review_status option').removeAttr('selected');        
        $("#select_review_status").find("option[value=" + review_status + "]").attr('selected', true);
        console.log(review_status);
        if(review_status == 2)
        {
            $('#commentstxt').show();
        }
        
        $('#type_product_name').text(product_name);
        $('#type_review').text(review);
        $('#type_user_name').text(user_name);
        $('#status_review_id').val(review_id);
        
        $('#change_review_status').modal('show');
    });
    
    
    
    //**********  MANAGE TICKETS  *********
            //Update ticket status
    $("#example1_wrapper").on("click",'.change_ticket_status',function () {
        //$('#product_ticket')[0].reset();
        document.getElementById("select_ticket_status").selectedIndex = "0"
        var ticket_id = $(this).data('id');
        var ticket = $(this).data('ticket');
        var user_name = $(this).data('username');
        var comments = $(this).data('comments');
        var ticket_status = $(this).data('ticket_status');
        
        $('#select_ticket_status option').removeAttr('selected');        
        $("#select_ticket_status").find("option[value=" + ticket_status + "]").attr('selected', true);
        
        $('#type_ticket').text(ticket);
        $('#type_user_name').text(user_name);
        $('#comment').text(comments);
        $('#status_ticket_id').val(ticket_id);
        
        $('#change_ticket_status').modal('show');
    });
    
    
   //********** MANAGE PRODUCT ORDER LIST *********
    //Update user type
    $("#example1_wrapper").on("click",'.change_order_status',function () {
        var user_id = $(this).data('id');
        var user_name = $(this).data('name');
        var order_status = '';
        var order_status = $(this).data('order_status');
        
        if(order_status != '') {
        $("#select_order_status").find("option[value=" + order_status + "]").attr('selected', true);
        }
        else {
        $("#select_order_status").find("option[value='0']").attr('selected', true);
        }
        
        $('#change_order_status').modal('show');
        $('#type_user_name').text(user_name);
        $('#status_order_id').val(user_id);

    });
    
    
    //********** MANAGE SPOTISAN USER LIST *********

    // view terms and condition data
    $("#example1_wrapper").on("click",'.tc_content_view',function () {
        var content = $(this).data("content");
        var title = $(this).data("name");
        $("#tcdetailsModal").modal('show');
        $("#title_id").text(title);
        $("#tc_content_id").html(content);
    });


});
//******* END OF DOCUMENT.READY() ***************//

//For select and type form fields
$(function () {
    //Initialize Select2 Elements - For keywords in product edit page
    $(".select2").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });

    // For attribute names
    $(".attribute_names").select2({
        tags: true
    });

    // For attribute values
    $(".attribute_values").select2({
        tags: true
    });

    // For attending options in manage trade show
    $(".attending_options").select2({
        tags: true
    });

    // For exhibiting options in manage trade show
    $(".exhibiting_options").select2({
        tags: true
    });

    // For multiple unit type
    $(".unit_select").select2({
        tags: true
    });

    // for filter single selection
    $(".filter_name").select2();
});

//Script to create textbox when + is clicked 
var id = $('.clone').length;
var label_id = $('#label_id').val();
var txt_box, data;
$('#button_pro').on('click', '.add', function () {
    var label_id = $('input[name=label_id]').val();
    $(this).remove();
    $.ajax({
        url: '../ajax_footerlinks',
        type: "post",
        data: {'_token': $('input[name=_token]').val(), 'id': id ,'label_id':label_id},
        success: function (data) {
            txt_box = data;
            $("#button_pro").append(txt_box);
            id++;
        }
    });
});

$('#button_pro').on('click', '.remove', function () {
    var parent = $(this).closest('.row').prev().attr("id");
    var parent_im = $(this).closest('.row').attr('id');
    console.log(parent);
    console.log(parent_im);
    $("#" + parent_im).slideUp('medium', function () {
        $("#" + parent_im).remove();
        if ($('#button_pro .add').length < 1) {
            //$(".cloning").last().remove();
            $(".cloning .row").last().append('<button type="button" class="add btn btn-add btn-fm-cn">+</button>');
        }
    });
}); 



//Script to create textbox when + is clicked 
var id = $('.clone').length;
var txt_box, data;
$('#pop_features').on('click', '.add', function () {
    $(this).remove();
    $.ajax({
        url: 'ajax_socialfeed_conditions',
        type: "post",
        data: {'_token': $('input[name=_token]').val(), 'id': id },
        success: function (data) {
            txt_box = data;
            $("#pop_features").append(txt_box);
            id++;
        }
    });
});

$('#pop_features').on('click', '.remove', function () {
    var parent = $(this).closest('.row').prev().attr("id");
    var parent_im = $(this).closest('.row').attr('id');
    $("#" + parent_im).slideUp('medium', function () {
        $("#" + parent_im).remove();
        if ($('#pop_features .add').length < 1) {
            //$(".cloning").last().remove();
            $(".cloning .row").last().append('<button type="button" class="add btn btn-add btn-fm-cn">+</button>');
        }
    });
}); 


//list products when changing category list
$("#cat_change").on("change",function () {
    var id = $(this).val();
    var req_url = $("#request_url").val();
    var url = req_url+'?seller='+$("#seller_id").val()+'&category='+id;
    console.log(url);
    window.location=url;
});

$( "input[name*='event_name_ids']" ).on('change', function() {
    $( "input[name*='event_name_ids']" ).not(this).prop('checked', false);
});

function uniq_code()
{
    var code = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    for( var i=0; i < 6; i++ ) {
        code += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    return code;
}

//Edit faq Category name


$(".edit_category_name").click(function () {

    var category_id = $(this).data('id');
    var category_name = $(this).data('name');
    var category_flag = $(this).data('flag');
    
    $('#editcategoryModal').modal('show');
  
    $("#edit_category_id").val(category_id);
    $("#edit_category_name").val(category_name);
    $("input[name=edit_category_flag][value=" + category_flag + "]").prop('checked', true);
  


});

$("#edit_category_submit").click(function (e) {
    e.preventDefault();
    if ($(".form-editcategory").valid()) {
        $(".form-editcategory").submit();
    }
});


$("#add_faqquestion_id").click(function () {

    $('#addfaq_questionModal').modal('show');
    $(".form-addfaq_question")[0].reset();
});

$("#add_faqquestion_submit").click(function (e) {
    e.preventDefault();
    if ($(".form-addfaq_question").valid()) {
        $(".form-addfaq_question").submit();
    }
});


$(".edit_faqquestion_id").click(function () {
    
    var faq_question_id = $(this).data('id');
    var faq_question = $(this).data('name');
    var faq_answer = $(this).data('code');
    var faq_category = $(this).data('category');

    $('#editfaqquestionModal').modal('show');
    //$(".form-editcountry")[0].reset();
   
    $("#edit_faq_question").val(faq_question);
    $("#edit_faq_answer").val(faq_answer);
    $("#edit_faq_question_id").val(faq_question_id);
    $("#edit_faq_category").val(faq_category);



});

$("#edit_faq_question_submit").click(function (e) {
    e.preventDefault();
    if ($(".form-editfaqquestion").valid()) {
        $(".form-editfaqquestion").submit();
    }
});


$(".edit_event_footer_content").click(function () {


    var edit_footer_id      = $(this).data('id');
    var edit_footer_text    = $(this).data('name');
    var edit_footer_flag    = $(this).data('flag');

    $('#editfooterModal').modal('show');
   
    $("#edit_footer_id").val(edit_footer_id);
    $("#edit_footer_text").val(edit_footer_text);
    $("input[name=edit_footer_flag][value=" + edit_footer_flag + "]").prop('checked', true);
});


$("#edit_footer_submit").click(function(e){

    e.preventDefault();
    if ($(".form-editfootertext").valid()) {
        $(".form-editfootertext").submit();
    }

});




