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
		
		$kategoria = $_POST['kategoria'];
		$_SESSION['i'] = 0;
		$_SESSION['j'] = 0;
		$_SESSION['czesci'] = array();
		

		//$kategoria = "filtry";//tu dostaje info z Unity
		
		$sql1 = "SELECT * FROM kategorie_czesci WHERE nazwa = '$kategoria'";
		
		if($rezultatzap1 = @$polaczenie -> query($sql1))
		{
			
			$_SESSION['ile_kategorii'] = $rezultatzap1 -> num_rows;
			if($_SESSION['ile_kategorii'] > 0)
			{
				
				$wiersz_kat = $rezultatzap1->fetch_assoc();
				$_SESSION['id_kategorii'] = $wiersz_kat['id_kategorii'];
				$_SESSION['nazwa_kategorii'] = $wiersz_kat['nazwa'];
				
				$sql2= "SELECT * FROM czesci_motoryzacyjne WHERE id_kategorii= ".$_SESSION['id_kategorii']."";
				if($rezultatzap2 = @$polaczenie ->query($sql2))
				{
					
					$_SESSION['ile_czesci'] = $rezultatzap2 -> num_rows;
					if($_SESSION['ile_czesci'] > 0)
					{	

						while($wiersz_cz = $rezultatzap2->fetch_assoc())
						{
							$_SESSION['id_kategorii'] = $wiersz_cz['id_kategorii'];
							$_SESSION['nazwa'] = $wiersz_cz['nazwa'];
							$_SESSION['opis'] = $wiersz_cz['opis'];
													
							$_SESSION['czesci'][$_SESSION['i']][$_SESSION['j']] = $_SESSION['nazwa'];
							$_SESSION['j']++;
							$_SESSION['czesci'][$_SESSION['i']][$_SESSION['j']] = $_SESSION['opis'];
							$_SESSION['j'] = 0;
							$_SESSION['i']++;
						}							
	
						header('Location:pokaz_czesci.php');
					} 
					else
					{
						header('Location:brak_czesci.php');
					}
				}
				$rezultatzap2->free_result();
			}
			$rezultatzap1->free_result();
		}
		
	}
	
?>