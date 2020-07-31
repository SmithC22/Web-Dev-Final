<?php
	require_once('./../dictionary/config.php');
	
	try {
		$connString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
		$user = DBUSER;
		$pass = DBPASS;
		
		$pdo = new PDO($connString, $user, $pass);

		
		$sql = "SELECT * FROM dictionary
				WHERE `QuestionType` = \"Speech vs Writing\"
				ORDER BY RAND()
				LIMIT 1;";

		$result = $pdo->query($sql);
		
		$row = $result->fetch();
		
	echo "<html>
			<head>
				<title class=\"SW\">Quiz</title>
				<script type=\"text/javascript\" src=\"quiz2.js\"></script>
				<link href=\"./../main.css\" type=\"text/css\" rel=\"stylesheet\">
			</head>
				<body>
				
				<audio id=\"player1\">
					<source src=" . $row['Wrong1'] . " type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				<audio id=\"player2\">
					<source src=" . $row['Wrong2'] . " type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				<audio id=\"player3\">
					<source src=" . $row['Correct1'] . " type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				
			<form method=\"post\" action=\"\" id=\"quiz\">
				<fieldset>
					<legend>Quiz</legend>
		
					<p>
						<h1>" . $row['Word'] . "</h1>
						<label>Which pronunciation is correct?</label><br/>	
					</p>
		
					<p>
						<input type=\"radio\" id=\"b1\" name=\"ans\" value=\"0\" onclick=\"play('player1')\">A<br/>
						<input type=\"radio\" id=\"b2\" name=\"ans\" value=\"0\" onclick=\"play('player2')\">B<br/>
						<input type=\"radio\" id=\"b3\" name=\"ans\" value=\"0\" onclick=\"play('player3')\">C<br/>
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
				
				  var x = Math.floor((Math.random() * 3) + 1);
				  var y = Math.floor((Math.random() * 3) + 1);
				  while (y == x) {
					    y = Math.floor((Math.random() * 3) + 1);
				  }
			      var z = Math.floor((Math.random() * 3) + 1);
				  while (z == x || z == y) {
					    z = Math.floor((Math.random() * 3) + 1);
				  }
				
					document.getElementById(\"b1\").value = x+6;
					document.getElementById(\"b2\").value = y+6;
					document.getElementById(\"b3\").value = z+6;

					document.getElementById(\"b1\").setAttribute( \"onClick\", \"play('player'+x)\" );
					document.getElementById(\"b2\").setAttribute( \"onClick\", \"play('player'+y)\" );
					document.getElementById(\"b3\").setAttribute( \"onClick\", \"play('player'+z)\" );
			</script>
		</html>";
		
		$pdo = null;

	}catch(PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}

?>