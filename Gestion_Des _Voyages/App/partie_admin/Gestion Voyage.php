<?php
require_once('cnxx.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP PDO </title>
	  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
     <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
	
	</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20"  style="background-color:black;background-image:url('Capture11.PNG');" >
	<div style="margin-bottom:12px;">
		<nav class="navbar navbar-default" id="myScrollspy" data-spy="affix" data-offset-top="490"  style="margin: 0px; width: 130%; border-radius: 0;background-color:white;height: 102px;margin-left:-10px;margin-top:-8px;">

			
<a class="navbar-brand" href="page.html">

 					<div>	<img    src="img/loggo.jpeg" style="margin-top: -0.5px;padding-left:0px;width: 120px;" ></div>
			 
 				</a>
 			
 			<div id="menu" >

<ul >

  <li class="menu-css"><a href="page1.html">Home </a></li>
  <li class="menu-css1"><a href="">Gestion d'Admin </a>
<ul>
    <li class="sub"><a href="Gestion Client.php">Gestion Des CLient</a></li>
      <li class="sub"><a href="Gestion voyage.php"> Gestion Des Voyages</a></li>
      <li class="sub"><a href="Gestion Reservtion.php">Gestion Des Reservtion</a></li>
       <li class="sub"><a href="Gestion User.php">Gestion Des User</a></li>
    </ul>
  </li>
  <li class="menu-css2"><a href="http://localhost/client/Dashio/Login_v4/index.php"> Déconnecté</a></li>
</ul>
</div>


		</nav>
	
		<p style="text-align: center;margin-top:-85px;font-size: 24px;text-shadow: 2px 2px 4px  blue ; ">BienVenu Admin</p>
	
		</div>
 				
 				
	<h2>Gestion Des Voyageur </h2>
	<a href="addV.php"><span  id="span" >Ajouter Noveau Voyageur</span> </a><br/><br/>
	<div class="divtab">
	<table   class="tab" border="1px" cellpadding="5px" cellspacing="0">
		<tr>
			<th>No_voyage</th>
			<th>Destination</th>
			<th>Date d'voyage</th>
			<th>prix</th>
			<th>Categories</th>
			<th>Taille de groupe</th>
			<th>Detaille</th>
			<th>Opération</th>
		</tr>
					
				
 <?php
			
            $ss = new Voyage_Service();
     	 			$tc = $ss->findAll();
    						// Parcourir les lignes de résultat
    					foreach($tc as $row) {	
                                   $numvoyage=$row['numvoyage'];
	                                  echo "<tr>";
	                                   echo"<td>".$row['numvoyage']."</td>";
	                                   echo "<td>".$row['Destination']."</td>";
	                                   echo "<td >".$row['datev']."</td>";
										echo "<td>".$row['prix']."</td>";
										echo "<td >".$row['categories']."</td>";
										echo "<td>".$row['Tailledegroupe']."</td>";
										echo "<td>".$row['detaille']."</td>";

										
				  echo "<td>";
		echo "<a href='modifier Voyage.php ?numvoyage=$numvoyage'>Modifier</a>  |";   
	echo "<a href ='Supprimer Voyage.php ?numvoyage=$numvoyage'onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>";

   echo "</td>";
										
								echo "	</tr>";

		
		

			}


		?>



	</table>
	</div>

</body>
</html>