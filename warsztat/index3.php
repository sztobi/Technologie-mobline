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
		
		$nazwisko = $_POST['nazwisko'];
		$_SESSION['j'] = 0;
		$_SESSION['tablica'][50];

		$sql1 = "SELECT * FROM mechanicy WHERE Nazwisko = '$nazwisko'";
		
		if($rezultatzap1 = @$polaczenie -> query($sql1))
		{
			
			$_SESSION['ile_mech'] = $rezultatzap1 -> num_rows;
			if($_SESSION['ile_mech'] > 0)
			{
				
				$wiersz1 = $rezultatzap1->fetch_assoc();
				$_SESSION['id_mech'] = $wiersz1['Id_mechanika'];
				$_SESSION['nazwisko'] = $wiersz1['Nazwisko'];
				$_SESSION['id_etatu'] = $wiersz1['Id_etatu'];	
			}
			
			$sql2 = "SELECT * FROM etaty WHERE Id_etatu =".$_SESSION['id_etatu']."";
			
			if($rezultatzap2 = @$polaczenie -> query($sql2))
			{
				
				$_SESSION['ile_etat'] = $rezultatzap2 -> num_rows;
				if($_SESSION['ile_etat'] > 0)
				{
					
					$wiersz2 = $rezultatzap2->fetch_assoc();
					$_SESSION['id_etatu'] = $wiersz2['Id_etatu'];
					$_SESSION['nazwa'] = $wiersz2['Nazwa'];
					
					$sql3 = "SELECT * FROM naprawy WHERE Id_mechanika = ".$_SESSION['id_mech']."";
					
					if($rezultatzap3 = @$polaczenie -> query($sql3))
					{
						$_SESSION['ile_napraw'] = mysqli_num_rows($rezultatzap3);
						if($_SESSION['ile_napraw'] > 0)
						{
							
							for($i = 0; $i < $_SESSION['ile_napraw']; $i++)
							{
								$wiersz3 = mysqli_fetch_assoc($rezultatzap3);
								
								$_SESSION['tablica'][$i] = $wiersz3['Id_naprawy'];
								 
								$_SESSION['j']++;
							}
							
							header("Location: wynikwyszukiwaniamechanika.php");
						}
					}
					
				}
			}
		}
	}		
	
?>