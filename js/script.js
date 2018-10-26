$(document).ready(function(){

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