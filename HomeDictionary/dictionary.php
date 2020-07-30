<?php
	require_once('config.php');
	
	try {
		$connString = "pgsql:host=" . DBHOST . ";dbname=" . DBNAME;
		$user = DBUSER;
		$pass = DBPASS;
		
//		$pdo = new PDO($connString, $user, $pass);
		$response = file_get_contents('https://web-dev-final2020.herokuapp.com/getPhrasebyWordContained?contains_word=pajamas');
		$response = json_decode($response);

		
		//var_dump($response);
		//$response->{“phrase”};
		//echo $response[0][“phrase”];
//		echo $response[1]->phrase;



		
//		$sql = "SELECT * FROM dictionary";
		
//		$result = $pdo->query($sql);
		echo "<html>
				<head>
					<title>Perfect Pronunciation</title>
				</head>
	
				<body>
					<h1>Dictionary</h1>";
		echo "<table border='1'>";
		echo "<tr><td> ID </td><td> Word </td><td> Phrase </td></tr>";
//		while($row = $response->fetch()) {
		for ($i = 0; $i < 2; $i++) {
			echo "<tr><td>" . $response[$i]->id . "</td><td> " . $response[$i]->contains_word . 
				"</td><td>" . $response[$i]->phrase . "</td></tr>";
		}
		echo "</table>";
		echo "<li><a href=\"home.html\">Home</a></li></br>
				</body>
				</html>";
		
//		$pdo = null;

	}catch(PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
?>