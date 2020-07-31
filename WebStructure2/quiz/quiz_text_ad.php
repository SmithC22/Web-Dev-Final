<?php
	require_once('./../dictionary/config.php');
	
	try {
		$connString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
		$user = DBUSER;
		$pass = DBPASS;
		
		$pdo = new PDO($connString, $user, $pass);

		
		$sql = "SELECT * FROM dictionary
				WHERE `QuestionType` = \"Accents & Dialect\"
				ORDER BY RAND()
				LIMIT 1;";

		$result = $pdo->query($sql);
		
		$row = $result->fetch();
		
		$num = rand(1,2);
		
		$rand = "Correct" . $num;
		
	echo "<html>
			<head>
				<title class=\"AD\">Quiz</title>
				<script type=\"text/javascript\" src=\"quiz2.js\"></script>
				<link href=\"./../main.css\" type=\"text/css\" rel=\"stylesheet\">
			</head>
				<body>
				
				<audio id=\"player1\" class=\"" . $row['Word'] . "\" autoplay>
					<source src=" . $row[$rand] . " type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				
			<form method=\"post\" action=\"\" id=\"quiz\">
				<fieldset>
					<legend>Quiz</legend>
		
					<p>
						<h1>? " . $row['Word'] . "<img id=\"a\" src=\"audio.png\" class=\"1\" onclick=\"play('player1')\"></h1>
						<label>What word do you hear?</label><br/>	
					</p>
		
					<p>
						<input type=\"text\" name=\"ans\" size=\"80\">
					</p>
				
					<div class=\"rectangle centered\"> 
						<input type=\"submit\" class=\"rounded\">  
					</div>
			
				</fieldset>
			</form>
			
			<script>
				function play(id){
					var audio = document.getElementById(id);
					audio.play();
				}
			</script>
		</html>";
		
		$pdo = null;

	}catch(PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}

?>