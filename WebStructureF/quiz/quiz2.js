window.onload = function() {
	
	var loc = window.location.pathname;
	var dir = loc.substring(0, loc.lastIndexOf('/'));
	var base = window.location.href.substring(0, window.location.href.indexOf("/", 10))

	document.getElementById("quiz").onsubmit = function(e) {
		
		//gets answers
		var ans = document.getElementsByName("ans");
		var q = "";
		
		for (var i = 0; i < ans.length; i++) {
			if (ans[i].type == "radio") {																								//multiple choice
				//finds correct answer
				if (ans[i].value == 3 || ans[i].value == 6 || ans[i].value == 9) {	
					if (ans[i].checked == false) {													//prevents submition if correct answer is not checked
						e.preventDefault();
						alert("Inncorrect, try again!");
					} else {
						var t = confirm("Correct!\nDo you want to try another practice problem?");											//correct answer is choicen
						
						var quiz = document.getElementsByTagName("title")[0].className;							//picks random number based on question type
						if (quiz == "AD") {
							var num = Math.floor((Math.random() * 3));
						} else if (quiz == "SA") {
							var num = Math.floor((Math.random() * 2)+1);
						} else if (quiz == "SW") {
							var num = Math.floor((Math.random() * 2));
						} else {
							var num = 0;
						}

						if (num == 0) {													//creates direction for next quiz question based on question type
							q = "mult";
						} else if (num == 1){
							q = "text";
						} else if (num == 2) {
							q = "text2";
						} else {
							q = "text";
						}
						if (t == true && ans[i].value == 3) {												//sends user to new quiz based if selects yes
							window.location.replace(base+dir+"/quiz_"+q+"_ad.php");
						} else if (t == true && ans[i].value == 6) {
							window.location.replace(base+dir+"/quiz_"+q+"_sa.php");
						} else if (t == true && ans[i].value == 9) {
							window.location.replace(base+dir+"/quiz_"+q+"_sw.php");
						} else {
							window.location.replace("./../home.html");														//sends user home if selects no
						}
						return false;
					}
				}
			} else if (ans[i].type == "text") {																								//fill in answer
				var word = document.getElementsByTagName("audio")[0].className;													//gets value of correct answer
				if (ans[i].value.toUpperCase() == word.toUpperCase()) {														//compares value with user answer
						var t = confirm("Correct!\nDo you want to try another practice problem?");

						var quiz = document.getElementsByTagName("title")[0].className;							//picks random number based on question type
						if (quiz == "AD") {
							var num = Math.floor((Math.random() * 3));
						} else if (quiz == "SA") {
							var num = Math.floor((Math.random() * 2)+1);
						} else if (quiz == "SW") {
							var num = Math.floor((Math.random() * 2));
						} else {
							var num = 0;
						}

						if (num == 0) {														//creates direction for next quiz question based on question type
							q = "mult";
						} else if (num == 1){
							q = "text";
						} else if (num == 2) {
							q = "text2";
						} else {
							q = "text";
						}

						if (t == true && document.getElementsByTagName("img")[0].className == "1") {			//sends user to new quiz based if selects yes
							window.location.replace(base+dir+"/quiz_"+q+"_ad.php");
						} else if (t == true && document.getElementsByTagName("img")[0].className == "2") {
							window.location.replace(base+dir+"/quiz_"+q+"_sa.php");
						} else if (t == true && document.getElementsByTagName("img")[0].className == "3") {
							window.location.replace(base+dir+"/quiz_"+q+"_sw.php");
						} else{
							window.location.replace("./../home.html");														//sends user home if selects no
						}
					return false;
				} else if (ans[i].value.toUpperCase() != word.toUpperCase()) {							//prevents submition if correct answer is not checked
					e.preventDefault();
					alert("Incorrect, try again!");
				}
			}			
		}
	}
}