<?php
	require_once('config.php');
	
	try {
		$connString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
		$user = DBUSER;
		$pass = DBPASS;
		
		$pdo = new PDO($connString, $user, $pass);

		
		$sql = "SELECT * from dictionary ORDER BY Word";
		
		$result = $pdo->query($sql);
		echo "<html>
				<head>
					<title>Perfect Pronunciation</title>
					<link href=\"./../main.css\" type=\"text/css\" rel=\"stylesheet\">
				</head>
	
				<body>
					<h1>Dictionary</h1>";
		echo "<table id='dictionary' border='1'>";
		echo "<tr><th> ID </th><th onclick=\"sortTable(1)\"> Word <img src=\"arrow1.png\"></th><th> Pronunciation 1 </th><th> Pronunciation 2 </th><th> Sentence </th><th onclick=\"sortTable(5)\"> Attribute <img src=\"arrow1.png\"></th></tr>";
		while($row = $result->fetch()) {
			if ($row['Correct2'] != "-") {
				echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Word'] . "</td><td> 
														<audio id=" . $row['Word'] . ">
														<source src=" . $row['Correct1'] . " type=\"audio/mpeg\">
															Your browser does not support the audio element.
														</audio>
														<div> 
															<button onclick=\"document.getElementById('" . $row['Word'] . "').play()\">Play Sound</button>
														</div> </td><td> 
													
														<audio id=" . $row['Word'] . "1>
														<source src=" . $row['Correct2'] . " type=\"audio/mpeg\">
															Your browser does not support the audio element.
														</audio>
														<div> 
															<button onclick=\"document.getElementById('" . $row['Word'] . "1').play()\">Play Sound</button>
														</div>
					</td><td>" . $row['Sentence'] . "</td><td>" . $row['QuestionType'] . "</td></tr>";
			} else {
				echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Word'] . "</td><td> 
														<audio id=" . $row['Word'] . ">
														<source src=" . $row['Correct1'] . " type=\"audio/mpeg\">
															Your browser does not support the audio element.
														</audio>
														<div> 
															<button onclick=\"document.getElementById('" . $row['Word'] . "').play()\">Play Sound</button>
														</div> </td><td>" . $row['Correct2'] . "</td>
														<td>" . $row['Sentence'] . "</td><td>" . $row['QuestionType'] . "</td></tr>";
			}
		}
		echo "</table>";
		echo "<li><a href=\"./../home.html\">Home</a></li></br>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById(\"dictionary\");
  switching = true;
  // Set the sorting direction to ascending:
  dir = \"asc\";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName(\"td\")[n];
      y = rows[i + 1].getElementsByTagName(\"td\")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == \"asc\") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == \"desc\") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is \"asc\",
      set the direction to \"desc\" and run the while loop again. */
      if (switchcount == 0 && dir == \"asc\") {
        dir = \"desc\";
        switching = true;
      }
    }
  }
}
</script>
				</body>
				</html>";
		
		$pdo = null;

	}catch(PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
?>