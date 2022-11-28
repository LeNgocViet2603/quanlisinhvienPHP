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
                    //password from db
                    $hash = $row['password'];  
                    $hash = substr($hash,0,60);
                }
                if(password_verify($infor['password'],$hash)){
                    return true;
                }else{
                    return false;
                }
             }             
        }
        public function register($infor){
            $hash = password_hash($infor['password'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO ".self::TABLE." ( user_name,password,user_type ) VALUES(
                   :user_name,:password,'0' 
            )";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_name',$infor['username']);
            $stmt->bindParam(':password',$hash);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
    
?>