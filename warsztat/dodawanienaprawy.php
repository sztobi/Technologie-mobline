<?php
	session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="Stylesheet" href="style.css">
	<title>Warsztat</title>
</head>

<body>
	<div id="container">
		<div id = "naprawa">
			<form action="dodawanienaprawy2.php" method="post">
				Numer rejestracyjny pojazdu:</br>
				<input type="text" name="nr_rej"></br>
				Mechanik:</br>
				<select name="mechanicy">
					<option>wybierz</option>
					<option value="Kowalski">Kowalski</option>
					<option value="Nowak">Nowak</option>
					<option value="Gruszka">Gruszka</option>
					<option value="Pietruszka">Pietruszka</option>
				</select>
				</br>
				Dzień przyjęcia: </br>
				<input type="date" name="data"></br>
				Naprawa do: </br>
				<input type="date" name="czas_naprawy"></br></br>
			<input type="submit" value="Dodaj" />
			</form>
		</div>
	</div>
</body>
