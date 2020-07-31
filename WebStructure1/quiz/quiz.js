window.onload = function() {
	var mainForm = document.getElementById("quiz");

	document.getElementById("quiz").onsubmit = function(e) {
	
		var ans = document.getElementsByName("ans");
		
		for (var i = 0; i < ans.length; i++) {
			if (ans[i].type == "radio") {
				if (ans[i].value == 1) {
					if (ans[i].checked == false) {
						e.preventDefault();
						alert("Inncorrect");
					} else {
						var t = confirm("Correct!\nDo you want to take another quiz?");
						if (t == true) {
							window.location.replace("http://localhost/final_[local_db]/quiz/quiz_template_radio.php");
						} else {
							window.location.replace("./../home.html");
						}
						return false;
					}
				}
			} else if (ans[i].type == "text") {
				if (ans[i].value.toUpperCase() == "MUSIC NOTE") {
					alert("Correct!");
					window.location.replace("./../home.html");
					return false;
				} else if (ans[i].value.toUpperCase() != "MUSIC NOTE") {
					e.preventDefault();
					alert("Incorrect");
				}
			}			
		}
	}
}