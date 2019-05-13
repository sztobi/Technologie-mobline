<?php
	session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="Stylesheet" href="style_poka.css">
	<title>Dostępność</title>
</head>

<body>
	
	<div id="container">
		<div id="tytultabeli">
		<?php
		
		echo"<p>Kategoria: <b>".$_SESSION['nazwa_kategorii']."</b></p>";
		?>
		</div>
		
		<p>
		<table>
			<thead>
				<tr>
					<th>Produkt</th>
					<th>Opis</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
					<?php
					echo $_SESSION['czesci'][0][0];
					?>
					</td>
					<td>
					<?php
					echo $_SESSION['czesci'][0][1];
					?>
					</td>
				</tr>
				<tr>
					<td>
					<?php
					echo $_SESSION['czesci'][1][0];
					?>
					</td>
					<td>
					<?php
					echo $_SESSION['czesci'][1][1];
					?>
					</td>
				</tr>
				<?php
				if (isset($_SESSION['czesci'][2][0]))
				{
					echo "
					<tr>
						<td>
						".$_SESSION['czesci'][2][0].";
						</td>
						<td>
						".$_SESSION['czesci'][2][1].";
						</td>
					</tr>" ;
					if (isset($_SESSION['czesci'][3][0]))
					{
						echo "
						<tr>
							<td>
							".$_SESSION['czesci'][3][0].";
							</td>
							<td>
							".$_SESSION['czesci'][3][1].";
							</td>
						</tr>" ;			
					}
				}
				?>
			</tbody>
		</table>
		</p>
		
		<div id="przycisk">
			<form action="index1.php" method="post">
			<input type="submit" value="Powrót" />
			</form> 
		</div>
	</div>


</body>