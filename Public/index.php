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
    case "dangky":
        include("register.php");
        break;
    case "hoatdong":
        include("hoatdong.php");
        break;
    case "lanhdao":
        include("lanhdao.php");
        break;
    case "my":
        include("detailMy.php");
        break;
    case "duc":
        include("detailDuc.php");
        break;
    case "uc":
        include("detailUc.php");
        break;
    case "dangki":
        include("dangki.php");
        break;
}
?>