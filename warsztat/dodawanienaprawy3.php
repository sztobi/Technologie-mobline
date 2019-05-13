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
		
		$sql4 = "INSERT INTO naprawy (Id_pojazdu, Id_mechanika, Data, Status, Czas_naprawy)
			VALUES ('".$_SESSION['id_pojazdu']."','".$_SESSION['id_mech']."', '".$_SESSION['data']."', 0 ,'".$_SESSION['czas_naprawy']."')";
		
		echo $_SESSION['id_pojazdu']."</br>";
		echo$_SESSION['id_mech']."</br>";
		echo$_SESSION['data']."</br>";
		echo$_SESSION['czas_naprawy']."</br>";
		
		if($rezultatzap4 = @$polaczenie -> query($sql4))
		{
			header("Location: dodawanienaprawy4.php");
		}
	}
?>










