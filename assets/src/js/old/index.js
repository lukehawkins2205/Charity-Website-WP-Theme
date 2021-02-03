
const AOS = require('aos');
const bodyScrollLock = require('body-scroll-lock');


function detectIE() {
  var ua = window.navigator.userAgent;

  var msie = ua.indexOf('MSIE ');
  if (msie > 0) {
    // IE 10 or older => return version number
    return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
  }

  var trident = ua.indexOf('Trident/');
  if (trident > 0) {
    // IE 11 => return version number
    var rv = ua.indexOf('rv:');
    return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
  }

  var edge = ua.indexOf('Edge/');
  if (edge > 0) {
    // Edge (IE 12+) => return version number
    return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
  }

  // other browser
  return false;
}



$(document).ready(function(){
                $('#myemailform').on('submit', function(e){
                   
                    e.preventDefault();

                  var ajaxurl = $('#input-ajax').val();

                  var data = {
                'action': 'cvf_send_message',
                'name': $('#input-name').val(),
                'email': $('#input-email').val(),
                'message': $('#input-message').val()
                  };

                    var email = $('#email').val();
                    $.ajax({
                        type: "POST",
                        url: ajaxurl,
                        data: data,
                        success: function(data){
                            $('.join-email-success').css({'display': 'block'});
                            $('#input-name').prop('disabled', true).val('');
                            $('#input-email').prop('disabled', true).val('');
                            $('#input-message').prop('disabled', true).val('');
                            $('#input-submit').prop('disabled', true)
                        }
                    });
                });


    $('#eventInterestForm').on('submit', function(e){
        
        e.preventDefault();

        var ajaxurl = $('#input-ajax').val();

        let firstname = $('#input-first-name').val()
        let lastname = $('#input-last-name').val()

        let fullname = `${firstname} ${lastname}`;


        var data = {
            'action': 'cvf_send_message',
            'name': fullname,
            'event': $('#input-event').val(),
            'email': $('#input-email').val(),
            'moreInfo': $('#event-input-message').val()
        };

        console.log('the returned data', data)

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: data,
            success: function(data){
                $('.join-email-success').css({'display': 'block'});
                $('#input-submit').css({'display': 'none'});
                $('#event-input-message').css({'display': 'none'});
            }
        });
    });

});


module.exports = {
    /* Set the width of the side navigation to 250px */
     openNav: function openNav() {
        document.getElementById("mySidenav").style.left = "0px";
        document.getElementById("overlay").style.display = "block";
        const targetElement = document.querySelector('#mySidenav');
        bodyScrollLock.disableBodyScroll(targetElement);
        $('#overlay').click(function(){
            window.onCloseNav()
        });
    },
    /* Set the width of the side navigation to 0 */
    closeNav: function closeNav() {
    const targetElement = document.querySelector('#mySidenav');
    bodyScrollLock.enableBodyScroll(targetElement);
    document.getElementById("mySidenav").style.left = "-250px";
    document.getElementById("overlay").style.display = "none";
    },
    goBack: function goBack() {
        window.history.back();
    },
    onScrollUp: function onScrollUp(){
    window.scrollTo(0, 0);
}

}



$(document).ready(function() {


//title auto size
//jQuery("#title2").fitText(0.8);
//jQuery("#title3").fitText(1.0, { maxFontSize: '43px' });

    //Initialize animation
    AOS.init({disabled: true});
    AOS.refresh();


    var version = detectIE();

    if (version === false) {
       // console.log('Browser: Chrome/Moz/safari');
    } else if (version >= 12) {
        console.log('Browser: Edge');
        $("#navbar").removeClass('navbar');
        $("#navbar").addClass('navbar-IE');
        $("#navbar-cont").addClass('navbar-cont');
        $("#header-menu").addClass('header-menu');
        $(".head-wrap").addClass('head-wrap-IE');
    } else {
        console.log('Browser: IE', version);
        $("#navbar").removeClass('navbar');
        $("#navbar").addClass('navbar-IE');
        $("#navbar-cont").addClass('navbar-cont');
        $(".header-menu").css({'top': '13px'})
        $(".head-wrap").addClass('head-wrap-IE');
        $(".wm-image-wrap").css({'-ms-transform': 'translate(-50%)', 'left': '50%'})
        $(".login-icon").css({'padding-top': '24px', 'margin-right': '0px'})
    }


})






//strink header
$(document).on("scroll", function(){

    if ($(document).scrollTop() > 10){
        $("#nav-logo").addClass("nav-logo-scrolled");
        $("#nav-logo").removeClass("nav-logo");
    } else {
        $("#nav-logo").removeClass("nav-logo-scrolled");
        $("#nav-logo").addClass("nav-logo");
    }



    if ($(document).scrollTop() > 1000){
        $(".scroll-up-icon").css({'display': 'block'})
    } else {
         $(".scroll-up-icon").css({'display': 'none'})
    }
    
});




