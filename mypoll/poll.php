<?php
    include "../config/connect.php";
    $title = $_POST["title"];
    
    $description = $_POST["description"];

    $i = 1;
    $arrayOfOptions = [];
    while(isset($_POST["option$i"])){
        array_push($arrayOfOptions, $_POST["option$i"]);
        $i++;
    }
    $joinedOptions = implode("<.-:.=>", $arrayOfOptions);
    echo $joinedOptions;

    $pollTypeOptions = $_POST["pollTypeOptions"];
    
    $themeOptions = $_POST["themeOptions"];

    $caseOptions = $_POST["caseOptions"];
    
    $publishImmediatelyCheckbox = "no";
    if(isset($_POST["publish-immediately-checkbox"])) 
        $publishImmediatelyCheckbox = "yes";

    $dateAndTime = $_POST["dateAndTime"];
    if($dateAndTime=="Calendar") $dateAndTime = "no";


    $duration = $_POST["duration"];


    $votersRepresentation = $_POST["votersRepresentation"];

    
    $devices = $_POST["devices"];
    
    $showResults = $_POST["showResults"];
    
    // Fix date time for no date and time
    // Fix the bug in the date time
?>