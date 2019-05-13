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
		<?php
			echo "Nazwisko: ".$_SESSION['nazwisko']."</br>";
			echo "Etat: ".$_SESSION['nazwa']."</br>";
			echo "Serwisowane pojazdy (ID Naprawy): </br>";
			for ($j = 0; $j < $_SESSION['j']; $j++)
			{
				echo $_SESSION['tablica'][$j]."</br>";
			}
		?>
		</br></br>
		<form action="wyszukajnaprawe.php" method="post">
		Wyszukaj naprawe po ID</br>
			<input type = "text" name="id_napr"/>
			<input type="submit" value="Szukaj" />
		</form>
		</br>
		<div id="przycisk">
			<form action="index.php" method="post">
			<input type="submit" value="Powrót" />
			</form> 
		</div>
	</div>
</body>  