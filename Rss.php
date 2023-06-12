<?php
/*
$url="http://feeds.feedburner.com/ign/game-reviews";

$feedArr=simplexml_load_file($url);
$feedArr=json_decode();
echo "<pre>";

print_r($feedArr);
*/
?>
<html>
    <head>


        
        <meta charset="UTF-8">
	
	<meta name="author" content="Viktor Horvat">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
            
            body {
                width:100%;
                margin:0 auto;
                padding:0px;
                font-family:helvetica;
                width:75%;
            }
            
         
        </style>

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
				<a href="index.php">Home</a>
				<a href="Rss.php">RSS</a>
				
				<a href="prijava.php">prijava</a>
			</nav>
				<a href="index.php">
				
			</a>
		</header>

		
		<main>
            <?php

                $rss_feed = simplexml_load_file("https://www.metacritic.com/rss/games/pc");
                if (! empty($rss_feed)) {
                    $i = 0;
                    foreach ($rss_feed->channel->item as $feed_item) {
                        if ($i >= 10)
                            break;
                        ?>
                <div>
                    <a class="feed_title" href="<?php echo $feed_item->link; ?>"><?php echo $feed_item->title; ?></a>
                </div>
                <div><?php echo implode(' ', array_slice(explode(' ', $feed_item->description), 0,2004)) . "."; ?></div>
                <?php
                        $i ++;
                    }
                }
            ?>  

		</main>

		
		<main>
	
		</main>

 	&nbsp;

	</div>

			<footer>
			<p><a href="mailto:vhorvat@tvz.hr">Viktor Horvat</a>2022/2023</p>
			</footer>

</html>