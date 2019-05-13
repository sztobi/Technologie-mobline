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
		
		$_SESSION['nazwisko'] = $_POST['mechanik'];
		$_SESSION['etat'] = $_POST['etat'];
		
		echo $_SESSION['etat'];
		$sql3 = "SELECT * FROM etaty WHERE Nazwa = '".$_SESSION['etat']."'";
		
		if($rezultatzap3 = @$polaczenie -> query($sql3))
		{
			echo "1";
			$_SESSION['ile_etat'] = $rezultatzap3 -> num_rows;
			if($_SESSION['ile_etat'] > 0)
			{
				echo "1";
				$wiersz3 = $rezultatzap3->fetch_assoc();
				$_SESSION['id_etatu'] = $wiersz3['Id_etatu'];
				
				$sql4 = "INSERT INTO mechanicy (Nazwisko, Id_etatu)
					VALUES ('".$_SESSION['nazwisko']."', '".$_SESSION['id_etatu']."')";
				
				if($rezultatzap4 = @$polaczenie -> query($sql4))
				{
					header("Location: dodajmechanika2.php");
				}
			}
		}
		
		
	}
?>










