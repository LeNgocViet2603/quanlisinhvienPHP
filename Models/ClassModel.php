<?php 
    class ClassModel extends BaseModel
    {
        const TABLE = 'class';
        private $conn;
        public function __construct()
        {
            $this->conn = $this->connect();
        }
        public function getAllClass(){
            $query = "SELECT * FROM class";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();            
            return $stmt->fetchAll();
        }
    }
    
?>