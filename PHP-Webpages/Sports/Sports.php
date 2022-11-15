<?php

require_once "Sport_model.php";

$message = "";


if ($_GET['action'] == 'list') {
   list_Sports();
} else if ($_GET['action'] == 'new') {
    new_Sport();
} else if ($_GET['action'] == 'add') {
    add_Sport();

}
 
function list_Sports() {
    $Sports_model = new Intrest();
    $Sports_list = $Sports_model->getAllSports();
    
    
    include_once "Sport_view.php";
}

function new_Sport() {
    // echo "new student";
    global $message;

    $message = "Enter new Sport";
    include_once "NewSport.php";
}



function add_Sport() {
    global $message;

   $SportID=$_POST['SportID'];
   $Sport_Name = $_POST['Sport_Name'];
    $Indoor_or_outdoor=$_POST['Indoor_or_outdoor'];
    $Sport_Name = new Intrest();
    $result = $Sport_Name->addnewSport($SportID,$Sport_Name,$Indoor_or_outdoor);
    if ($result) {
        $message = "New Sport Added";
    } else {
       $message = "Sport Not added";

    }
    include_once "NewSport.php";

}



?>
