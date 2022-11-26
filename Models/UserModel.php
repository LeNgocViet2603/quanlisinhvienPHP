<?php 
    class UserModel extends BaseModel
    {    
        const TABLE = 'users';
        private $conn;
        public function __construct()
        {
            $this->conn = $this->connect();
        }
        public function getAll(){
            return $this->all(self::TABLE);
        }
        public function create($data){
            $this->store(self::TABLE,$data);
        }
        // public function save($id,$data = []){           
        //     $this->update(self::TABLE,$id,$data);
        // }
        public function destroy($id){
            $this->delete(self::TABLE,$id);
        }
        public function check($infor){        
            $sql = "SELECT * FROM ".self::TABLE." WHERE user_name = '{$infor['username']}'";
            $stmt = $this->conn->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
             if($stmt->rowCount()>0){
                while($row = $stmt->fetch()){
                    $password = password_hash($row['password'],PASSWORD_DEFAULT);                    
                }
                if(password_verify($infor['password'],$password)){
                    return true;
                }
             }
            return false;
        }
    }
    
?>