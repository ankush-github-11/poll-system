<?php
    include "../config/connect.php";
    $title = $_POST["title"];
    echo "Poll Title : ".$title;
    echo "<br/>";
    
    $description = $_POST["description"];
    echo "Poll Description : ".$description;
    echo "<br/>";
    
    $i = 1;
    $arrayOfOptions = [];
    while(isset($_POST["option$i"])){
        array_push($arrayOfOptions, $_POST["option$i"]);
        $i++;
    }
    $i = 1;
    foreach($arrayOfOptions as $option){
        echo "Poll Option$i : ".$option."<br/>";
        $i++;
    }
    
    $pollTypeOptions = $_POST["pollTypeOptions"];
    echo "Poll TypeOptions : ".$pollTypeOptions;
    echo "<br/>";
    
    $themeOptions = $_POST["themeOptions"];
    echo "Poll ThemeOptions : ".$themeOptions;
    echo "<br/>";

    $caseOptions = $_POST["caseOptions"];
    echo "Poll CaseOptions : ".$caseOptions;
    echo "<br/>";
    
    $publishImmediatelyCheckbox = "no";
    if(isset($_POST["publish-immediately-checkbox"])) 
        $publishImmediatelyCheckbox = "yes";
    echo "Publish Immediately Checkbox : ".$publishImmediatelyCheckbox;
    echo "<br/>";

    $dateAndTime = $_POST["dateAndTime"];
    if($dateAndTime=="Calendar") $dateAndTime = "no";
    echo "Date and Time : ".$dateAndTime;
    echo "<br/>";

    $duration = $_POST["duration"];
    echo "Duration : ".$duration;
    echo "<br/>";

    $votersRepresentation = $_POST["votersRepresentation"];
    echo "Voters Representation : ".$votersRepresentation;
    echo "<br/>";
    
    $devices = $_POST["devices"];
    echo "Devices : ".$devices;
    echo "<br/>";
    
    $showResults = $_POST["showResults"];
    echo "Show Results After : ".$showResults;
    echo "<br/>";
    

    // Fix date time for no date and time
?>