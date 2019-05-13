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
			<form action="dodawanienaprawy.php" method="post">
				Naprawa </br>
				<input type="submit" value="Dodaj" />
			</form>
		</div>
		</br></br>
		
			<form action="dodajmechanika.php" method="post">
				Dodaj mechanika </br>
				<input type="text" name = "mechanik" /></br>
				Etat: 
				<select name="etat">
					<option>wybierz</option>
					<option value="cały etat">cały etat</option>
					<option value="3/4 etatu">3/4 etatu</option>
					<option value="pół etatu">pół etatu</option>
				</select>
				<input type="submit" value="Dodaj" /></br>
			</form>
			
		</br></br>
		
			<form action="dodajpojazd.php" method="post">
				Dodaj pojazd </br>
				<input type="text" name = "nr_rejestr" />
				<input type="submit" value="Dodaj" /></br>
			</form>
			
		</br></br>
		
			<form action="index2.php" method="post">
				Wyszukaj pojazd: </br>
				Numer rejestracyjny:</br>
				<input type="text" name = "nr_rej" />
				<input type="submit" value="szukaj" />
			</form>
			
				</br></br>
				
			<form action="index3.php" method="post">
				Wyszukaj mechanika: </br>
				Nazwisko:</br>
				<input type="text" name = "nazwisko"/>
				<input type="submit" value="szukaj" />
			</form>
	</div>
</body>