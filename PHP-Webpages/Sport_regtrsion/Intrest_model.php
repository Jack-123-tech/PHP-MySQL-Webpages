<?php
require_once "../dbStudent/db.php";

    class Registrations{

        // Connection
        private $database;
        private $datebaseConnection;
        private $conn;
		
        // Table
        private $db_registrations = "Sport_registration";


        private $db_students = "student_information";
        private $db_Sports="sport_information";
        

        // Db connection
        public function __construct(){
            global $database, $datebaseConnection;

            $database = new Database();
            $dbConnection = $database->getConnection();
            $this->conn = $dbConnection;
        }
        
       
        public function getAllStudentRegistrations() {
        	$sqlQuery = "SELECT sr.*, s.*, c.* FROM " . $this->db_registrations . " sr " . 
                        " JOIN " . $this->db_students . " s ON sr.Students_studentID = s.studentID " .
                        " JOIN " . $this->db_Sports . " c ON sr.Sports_SportID = c.SportID "
                        ;
        	
        	//echo $sqlQuery;
        	
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getStudentRegistrations($studentID) {
        	$sqlQuery = "SELECT sr.*, s.*, c.* FROM " . $this->db_registrations . " sr " . 
                        " JOIN " . $this->db_students . " s ON sr.Student_studentID = s.studentID " .
                        " JOIN " . $this->db_Sports . " c ON sr.Sport_SportID = c.SportID " .
                        " WHERE sr.Student_studentID = $studentID"
                        ;
        	
        	// echo $sqlQuery;
        	
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getSportRegistrations($SportID) {
        	$sqlQuery = "SELECT sr.*, s.*, c.* FROM " . $this->db_registrations . " sr " . 
                        " JOIN " . $this->db_students . " s ON sr.Students_studentID = s.studentID " .
                        " JOIN " . $this->db_Sports . " c ON sr.Sports_SportID = c.SportID " .
                        " WHERE sr.Sports_SportID = '$SportID'"
                        ;
        	
        	// echo $sqlQuery;
        	
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function addRegistration ($studentID, $SportID) {
            $sqlQuery = "INSERT INTO " . $this->db_registrations . " (`Students_studentID`, `Sports_SportID`) VALUES (:studentID, :SportID) ";

            
            $stmt = $this->conn->prepare($sqlQuery);

            // bind variables to query string

           
            $stmt->bindValue(':studentID', $studentID, PDO::PARAM_INT);
            $stmt->bindValue(':SportID', $SportID, PDO::PARAM_STR);

            // execute query
            $result = $stmt->execute();
            
            return $result;
        }

        
    }

    

?>