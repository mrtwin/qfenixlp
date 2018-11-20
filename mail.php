<?php
$post = (!empty($_POST)) ? true : false;
if($post) {
	$formType = $_POST['formType'];
	$clientEmail = (!empty($_POST['clientEmail'])) ? $_POST['clientEmail'] : "";
	//$clientEmail = $_POST['clientEmail'];
	$clientName = $_POST['clientName'];
	$error = '';
	// $email_to = "info@qfenix.ru";
	$email_to = "weblapa@yandex.ru";
	$email = "info@weblapa.ru";
	$sub = "Сообщение с сайта.";
	$mes = "";
	
	if(strlen($clientName)<2) {$error .= 'Слишком короткое имя. ';}
	
 	// if ($formType != "brif"){
	// 	$message = $_POST['message'];
	// }
	$message = $_POST['message'];

 	//====================================  	            
	if($formType == "sendMsg"){
		if(!$clientEmail) {$error .= 'Укажите электронную почту. ';}
		if(!$message || strlen($message) < 10) {$error .= 'Слишком короткое сообщение. ';}
	}   
 	//====================================  
	if($formType == "getSite"){
		$siteType = $_POST['siteType'];
        if(!$siteType) {$error .= 'Укажите пакет услуг. ';}
		// $clientPhone = $_POST['clientPhone'];
		// if(!$clientPhone || strlen($clientPhone) < 10) {$error .= 'Неверный формат номера телефона. ';} //проверка длины на стороне клинета
		// if(!$message || strlen($message) < 20) {$error .= 'Маловато требований к сайту. ';}
	}
	
 	//============== send e-mail======================
	if(!$error) {
		if($formType == "getSite"){
			$mes = "Имя: ".$clientName."\n\nОт: " .$clientEmail."\n\nТема: " .$sub." Заказ\n\nВид сайта: ".$siteType."\n\nПожеланияк сайту: ".$message."\n\n";
		}
		if($formType == "sendMsg"){
			$mes = "Имя: ".$clientName."\n\nОт: " .$clientEmail."\n\nТема: " .$sub."\n\nСообщение: ".$message."\n\n";
		}
		// if($formType == "brif"){
		// 	foreach($_REQUEST as $k=>$v) {
		// 		${"$k"}=$v;
		// 		$mes = $mes."\n\n"."$k: ".$$k;
				
		// 	}
		// 	// 	$array = isset($_POST['brifFieldName']) ? $_POST['brifFieldName'] : '';
			
		// 	// if (!empty($array))
		// 	// {
		// 	// 	foreach ($array as $a)
		// 	// 	{
		// 	// 		echo "<span style=\"color:orange\">".htmlentities($a)." </span>";
		// 	// 	}
		// 	// }
		// }
	    $send = mail ($email_to,$sub,$mes,"Content-type:text/plain; charset = UTF-8\r\nFrom:$email");
	    
	    if($send) {echo 'OK';}
	}
	else {echo '<div class="error">'.$error.'</div>';}
	
  
    
}
?>