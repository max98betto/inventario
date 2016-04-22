<html>
<head>
<link rel="shortcut icon" href="infnlogo.png">
<title>Inventario</title>
<style>

</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap3-3-6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="bootstrap3-3-6/js/bootstrap.min.js"></script>

</head>
<body class="bg-warning">

<div class="btn-group" style="text-align: left; margin-top: 30; margin-left: 30; margin-bottom: 30;	">
<button class="btn btn-success" onclick="location.href='inventario.html'">Inventario</button>
<button class="btn btn-info" onclick="location.href='modifica.html'">Modifica</button>
<button class="btn btn-danger" onclick="location.href='elimina.html'">Elimina</button>
</div>

<div class="container">
	<?php
		$nome=$_POST["nome"];
		$sezione=$_POST["sezione"];
		
		//In caso di cambio del database/location dei file, modificare localhost, admin2016, adminpwd2016, e nel caso di nome diverso, cambiare anche "inventario" nella variabile $db
		$connect=mysql_connect("localhost","admin2016","adminpwd2016") or die(mysql_error());
		$db=mysql_select_db("inventario") or die(mysql_error());
		
		if($sezione == "INFN"){
			$query="SELECT * FROM inventario WHERE Utilizzatore like'$nome%'";
		} else {
			$query="SELECT * FROM cnaf WHERE Utilizzatore like'$nome%'";
		}
		$exec=mysql_query($query) or die(mysql_error());
		
		
		if(mysql_num_rows($exec) > 0){
			echo"<h2>Questo ".htmlentities("è")." l'inventario di <kbd	>$nome</kbd></h2>";
			echo"<table class='table table-hover table-responsive'>";
			echo"<tr class='info'><th>Numero Inventario</th><th>Utilizzatore</th><th>Fornitore</th><th>Descrizione</th><th>Ub Migr</th><th>Ubicazione Desc</th><th>Numero Nota</th><th>Anno Nota</th></tr>";
			while($string= mysql_fetch_array($exec)){
				echo"<tr class='success'>";
				echo"<td>".$string['Num_inventario']."</td>";
				echo"<td>".$string['Utilizzatore']."</td>";
				echo"<td>".$string['Fornitore']."</td>";
				echo"<td>".$string['Descrizione']."</td>";
				echo"<td>".$string['Ub_migr']."</td>";
				echo"<td>".$string['Ubicazione_desc']."</td>";
				echo"<td>".$string['N_nota']."</td>";
				echo"<td>".$string['Anno_nota']."</td>";
				echo"</tr>";	
			}
		} else {
			echo "<h3><code>Utente non trovato</code></h3>";
		}
		
		mysql_close();
	?>
</div>
</body>
</html>
