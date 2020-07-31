<?php
    require_once "config.php";
    $result = file_get_contents(GET_ALL_PHRASES);    
    $result = json_decode($result);

    echo "<table>";
    echo "<thead> <tr>
        <th>Word</th>
        <th>Pronounciation</th>
        <th>Example</th>
        </tr></thead>";
    echo "<tbody>";
    for($idx = 0; $idx < sizeof($result); $idx+=1) {
        echo "<tr>";
        echo "<td>".$result[$idx]->{"contains_word"}."</td>";
        echo "<td>".$result[$idx]->{"phonetic"}."</td>";
        echo "<td>
        <audio controls>
            <source src=audio/".$result[$idx]->{"file_name"}."_word.wav type='audio/wav'>
        </audio>
        ";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
?>