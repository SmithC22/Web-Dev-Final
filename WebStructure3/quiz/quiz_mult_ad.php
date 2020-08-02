<?php
	require_once('./../config.php');
	
	$result = file_get_contents(API_URL.GET_SAMPLE_BY_QUESTION_TYPE."accents_dialects");    
	$result = json_decode($result)[0];
	
	echo "<html>
			<head>
				<title class=\"AD\">Quiz</title>
				<script type=\"text/javascript\" src=\"quiz2.js\"></script>
				<link href=\"./../main.css\" type=\"text/css\" rel=\"stylesheet\">
			</head>
				<body>
				
				<audio id=\"player1\">
					<source src=./../audio/" . $result->{"correct1"} . ".mp3 type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				<audio id=\"player2\">
					<source src=./../audio/" . $result->{"correct2"}  . ".mp3 type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				<audio id=\"player3\">
					<source src=./../audio/" . $result->{"wrong"}  . ".mp3 type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				
			<form method=\"post\" action=\"\" id=\"quiz\">
				<fieldset>
					<legend>Quiz</legend>
		
					<p>
						<label>Which pronunciation is not correct?</label><br/>	
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
				
					document.getElementById(\"b1\").value = x;
					document.getElementById(\"b2\").value = y;
					document.getElementById(\"b3\").value = z;

					document.getElementById(\"b1\").setAttribute( \"onClick\", \"play('player'+x)\" );
					document.getElementById(\"b2\").setAttribute( \"onClick\", \"play('player'+y)\" );
					document.getElementById(\"b3\").setAttribute( \"onClick\", \"play('player'+z)\" );
			</script>
		</html>";
?>