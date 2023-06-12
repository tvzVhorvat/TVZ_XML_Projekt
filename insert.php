<?php
session_start();

    
?>

<?php
	if(ISSET($_POST['insert'])){
 
		if(file_exists("korisnici.xml")){
			$users = simplexml_load_file('korisnici.xml');

            $xput=$users->xpath('//user[position() = last()]/@id');
            $idKor=implode($xput);
            echo '<script type="">alert('.$idKor.')</script>';
            $id=(int)$idKor+1;
            
            
            
			$user = $users->addChild('user');
            $user->addAttribute('id',$id);
			$user->addChild('username', $_POST['username'] );     
			$user->addChild('fullname', $_POST['fullname']);
			$user->addChild('password', $_POST['password']);
			file_put_contents('korisnici.xml', $users->asXML());
 
			//header('location:registracija.php');
            header('location:prijava.php');
		}
	}



    /*
    
    $xput=$xml->xpath('//user[position() = last()]/@id');
            $idKor=implode($xput);
            $xmlA=$xml;
            $xmlA->user->addAttribute('id',$idKor+1);
    
    */
 
?>