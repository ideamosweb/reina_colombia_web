//  ========== 
//  = Custom JS and jQuery = 
//  ========== 

$(document).ready(function() {

	//Hide errors in contact form
	$('.error').hide();
    
    //  ========== 
    //  = Tweet loader = 
    //  ========== 
    if ($(".tweet-container").length > 0) {
        $(".tweet-container").tweet({
            username: "reinasjgomez",
            join_text: "auto",
            count: 3,
            auto_join_text_default: "we said,",
            auto_join_text_ed: "we",
            auto_join_text_ing: "we were",
            auto_join_text_reply: "we replied to",
            auto_join_text_url: "we were checking out",
            loading_text: "loading tweets...",
            template: '{avatar} <strong>@{user}</strong> {text} {time} <span class="bolded-line"></span>'
        });
    }
    
    
    //  ========== 
    //  = Smooth scroll to the top of the page = 
    //  ========== 
    $("#to-the-top").click(function(e) {
        e.preventDefault();
        $("html, body").animate({ 'scrollTop' : 0 }, 2000);
    });
    
    
    //  ========== 
    //  = Carousel = 
    //  ==========
    
	$(".carousel .slide").each(function(index, elm) {
		var $this = $(this);
		$this.css({
			width : $this.parent().parent().width()
		})
	});
    
    $(window).load(function() {
    	$(".carousel").each(function(index, elm) {
	        $(elm).carouFredSel({
	            auto : {
	                play : false,
	            },
	            prev : {
	                button : $(elm).parent().find(".nav-left"),
	            },
	            next : {
	                button : $(elm).parent().find(".nav-right"),
	            }
	        });
	    });
    });
	    
    
    //  ========== 
    //  = Revolution Slider = 
    //  ========== 
    if ($(window).width() > 767) {
    	var $mainSlider = $(".fullwidthbanner").revolution({    
	        delay:8000,                                                
	        startheight:530,                            
	        startwidth:1500,
	        
	        navigationType:"none",                  
	        navigationArrows:"none",        
	        touchenabled:"on",                      
	        onHoverStop:"off",                        
	        
	        navOffsetHorizontal:0,
	        navOffsetVertical:20,
	        
	        hideCaptionAtLimit:0,
	        hideAllCaptionAtLilmit:0,
	        hideSliderAtLimit:0,
	        
	        stopAtSlide:-1,
	        stopAfterLoops:-1,
	        
	        shadow:1,
	        fullWidth:"on"    
	    });
	    
	    $("#slider-nav-left").click(function() {
	        $mainSlider.revprev();
	    });
	    $("#slider-nav-right").click(function() {
	        $mainSlider.revnext();
	    });
	    
	    $mainSlider.bind("revolution.slide.onchange", function(e, data) {
	        var slideIndex = data.slideIndex;
	        var customCaption = $(".fullwidthbanner ul li:nth-child(" + slideIndex + ") .custom-cap").text();
	        $("#custom-caption-container").html(customCaption);
	        
	    });
    } else {
    	$(".fullwidthbanner-container").css({
    		"backgroundImage" : 'url(' + $(".fullwidthbanner-container").find("li:first-child img").attr("src") + ')'
    	});
    	$(".fullwidthbanner-container .fullwidthbanner").hide();
    }
	    
    
    
    //  ========== 
    //  = Collapse / accordion = 
    //  ========== 
    
    $(".accordion-body").parent().find(".accordion-heading a").click(function(e) {
    	e.preventDefault();
    	var target = $(this).attr("href");
    	$(target).slideToggle();
    	$(this).parent().toggleClass("open");
    });
    
    
});

function validate_contact(){
	jQuery('.error').hide();

	var name = $('#inpt-name').val();
	var phone = $('#inpt-phone').val();
	var intRegex = /^\d+$/;
	var email = $('#inpt-email').val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var msg = $('#txtarea').val();

	if(name == ""){
		$("span#name_error").show();
        $("#inpt-name").focus();
        return false;
	}

	if(phone == ""){
		$("span#phone_error").show();
        $("#inpt-phone").focus();
        return false;
	}

	if(!intRegex.test(phone)) {
	   $("span#phone_error2").show();
       $("#inpt-phone").focus();
       return false;
	}

	if(email == ""){
		$("span#email_error").show();
        $("#inpt-email").focus();
        return false;
	}


	if(!emailReg.test(email)) {
	  $("span#email_error2").show();
	  $("inpt-email").focus();
	  return false;
	}

	if(msg == ""){
		$("span#name_error").show();
        $("#txtarea").focus();
        return false;
	}

	var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone + '&msg=' + msg;
		//alert (dataString);return false;
		
	$.ajax({
      type: "POST",
      url: "contact_process.php",
      data: dataString,
      success: function(data) {
      	//alert(data);
        $('#contactform').html("<div id='message'></div>");
        $('#message').html("<strong>Datos enviados satisfactoriamente!</strong>")
        .append("<p>Estaremos en contacto muy pronto.</p>")
        .hide()
        .fadeIn(1500, function() {
          $('#message');
        });
      }
    });
    return false;
}
