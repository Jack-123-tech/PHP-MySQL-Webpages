<?php
require_once "../dbStudent/db.php";

    class Students{

        // Connection
        private $database;
        private $datebaseConnection;
        private $conn;
		
        // Table
        private $db_table = "Student_information";


        // Db connection
        public function __construct(){
            global $database, $datebaseConnection;

            $database = new Database();
            $dbConnection = $database->getConnection();
            $this->conn = $dbConnection;
        }
        
        // list all Photos
        
        public function getAllStudents() {
        	$sqlQuery = "SELECT * FROM " . $this->db_table ;
        	
        	// echo $sqlQuery;
        	
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($result);
            return $result;
        }

        public function getStudents() {
        	$sqlQuery = "SELECT studentID, firstName, lastName FROM " . $this->db_table ;
        	
        	// echo $sqlQuery;
        	
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getStudent($studentID) {
        	$sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE studentID=:id";
        	
        	// echo $sqlQuery;
        	
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindValue(':id', $studentID, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($result);
            return $result[0];
        }

        public function addNewStudent($StudentID, $First_Name, $Last_Name, $Student_DOB) {
            $sqlQuery = "INSERT INTO " . $this->db_table . " VALUES (:StudentID, :First_Name, :Last_Name, :Student_DOB) ";


             
            
            // echo $sqlQuery;
            
            $stmt = $this->conn->prepare($sqlQuery);

            // bind variables to query string

            $stmt->bindValue(':StudentID', $StudentID, PDO::PARAM_INT);
            $stmt->bindValue(':First_Name', $First_Name, PDO::PARAM_STR);
            $stmt->bindValue(':Last_Name', $Last_Name, PDO::PARAM_STR);
            $stmt->bindValue(':Student_DOB', $Student_DOB, PDO::PARAM_STR);

            // execute query
            $result = $stmt->execute();
            
            return $result;
        }

        public function updateStudent($id, $firstName, $lastName, $Student_DOB) {
            $sqlQuery = "UPDATE " . $this->db_table . " SET firstName=:firstName, lastName=:lastName, Student_DOB=:Student_DOB 
                          WHERE studentID=:id ";


            
            // echo $sqlQuery;
            
            $stmt = $this->conn->prepare($sqlQuery);

            // bind variables to query string

            $stmt->bindValue(':id', $id, PDO::PARAM_STR);
            $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
            $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindValue(':Student_DOB', $Student_DOB, PDO::PARAM_INT);

            // execute query
            $result = $stmt->execute();
            
            return $result;
        }
        public function getStudentSportRegistrations($SportID) {
            $sqlQuery = "SELECT sr.*, s.*, c.* FROM " . $this->db_table2 . " sr " . 
                        " JOIN " . $this->db_table . " s ON sr.Students_studentID = s.studentID " .
                        " JOIN " . $this->db_table3 . " c ON sr.Sport_Infromation_SportID = c.SportID " .
                        " WHERE sr.Sport_Information_SportID = $SportID"
                        ;
            
            // echo $sqlQuery;
            
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function deleteStudent ($id) {
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE studentID=:id ";
            
            // // echo $sqlQuery;
            echo $id;
            $stmt = $this->conn->prepare($sqlQuery);

            // bind variables to query string

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            

            // execute query
            $result = $stmt->execute();
            
            return $result;
        }
    }

    

?>