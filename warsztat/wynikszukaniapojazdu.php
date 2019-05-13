<?php
	session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="Stylesheet" href="style.css">
	<title>Wynik</title>
</head>

<body>
	
	<div id="container">
		<?php
			echo $_SESSION['nr_rej']."</br>".$_SESSION['nazwisko']."</br>".$_SESSION['imie']."</br>".$_SESSION['data']."</br>".$_SESSION['czas_nap']."</br>";
			if($_SESSION['status'] == 1)
			{
				echo "Naprawa zakończona. </br> Auto do odbioru.";
			}
			else if ($_SESSION['status'] == 0)
			{
				echo "Naprawa w trakcie.";
			}
			else
			{
				echo "Brak danych";
			}
			
		?>
		<div id="przycisk">
			<form action="index.php" method="post">
			<input type="submit" value="Powrót" />
			</form> 
		</div>
	</div>


</body>