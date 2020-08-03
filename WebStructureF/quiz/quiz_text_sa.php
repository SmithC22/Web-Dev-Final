<?php
	require_once('./../config.php');
	
	$result = file_get_contents(API_URL.GET_SAMPLE_BY_QUESTION_TYPE."syllable_ambiguity");    
	$result = json_decode($result)[0];

	$num = rand(1,2);
	$rand = "correct" . $num;
		
	echo "<html>
			<head>
				<title class=\"SA\">Quiz</title>
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
				
				<audio id=\"player1\" class=\"" . $result->{"word"} . "\" autoplay>
					<source src=./../audio/" . $result->{$rand} . ".mp3 type=\"audio/mpeg\">
					Your browser does not support the audio element.
				</audio>
				
			<form method=\"post\" action=\"\" id=\"quiz\">
				<fieldset>
					<legend>Practice</legend>
		
					<p>
						<img id=\"a\" src=\"audio.png\" class=\"2\" onclick=\"play('player1')\"><br/>
						<label>What word do you hear?</label><br/>	
					</p>
		
					<p>
						<input type=\"text\" name=\"ans\" autocomplete=\"off\" size=\"20\" style=\"font-size:18pt; text-align:center\">
					</p>
				
					<div>
						<input type=\"submit\">
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