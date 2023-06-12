<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <?php
        // ob_start();
        //include 'index.php';
        //ob_end_clean();
        //$xml=simplexml_load_file("korisnici.xml");
    ?>
	
	<meta charset="UTF-8">
	<meta name="author" content="Viktor Horvat">
	<link rel="stylesheet" type="text/css" href="style.css">
  <title>Index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>

	<div class="okvir">

		<header>

			<nav class="navbar navbar-expand-lg bg-body-tertiary">
				<a href="index.php">Home</a>
				<a href="Rss.php">RSS</a>
				
				<a href="prijava.php">prijava</a>
			</nav>
				<a href="index.php">
				
			</a>
		</header>

		<main id="loginpage">
			<article id="registracija">
				<h2>Registracija </h2>
				<form name="registracijaKorisnika" action="insert.php" method="POST">
					<span id="porukaIme"></span>
					<input type="text" name="fullname" id="fullname" placeholder="Ime"/>
					</br>
					<span id="porukaNadimak"></span>
					<input type="text" name="username" id="username" placeholder="Nadimak"/>
					</br>
					<span id="porukaLozinka"></span>
					<input type="password" name="password" id="password" placeholder="Lozinka"/>
					</br>
					<button  name="insert">registracija</button>
                    <?php

                      //echo $Proizvod->Naziv;
                      /*
                        $xml=simplexml_load_file("korisnici.xml");
                        $xput=$xml->xpath('//user[position() = last()]/@id');
                        $idKor=implode($xput);
                            echo '</br>'.$idKor;
                            echo '</br>'.$idKor+1;
                        $xmlA=$xml;
                        $xmlA->user->addAttribute('id',$idKor+1);
                        */


                        /*
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				$ans=$_POST;

				if (empty($ans["username"]))  {
						echo "<p>Korisnički račun nije unesen.</p>";
					
						}
				else if (empty($ans["password"]))  {
						echo "<p>Lozinka nije unesena.</p>";
					
						}
				else {
					$username= $ans["username"];
					$password= $ans["password"];
				
					provjera($username,$password);
				}
			}
                        
                        
                        */
                        

                    ?>
				</form>
			</article>

           

			<article id="prijava">
				<h2>Prijava </h2>
				<form name="prijavaKorisnika" action="prijava.php" method="POST">
					<input type="text" name="username" id="imeKorisnika" placeholder="Nadimak"/>
					</br>
					<input type="password" name="password" id="lozinkaKorisnika" placeholder="Lozinka"/>
					</br>
					
                        <input type="submit" id="slanje" name="prijava" value="Provjera">
                    
				</form>

                <?php
            //$tkorisnik=$_POST['username'];    
            
			$username="";
			$password="";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				$ans=$_POST;

				if (empty($ans["username"]))  {
						echo "<p>Korisnički račun nije unesen.</p>";
					
						}
				else if (empty($ans["password"]))  {
						echo "<p>Lozinka nije unesena.</p>";
					
						}
				else {
					$username= $ans["username"];
					$password= $ans["password"];
				
					provjera($username,$password);
				}
			}


			function provjera($username, $password) {
				

				$xml=simplexml_load_file("korisnici.xml");

                

                //$xml1 = simplexml_load_file('inventura.xml');
				//foreach($xml1->Proizvod as $Proizvod){   			
				
				
				
				foreach ($xml->user as $usr) {
					$usrn = $usr->username;
					$usrp = $usr->password;
					$usrweb = $usr->web;
					if($usrn==$username){
						if($usrp == $password){
							echo
							/*"<form action='$usrweb'>
								<input type='submit' value='Vaš Website' class='button'/>
							</form>";*/
							'<a href="index.php"/>
								<button class="btn btn-sm btn-primary">Prijava</button>
							</a>';
							return;
							}
						else{
							echo "<p>Netocna lozinka</p>";
							return;
							}
						}
					}
					
				echo "<p>Korisnik ne postoji.</p>";
				return;
			}
		?>

			</article>

		</main>


<!--

	<script type="text/javascript">

		document.getElementById("slanje").onclick = function(event) {

			var slanjeForme = true;

	
			var poljePunoImeKorisnika = document.getElementById("punoImeKorisnika");
			var punoImeKorisnika = document.getElementById("punoImeKorisnika").value;
			if (punoImeKorisnika.length == 0) {
				slanjeForme = false;
				
				document.getElementById("porukaIme").innerHTML="Unesite ime</br>";
			} else {
				
				document.getElementById("porukaIme").innerHTML="";
			}

			var poljeImeKorisnika = document.getElementById("imeKorisnika");
			var imeKorisnika = document.getElementById("imeKorisnika").value;
			if (imeKorisnika.length == 0) {
				slanjeForme = false;
				
				

				document.getElementById("porukaNadimak").innerHTML="Nadimak je obavezan<br>";
			} else {
				
				

				document.getElementById("porukaNadimak").innerHTML="";
			}

			// Provjera podudaranja lozinki
			var poljeLozinkaKorisnika = document.getElementById("lozinkaKorisnika");
			var lozinkaKorisnika = document.getElementById("lozinkaKorisnika").value;
			var poljeLozinkaKorisnikaProvjera = document.getElementById("lozinkaKorisnikaProvjera");

			var lozinkaKorisnikaProvjera = document.getElementById("lozinkaKorisnikaProvjera").value;
			if (lozinkaKorisnika.length == 0 || lozinkaKorisnikaProvjera.length == 0 || lozinkaKorisnika != lozinkaKorisnikaProvjera) {
				slanjeForme = false;
			;



				document.getElementById("porukaLozinka").innerHTML="Lozinke nisu iste!</br>";
				document.getElementById("porukaLozinkaProvjera").innerHTML="Lozinke nisu iste!</br>";
			} else {
				

				document.getElementById("porukaLozinka").innerHTML="";
				document.getElementById("porukaLozinkaProvjera").innerHTML="";
			}

			if (slanjeForme != true) {
				event.preventDefault();
			}

		};

	</script>

    -->  
	</div>

			<footer>
				<p><a href="mailto:vhorvat@tvz.hr">Viktor Horvat</a>2022/2023</p>
			</footer>
			
	</body>

</html>