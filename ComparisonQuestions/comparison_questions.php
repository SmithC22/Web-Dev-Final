<?php
    require_once "config.php";
    $comparison_words = ["caramel", "pajamas"];
    
    $potential_answers = [
        [
            "grandma",
            "caramel",
            "brother",
            "apple"
        ],
        [
            "bed",
            "red",
            "pajamas",
            "wear"
        ]
    ];
    $question_selection = $_GET["question"]-1;
    $contained_word = $comparison_words[$question_selection];

    $result = file_get_contents(GET_PHRASE_BY_CONTAINED_WORD.$contained_word);    
    $result = json_decode($result);
    
    echo "<h3>What is the common word in the following two phrases?</h3>";
    for($idx = 0;$idx < count($result);$idx++) {
        echo "
        <audio controls>
            <source src=audio/".$result[$idx]->{"file_name"}.".wav type='audio/wav'>
        </audio>
        ";
    }

    for($idx = 0; $idx < 4;$idx++) {
        echo "<br>
        <button id='".$idx."' onclick='onClick(event)'>".$potential_answers[$question_selection][$idx]."</button>
        <br>";
    }

?>
<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    let questionNumber = Number.parseInt(urlParams.get("question"))
   
    const correctAnswers = [1, 2];

    let onClick = (event) => {
        let selectedIndex = Number.parseInt(event.srcElement.id)
        if (selectedIndex == correctAnswers[questionNumber-1]) {
            alert("RIGHT!");
            if (questionNumber != correctAnswers.length) {
                let currentLoc = window.location.href;
                console.log(currentLoc)
                window.location.href = currentLoc.substring(0, currentLoc.length-1) + ++questionNumber;
            }
        } else {
            alert("WRONG");
        }
    }
</script>