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
			echo "Numer rejestracyjny pojazdu: ".$_SESSION['nr_rej']."</br>";
			echo "Data przyjęcia: ".$_SESSION['data']."</br>";
			echo "Przewidziany czas naprawy: ".$_SESSION['czas']."</br>";
		?>
		</br>
		<div id="przycisk">
			<form action="wynikwyszukiwaniamechanika.php" method="post">
			<input type="submit" value="Wstecz" />
			</form> 
		</div>
	</div>
</body>  