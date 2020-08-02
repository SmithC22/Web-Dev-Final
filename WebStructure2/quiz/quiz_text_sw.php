<?php
	require_once('./../dictionary/config.php');
	
	$result = file_get_contents(API_URL.GET_SAMPLE_BY_QUESTION_TYPE."speech_vs_writing");    
	$result = json_decode($result)[0];

	echo "<html>
			<head>
				<title class=\"SW\">Quiz</title>
				<script type=\"text/javascript\" src=\"quiz2.js\"></script>
				<link href=\"./../main.css\" type=\"text/css\" rel=\"stylesheet\">
			</head>
				<body>
				
				<audio id=\"player1\" class=\"" . $result->{"word"} . "\" autoplay>
					<source src=" . $result->{"correct1"}. " type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				
			<form method=\"post\" action=\"\" id=\"quiz\">
				<fieldset>
					<legend>Quiz</legend>
		
					<p>
						<h1>? " . $result->{"word"}  . "<img id=\"a\" src=\"audio.png\" class=\"3\" onclick=\"play('player1')\"></h1>
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

?>