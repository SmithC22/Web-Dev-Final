<?php
	require_once('./../config.php');

	$result = file_get_contents(API_URL.GET_SAMPLE_BY_QUESTION_TYPE."syllable_ambiguity");    
	$result = json_decode($result)[0];
	
	echo "<html>
			<head>
				<title class=\"SA\">Quiz</title>
				<script type=\"text/javascript\" src=\"quiz2.js\"></script>
				<link href=\"./../main.css\" type=\"text/css\" rel=\"stylesheet\">
			</head>
				<body>
				
				<audio id=\"player1\" class=\"" . $result->{"word"} . "\">
					<source src=./../audio/" . $result->{"sentence1"}  . ".mp3 type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				<audio id=\"player2\" class=\"" . $result->{"word"}  . "\">
					<source src=./../audio/" . $result->{"sentence2"}  . ".mp3 type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				
			<form method=\"post\" action=\"\" id=\"quiz\">
				<fieldset>
					<legend>Quiz</legend>
		
					<p>
						<h1>? " . $result->{"word"}  . "<img id=\"a\" src=\"audio.png\" class=\"2\" onclick=\"play('player1')\">
													<img id=\"a\" src=\"audio.png\" class=\"2\" onclick=\"play('player2')\"></h1>
						<label>What is the common word between these sentences?</label><br/>	
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
?>