<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hr">

<head>
	<?php
			ob_start();
        include 'prijava.php';
        ob_end_clean();
	?>

	<meta charset="UTF-8">
	
	<meta name="author" content="Viktor Horvat">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
				<?php
/*
				$severname='localhost';
                $username='root';
                $password='';
                $basename='pwa';
                $dbc = mysqli_connect($severname,$username,$password,$basename) or die("Connection failed!");
*/
				?>

	<div class="okvir">

		<header>

			<nav class="navbar navbar-expand-lg bg-body-tertiary">
				<a class="navbar-brand" href="index.php">Home</a>
				<a class="navbar-brand" href="Rss.php">RSS</a>
				
				<a class="navbar-brand" href="prijava.php">prijava</a>
			</nav>
				<a href="index.php">
				
			</a>
		</header>

		<aside>
			Vrsta1 <br>
			<?php	
				//echo $username.'</br>/// a';
				
			?>
		</aside>
		<main>
		
			
			<?php    
				//promjenio $xml u $xml1
				$xml1 = simplexml_load_file('inventura.xml');
				
				$i=0;

				foreach($xml1->Proizvod as $Proizvod){ 
					 
					
					$i++;
					$xput=$Proizvod->xpath('//Proizvod['.$i.']/Tags/Tag'); 


					$Tagovi=implode($xput);
					
					//$xput=$Proizvodi->xpath('//Slika');
					
					//$opis=implode($xput);

					
						echo '
							<!--<table class="table table-success table-striped">-->
							<!--	<thead>-->
									<tr>
									<hr>
									<td>'.$Proizvod->Naziv.'</br> </td>
									<td><img src='.$Proizvod->Slika.' width="20%" height="20%"></td>
									<td>'.$Proizvod->Cijena.' €</br></td>
									<td>'.$Proizvod->Opis.'</br></td>
									<td>'.$Tagovi.'</td>
									</tr>
									</br>
									<!--	</table>-->
									<!--</thead>-->

						';
					}      

/*
			$querry='SELECT * FROM clanci WHERE vrsta="vrsta1" and arhiviran is null ORDER BY id DESC LIMIT 3';
            $result=mysqli_query($dbc,$querry);
           

			while($row=mysqli_fetch_array($result)){
			echo "<article>";
				echo '<img src="'.$row['slika'].'">';
				echo "<h4>".$row['kategorija']." ";
				//echo " ".$row['autor']." ".$row['reg_date']."</h4>";
				echo "<h1>".$row['naslov']."</h1>";
				echo "</br>".substr($row['sadrzaj'], 0,400);
				if(strlen($row['sadrzaj'])>399)echo"...";
				echo '<form action="article.php" method="GET"><button name="klik" type="submit" value="'.$row['id'].'">See more</button></form>';
			echo "</article>";
		}
*/
			 ?>

		</main>

		<aside>
			Vrsta2
		</aside>
		<main>
		
			<?php   
/*
			$querry='SELECT * FROM clanci WHERE vrsta="vrsta2" and arhiviran is null ORDER BY id DESC LIMIT 3';
            $result=mysqli_query($dbc,$querry);
           

			while($row=mysqli_fetch_array($result)){
			echo "<article>";
				echo '<img src="'.$row['slika'].'">';
				echo "<h4>".$row['kategorija']." ";
				//echo " ".$row['autor']." ".$row['reg_date']."</h4>";
				echo "<h1>".$row['naslov']."</h1>";
				echo "</br>".substr($row['sadrzaj'], 0,400);
				if(strlen($row['sadrzaj'])>399)echo"...";
				echo '<form action="article.php" method="GET"><button name="klik" type="submit" value="'.$row['id'].'">See more</button></form>';

			echo "</article>";
		}

*/
			 ?>

	
		</main>

 	&nbsp;

	</div>

			<footer>
			<p><a href="mailto:vhorvat@tvz.hr">Viktor Horvat</a>2022/2023</p>
			</footer>

</body>

<?php
//mysqli_close($dbc);
?>

</html>