var settings = [
    {
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
        }
    },
    {
        breakpoint: 600,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        }
    },
    {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            // prevArrow: false,
            // nextArrow: false
        }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
];
$('.event1').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    responsive: settings
});
$('.event2').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    responsive: settings
});
$('.c1').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    responsive: settings
});
$('.c2').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    responsive: settings
});

//---- Blog Readmore
$(document).ready(function () {
    // $(".nav-link").click(function(){
    //     $(".nav-link").removeClass('active');
    //     $(this).addClass('active');
    // });
    $(".readMore").click(function () {
        var __new_element = ".newContentShow" + $(this).data("id");
        var __old_element = ".oldContentShow" + $(this).data("id");
        var __flag = $(this).data('flag');
        if (__flag == "more") {
            $(__old_element).hide();
            $(__new_element).show();
            $(this).text("Read Less");
            $(this).data('flag', 'less');
            //console.log($(this).data('flag'));
        }
        if (__flag == "less") {
            $(__new_element).hide();
            $(__old_element).show();
            $(this).text("Read More");
            $(this).data('flag', 'more');
            //console.log($(this).data('flag'));
        }
    });

    //contact form submit validation
    $('#contactForm').validate({ // initialize the plugin
        rules: {
            name: {
                required: true,                
            },
            email: {
                required: true,
                email: true
                //minlength: 5
            },
            phone: {
                required: true,                
            },
            message: {
                required: true,                
            },
            contact_for: {
                required: true,                
            }
        },
        messages: {
            name: "Please enter your name.",
            email: "Please enter your email address.",
            phone: "Please enter your phone number.",
            message: "Please enter a message.",
            contact_for: "Please choose an option.",
        },
        submitHandler: function (form) { 
            var formObj = {
                name: $("#name").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                country: $("#country").val(),
                message: $("#message").val(),
                contact_for: $("#contact_for").val()
            }
            console.log(formObj);
            var postURL = $("#baseURL").val()+'postContactAJAX'
            $.post(postURL, formObj, function(response){
                console.log(response);
                if(response == "success"){
                    $('#contactForm')[0].reset();
                    $("#success").html("Thank you! We will get back to you soon.");
                }
                else{
                    $("#error").html("Sorry! Something went wrong, try again.");
                }
            });
        }
    });
});