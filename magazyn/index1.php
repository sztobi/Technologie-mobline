<?php
	session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="Stylesheet" href="styleindex1.css">
	<title>Magazyn</title>
</head>

<body>
	<div id="container">
		<h1>Magazyn</h1>
		<div id = "wybieranie">
		Wybierz kategorię:
			<form action="index2.php" method="post">
				<select name = "kategoria">
				  <option value="uklad hamulcowy">Układ hamulcowy</option>
				  <option value="filtry">Filtry</option>
				  <option value="amortyzacja">Amortyzacja</option>
				  <option value="oleje i plyny">Oleje i płyny</option>
				  <option value="elektryka">Elektryka</option>
				</select>
				<input type="submit" value="Pokaż" />
			</form>
		</div>
	</div>
</body>