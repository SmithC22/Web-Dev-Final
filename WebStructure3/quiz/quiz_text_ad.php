<?php
	require_once('./../config.php');
	
	$result = file_get_contents(API_URL.GET_SAMPLE_BY_QUESTION_TYPE."accents_dialects");    
	$result = json_decode($result)[0];

	$num = rand(1,2);
	$rand = "correct" . $num;
		
	echo "<html>
			<head>
				<title class=\"AD\">Quiz</title>
				<script type=\"text/javascript\" src=\"quiz2.js\"></script>
				<link href=\"./../main.css\" type=\"text/css\" rel=\"stylesheet\">
			</head>
				<body>
				
				<audio id=\"player1\" class=\"" . $result->{"word"} . "\" autoplay>
					<source src=./../audio/" . $result->{$rand} . ".mp3 type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				
			<form method=\"post\" action=\"\" id=\"quiz\">
				<fieldset>
					<legend>Quiz</legend>
		
					<p>
						<img id=\"a\" src=\"audio.png\" class=\"1\" onclick=\"play('player1')\">
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