<?php
require_once "../dbStudent/db.php";
require_once "../Sport_regtrsion/Intrest_model.php";
require_once "../Student/Student_model.php";
require_once "../Sports/Sport_model.php";

if ($_GET['action'] == "new"){
   new_Registration();
} else if ($_GET['action'] == "add") {
    add_Registration();
} else if ($_GET['action'] == "listAll") {
    list_allRegistrations();
} else if ($_GET['action'] == "listStudentRegistrations") {
    $studentID = $_GET['ID'];
    list_StudentRegistrations($studentID);
} else if ($_GET['action'] == "listSportRegistrations") {
    $SportID = $_GET['ID'];
    list_SportRegistrations($SportID);
}

function new_Registration() {
    $message = "Select Registation info";
    $students_model = new Students();
    $Sport_model = new Intrest();
    $students = $students_model->getStudents();
    $Sports = $Sport_model->getSport();

    include_once "new_Intrest.php";
}

function list_allRegistrations () {
    $Intrest_model = new Registrations();

    $registrations_list = $Intrest_model->getAllStudentRegistrations();

    // print_r ($registrations_list);

    include_once "Intrest_view.php";

}  


function list_StudentRegistrations ($studentID) {
    $Intrest_model = new Registrations();

    $registrations_list = $Intrest_model->getStudentRegistrations($studentID);

    // print_r ($registrations_list);

    include_once "Inrest_view.php";

} 

function list_SportRegistrations ($SportID) {
    $registration_model = new Registrations();

    $registrations_list = $registration_model->getSportRegistrations($SportID);

    // print_r ($registrations_list);

    include_once "Inrest_view.php";

} 


function add_Registration () {

    $studentID = $_POST['studentID'];
    $SportID = $_POST['SportID'];

    $Sport_model = new Registrations();

    $result = $Sport_model->addRegistration($studentID, $SportID);

    if ($result) {
        $message = "new registation added";
    } else {
        $message = "new registation failed";
    }
    
    new_Registration();

} 


?>