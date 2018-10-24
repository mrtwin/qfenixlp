$(document).ready(function(){

// menu active
	// var url=document.location.href;
// $.each($(".nav a"),function(){
// if(this.href==url){$(this).addClass('nav_current');};
// });
   
//burger
	// $('.nav_btn').on('click', function (e) {
	// 	e.preventDefault;
	// 	$('.nav_mini').toggleClass('nav_mini_active');
	// });

	$('.popup').magnificPopup();

	$("form").submit(function() {
		// var name = document.getElementById("name").value;
			var str = $(this).serialize();
		    $.ajax({
		      type: "POST",
		      url: "mail.php",
		      data: str,
		      success: function(msg) {
		        if(msg == 'OK') {
		          result = '<div class="ok">Сообщение отправлено</div>';
		          $("#fields").hide();
		        }
		        else {result = msg;}
		        $('#note').html(result);
		      }
		    });
	    return false;
 	});


	
});	