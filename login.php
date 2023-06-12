<html>
	<head>
		<title>Web stranice autorizacija</title>

		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	</head>

	<style>
		#forma{
			width: 350px;
			margin: 20% auto 0;
			text-align: center;
			border-radius: 5px;
		}
	</style>

	<body>
		<div id="forma">

		<form action="" method="post">

			<input name="username" type="text" placeholder="Korisnički račun"><br>

			<input name="password" type="password" placeholder="Lozinka"><br>

			<input name="submit" type="submit" value=" Provjera ">

		</form>

		<?php
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
		</div>

	</body>
</html>