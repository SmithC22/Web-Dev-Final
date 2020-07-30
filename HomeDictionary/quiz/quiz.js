window.onload = function() {
	var mainForm = document.getElementById("quiz");

	document.getElementById("quiz").onsubmit = function(e) {
	
		var ans = document.getElementsByName("ans");
		
		for (var i = 0; i < ans.length; i++) {
			if (ans[i].type == "radio") {
				if (ans[i].value == 1) {
					if (ans[i].checked == false) {
						e.preventDefault();
						alert("Incorrect");
					} else {
						alert("Correct!");
						window.location.replace("./../home.html");
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