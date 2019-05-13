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
		
		$_SESSION['nr_rej'] = $_POST['nr_rejestr'];
		
		$sql4 = "INSERT INTO pojazdy (Numer_rej)
			VALUES ('".$_SESSION['nr_rej']."')";
		
		if($rezultatzap4 = @$polaczenie -> query($sql4))
		{
			header("Location: dodajpojazd2.php");
		}
	}
?>