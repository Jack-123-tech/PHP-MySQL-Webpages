<?php
require_once "../dbStudent/db.php";
class Intrest{
    //Conection
    private $database;
    private $datebaseConnection;
    private $conn;
    //table
    private $db_table="Sport_information";
    
    public function __construct(){
        global $database, $datebaseConnection;

        $database = new Database();
        $dbConnection = $database->getConnection();
        $this->conn = $dbConnection;
    }

    public function getAllSports() {
        $sqlQuery = "SELECT * FROM " . $this->db_table ;
        
        // echo $sqlQuery;
        
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getSport() {
        $sqlQuery = "SELECT courseID, description FROM " . $this->db_table ;
        
        // echo $sqlQuery;
        
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function addnewSport ( $SportID,$Sport_Name, $Indoor_or_outdoor) {
        $sqlQuery = "INSERT INTO " . $this->db_table . " VALUES ( :SportID,:Sport_Name, :Indoor_or_outdoor) ";

        $stmt = $this->conn->prepare($sqlQuery);
    
        $stmt->bindValue (":SportID", $SportID, PDO::PARAM_INT);
        $stmt->bindValue (":Sport_Name", $Sport_Name, PDO::PARAM_STR);

        $stmt->bindValue (":Indoor_or_outdoor", $Indoor_or_outdoor, PDO::PARAM_STR);

        $result = $stmt->execute();
        
        return $result;

    }


}























?>