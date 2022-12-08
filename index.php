<?php

require "autoload.php";

use Model\Message;
use Repository\MessageRepository;

?>
<html>
  <head>
    <title>Envoyer un message</title>
		<link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
		<link rel="stylesheet" href="/public/assets/css/main.css">
  </head>
  <body>
		<header>
			<nav>
				<a href="/"><strong>Formulaire</strong></a>
				<a href="/listing.php">Liste</a>
			</nav>
		</header>

		<main>
			<h1>Envoyer un message</h1>
			<form>
				<label for="name">Votre nom</label>
				<input type="text" name="name" id="name" required>
				
				<label for="content">Votre message</label>
				<textarea name="content" id="content" rows="5" required></textarea>

				<button type="submit">Envoyer</button>
			</form>
		</main>
  </body>
</html>