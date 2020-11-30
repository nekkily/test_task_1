<!doctype html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<title>Comments</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	
	<script src="assets/js/jquery-3.5.1.min.js"></script>
</head>
	
<body>

	<div class="container raw">
	  <div class="row top">
		<div class="col-lg-6 col-xl-6 col-6 col-sm-6 col-md-6 content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-xl-12 mt-5">
					Телефон: (499)340-94-71 <br>
					Email: info@future-group.ru
					</div>
					<div class="col-lg-12 col-xl-12 mt-5">
					<h1>Комментарии</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-xl-6 col-6 col-sm-6 col-md-6 logo">
			<img class="logo-img" src="assets/img/logo.png">
		</div>
	  </div>
	</div>
	<div class="comments mt-5">
		<?php
			include $_SERVER['DOCUMENT_ROOT'].'/db.php';
			$query = $link->query("SELECT * FROM comments");
			if ($query) {
				while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
					printf(' 
							<p class="content name inl mt-3">
								'.$row['name'].'
							</p>
							<p class="date inl">
								'.$row['time'].'
							</p>
							<p class="date inl">
								'.$row['date'].'
							</p>
							<br>
							<p class="content">
								'.$row['comment'].'
							</p>
						');
			}
		?>	
		
	</div>
	<hr>	

	
	<form action="">
		<div class="container">
		  <div class="row">
			<div class="col-lg-6 col-xl-6 content">
				<h3>Оставить комментарий</h3>
				<p class="mt-4">Ваше имя</p>
				<br>
				<input class="inp text" maxlength="15" class="mt-2" type="text" id="name" value="">
				<br>
				<p class="mt-4">Ваш комментарий</p>
				<br>
				<textarea class="inp" rows="5" id="comment" value=""></textarea>
				<br>
				<p class="subm"><input class="but" type="button" id="submbtn" value="   Отправить   "></p>
			  
			</div>
		  </div>
		</div>
	</form>
		
</body>
	
<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-xl-8 content">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-xl-3 mt-4">
							<img class="foot-img" src="assets/img/logo.png">
						</div>
						<div class="col-lg-9 col-xl-9 mt-5">	
							<p class="footer-text info">Телефон: (499)340-94-71 <br>
							Email: <u>info@future-group.ru </u><br>
							Адрес: <u>115088 Москва, ул. 2-я Машиностроения, д. 7 стр. 1</u>
							<br>
							<p class="footer-text">© 2010 - 2014 Future. Все права защищены</p>
						</div>
					</div>
				</div>
			</div>
		</div>
</footer>



<script language="JavaScript">

 
$("#submbtn").click(function() {	
	if(document.querySelector('#name').value == "" || document.querySelector('#comment').value == "")
		alert("Заполните пустые поля!");
	else
		$.ajax({
			type : 'POST',
			data : {
				name: document.querySelector('#name').value,
				comment: document.querySelector('#comment').value
			},
			url : "add_to_base.php",
			success : function(data) {
				data = JSON.parse(data);
				$(".comments").append('<p class="content name inl mt-3">'+document.querySelector('#name').value+'</p><p class="date inl">'+data[0]+'</p><p class="date inl">'+data[1]+'</p><br><p class="content">'+document.querySelector('#comment').value+'</p>');
				
				document.querySelector('#name').value = "";
				documment: document.querySelector('#comment').value = "";
				
			},
			error : function(xhr, err) {
			}
		})
});

</script>