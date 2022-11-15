<?php

require_once "Student_model.php";

$message = "";


if ($_GET['action'] == 'list') {
   list_students();
} else if ($_GET['action'] == 'new') {
    new_Student();
} else if ($_GET['action'] == 'add') {
    add_Student();
} else if ($_GET['action'] == 'edit') {
    $studentID = $_GET['id'];
    edit_Student($studentID);
} else if ($_GET['action'] == 'update') {

    update_Student();
} else if ($_GET['action'] == 'delete') {
    $studentID = $_GET['ID'];
    delete_Student($studentID);
}
 
function list_students() {
    $students_model = new Students();
    $students_list = $students_model->getAllStudents();
 //var_dump($students_list);
    
    include_once "Student_view.php";
}

function new_Student() {
    // echo "new student";
    global $message;

    $message = "Enter Student Info";
    include_once "new_Student.php";
}

function edit_Student($studentID) {
    // echo "new student";
    global $message;
    
    $students_model = new Students();
    $student = $students_model->getStudent($studentID);
    $message = "Update Student Info";
    include_once "editStudent_view.php";
}

function add_Student() {
    global $message;

    $studentID = $_POST['studentID'];
   $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $Student_DOB = $_POST['DOB'];
    $students_model = new Students();
    $result = $students_model->addNewStudent($studentID, $firstName, $lastName, $Student_DOB);
    if ($result) {
        $message = "New Student Added";
    } else {
       $message = "Student Not added";

    }
    include_once "new_Student.php";

}

function update_Student() {
    global $message;

    $studentID = $_POST['studentID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $graduationYear = $_POST['graduationYear'];
    $students_model = new Students();
    $result = $students_model->updateStudent($studentID, $firstName, $lastName, $graduationYear);
    if ($result) {
        $message = "Student Data Updated";
    } else {
        $message = "Student Not Updated";

    }
    $student = $students_model->getStudent($studentID);
    include_once "editStudent_view.php";

}

function delete_Student($studentID) {
    $student_model = new Students();
    $student_model->deleteStudent($studentID);
    list_students();
}

?>
