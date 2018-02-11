 $(document).ready(function() {	
//Привет от моего хостера
//$('div').filter( ':last' ).remove();
 	
//авто текст
text_write();
adaptive();

function text_write(){
var text = ['R','E','S','U','M','E'];
var i =0;

setInterval(function(){
$(".dinamik_text").append(text[i]).show('slow');
i++;
	}, 150);
}


var j=0;
setInterval(function(){
	j++;
	$(".cursor").animate({opacity: 0}, 500);
	$(".cursor").animate({opacity: 1}, 500);

	if (j==2000) {
	$(".dinamik_text").empty();
	text_write();
	j=0;
	} 
	
}, 0);

//progressbar
window.onscroll = function() {
	 var scrolled = window.pageYOffset || document.documentElement.scrollTop;
if (scrolled > 700) { 	
	  $(".progress-bar").each(function(){
	    each_bar_width = $(this).attr('aria-valuenow');
	    $(this).width(each_bar_width + '%');
  });
     
}   

if (scrolled < 500) {
		 $(".progress-bar").width(0); 
	}

};

//адаптив
function adaptive() {
	var wight = $(document).width();
	if (wight < 1042) {

		$(".col-6").filter("#mobile").attr("class", "col-12");

		//можно так 40 убрасть 42-43 добавить
		$(".row #mobile:last").addClass("spacing");
		// или
		//$(".row #mobile:first").addClass("spacing");
		//$("#mobile:last").appendTo(".row:first");
		
		} else {
			$(".row #mobile:last").removeClass("spacing");
			$("#mobile:not(karobas)").attr("class", "col-6 ");

	}
	return wight;
}
$(window).on('resize', function() {
	adaptive();
});	


	$(".my_photo").mouseenter( function() {
		$("#dogy").appendTo(".my_photo");
		$("#dogy").animate({opacity: 0}, 1000);
		$("#me").animate({opacity: 1}, 1000);

	});

	$(".my_photo").mouseleave( function() {
		$("#me").appendTo(".my_photo");
		$("#me").animate({opacity: 0}, 1000);
		$("#dogy").animate({opacity: 1}, 1000);
	});


	$("#scroll_to_diploma").click(function(){
		$('html, body').animate({scrollTop:1000},'100%');
	});

	$(".fancybox").fancybox();
	
	// Отправка заявки
	$("#send").click(function() {
	  var text =  $("#subject").val();
	  var mail =  $("#mail").val();
        $.post(
        "tpl/includes/mail.php",
          {
            text: text,
            mail: mail
          },
          onAjaxSuccess
        );
         
        function onAjaxSuccess(data)
        {
          console.log(data);
          $("#anser").append(data);
        }

	});


	$(".closebt, .modal-overflow").click(function(){
		$(".modal-overflow").animate({opacity: 0}, 500).css("display","none");
		$("body").removeClass("body__overflowed");
		$(".modal-header").animate({left: 120+'%'},600);
		$(".modal-body").animate({top: 120+'%'},500);
	});

	$(".modal-show").click(function(){
	
		

		$(".modal-header").css("left","-100%");
		$(".modal-header").css("top","0px");
		//$(".modal-body textarea").css("height","180px");

		if (adaptive() < 1042) {
			var modal_body = $(".modal-body").height();
			console.log(modal_body);
		//	$(".modal-body textarea").css("height","auto");
			
				$(".modal-header").css("left","0px");
				$(".modal-header").css("top","-100%");
				$(".modal-header").animate({top: 0+'%'},1500);
		} else
		$(".modal-header").animate({left: 25+'%'},1500);


		$(".modal-body").animate({top: $('.modal-header').height()+'px'},1000);
		$(".modal-overflow").css("display","block").animate({opacity: 0.7}, 0);
		$("body").addClass("body__overflowed");
	});

});

