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
		
		$_SESSION['id_naprawy'] = $_POST['id_napr'];
		
		$sql1 = "SELECT * FROM naprawy WHERE Id_naprawy = '".$_SESSION['id_naprawy']."'";
		
		if($rezultatzap1 = @$polaczenie -> query($sql1))
		{
			
			$_SESSION['ile_napr'] = $rezultatzap1 -> num_rows;
			if($_SESSION['ile_napr'] > 0)
			{
				
				$wiersz1 = $rezultatzap1->fetch_assoc();
				$_SESSION['id_napraw'] = $wiersz1['Id_naprawy'];
				$_SESSION['id_pojazdu'] = $wiersz1['Id_pojazdu'];
				$_SESSION['data'] = $wiersz1['Data'];	
				$_SESSION['status'] = $wiersz1['Status'];
				$_SESSION['czas'] = $wiersz1['Czas_naprawy'];
				
				$sql2 = "SELECT * FROM pojazdy WHERE Id_pojazdu = '".$_SESSION['id_pojazdu']."'";
		
				if($rezultatzap2 = @$polaczenie -> query($sql2))
				{
					$_SESSION['ile_pojazdow'] = $rezultatzap2 -> num_rows;
					if($_SESSION['ile_pojazdow'] > 0)
					{
						$wiersz2 = $rezultatzap2->fetch_assoc();
						$_SESSION['id_pojazdu'] = $wiersz2['Id_pojazdu'];
						$_SESSION['nr_rej'] = $wiersz2['Numer_rej'];
						
						header("Location:wynikwyszukajnaprawe.php");
					}
				}
		
			}
		}
		
	}
?>