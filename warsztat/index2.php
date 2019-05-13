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
		
		$nr_rej = $_POST['nr_rej'];

		
		$sql1 = "SELECT * FROM pojazdy WHERE Numer_rej = '$nr_rej'";
		
		if($rezultatzap1 = @$polaczenie -> query($sql1))
		{
			$_SESSION['ile_pojazdow'] = $rezultatzap1 -> num_rows;
			if($_SESSION['ile_pojazdow'] > 0)
			{
				$wiersz1 = $rezultatzap1->fetch_assoc();
				$_SESSION['id_pojazdu'] = $wiersz1['Id_pojazdu'];
				$_SESSION['nr_rej'] = $wiersz1['Numer_rej'];
				
				$sql2= "SELECT * FROM naprawy WHERE Id_pojazdu = ".$_SESSION['id_pojazdu']."";
				
				if($rezultatzap2 = @$polaczenie ->query($sql2))
				{
					
					$_SESSION['ile_napraw'] = $rezultatzap2 -> num_rows;
					if($_SESSION['ile_napraw'] > 0)
					{	
						$wiersz2 = $rezultatzap2->fetch_assoc();
						$_SESSION['id_naprawy'] = $wiersz2['Id_naprawy'];
						$_SESSION['id_mech'] = $wiersz2['Id_mechanika'];
						$_SESSION['data'] = $wiersz2['Data'];
						$_SESSION['czas_nap'] = $wiersz2['Czas_naprawy'];
						$_SESSION['status'] = $wiersz2['Status'];
						
						$sql3= "SELECT * FROM mechanicy WHERE Id_mechanika = ".$_SESSION['id_mech']."";
						if($rezultatzap3 = @$polaczenie ->query($sql3))
						{
							
							$_SESSION['ile_mech'] = $rezultatzap3 -> num_rows;
							if($_SESSION['ile_mech'] > 0)
							{	
								$wiersz3 = $rezultatzap3->fetch_assoc();
								$_SESSION['nazwisko'] = $wiersz3['Nazwisko'];
								$_SESSION['imie'] = $wiersz3['Imie'];
								

								header('Location:wynikszukaniapojazdu.php');
							} 
						}
					}
					$rezultatzap2->free_result();
				}
				$rezultatzap1->free_result();
			}
			else
			{
				echo "brak pojazdu";
			}	
		}

	}
?>