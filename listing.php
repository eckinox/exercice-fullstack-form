<?php

require "autoload.php";

use Repository\MessageRepository;

?>
<html>
  <head>
    <title>Liste de données</title>
		<link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
		<link rel="stylesheet" href="/public/assets/css/main.css">
  </head>
  <body>
		<header>
			<nav>
				<a href="/">Formulaire</a>
				<a href="/listing.php"><strong>Liste</strong></a>
			</nav>
		</header>

		<main>
			<h1>Messages reçus</h1>
			<pre><?php 
				# Replace this with a real user-friendly listing :)
				var_dump(MessageRepository::findAll());
			?></pre>
		</main>
  </body>
</html>