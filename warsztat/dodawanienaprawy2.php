<?php

	session_start();

	require_once"connect.php"; //namiary na baze 
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); //reprezentuje połączenie z bazą danych
	// @ wycisza powiadomienia
	
	if($polaczenie->connect_errno!=0)  //jesli ie uda nam sie nawizac polaczenia z baza
	{
		echo "Error:".$polaczenie ->connect_errno;  //obsluga bledu
	}
	else
	{
		mysqli_set_charset($polaczenie, "utf8");

		$_SESSION['nr_rej'] = $_POST['nr_rej'];
		$_SESSION['mechanik'] = $_POST['mechanicy'];
		$_SESSION['data'] = $_POST['data'];
		$_SESSION['czas_naprawy'] = $_POST['czas_naprawy'];
		
		$sql1 = "INSERT INTO pojazdy (Numer_rej) VALUES ('".$_SESSION['nr_rej']."')";
		
		if($rezultatzap1 = @$polaczenie -> query($sql1))
		{
			$sql2 = "SELECT * FROM pojazdy WHERE Numer_rej = '".$_SESSION['nr_rej']."'";
			
			if($rezultatzap2 = @$polaczenie -> query($sql2))
			{
				$_SESSION['ile_pojazdow'] = $rezultatzap2 -> num_rows;
				if($_SESSION['ile_pojazdow'] > 0)
				{
					$wiersz2 = $rezultatzap2->fetch_assoc();
					$_SESSION['id_pojazdu'] = $wiersz2['Id_pojazdu'];
					
					$sql3 = "SELECT * FROM mechanicy WHERE Nazwisko = '".$_SESSION['mechanik']."'";
					
					if($rezultatzap3 = @$polaczenie -> query($sql3))
					{
						$_SESSION['ile_mech'] = $rezultatzap3 -> num_rows;
						if($_SESSION['ile_mech'] > 0)
						{
							$wiersz3 = $rezultatzap3->fetch_assoc();
							$_SESSION['id_mech'] = $wiersz3['Id_mechanika'];
							
							header("Location: dodawanienaprawy3.php");
						}
					}
				}
			}
		}
		
	}
	
?>