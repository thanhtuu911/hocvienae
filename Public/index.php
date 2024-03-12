<?php
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "null";
}


switch ($action) {
    case "null":
        include("home.php");
        break;

    case "intro":
        include("intro.php");
        break;
    
    case "home":
        include("home.php");
        break;
    }
?>