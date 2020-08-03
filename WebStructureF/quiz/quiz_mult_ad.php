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
				    <div class=\"navBar\">
                	    <a href=\"./../home.html\">Home</a>
                	    | <a href=\"./../quiz/quiz_mult_ad.php\">Differences in Accents & Dialect</a>
                	    | <a href=\"./../quiz/quiz_text_sa.php\">Syllable Ambiguity in Words</a>
                        | <a href=\"./../quiz/quiz_mult_sw.php\">Comparing Spoken & Written Words</a>
                        | <a href=\"./../dictionary/dictionary2.php\">Dictionary</a>
                        <hr>
                    </div>
				
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
					<legend>Practice</legend>
		
					<p>
						<h1>" . $result->{"word"} . "</h1>
						<label>Which pronunciation is not correct?</label><br/>	
					</p>
		
					<p>
						<div class=\"MultiChoice\">
                            <label><input type=\"radio\" id=\"b1\" name=\"ans\" value=\"0\" onclick=\"play('player1')\">A</label>
                            <label><input type=\"radio\" id=\"b2\" name=\"ans\" value=\"0\" onclick=\"play('player2')\">B</label>
                            <label><input type=\"radio\" id=\"b3\" name=\"ans\" value=\"0\" onclick=\"play('player3')\">C</label>
                        </div>
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