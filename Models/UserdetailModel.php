<?php 
    class UserdetailModel extends BaseModel
    {
        const TABLE = 'user_detail';
        private $conn;
        public function __construct()
        {
            $this->conn = $this->connect();
        }
        public function addDetail($user_id,$d_name,$email){
            $sql = "INSERT INTO ".self::TABLE." ( user_id,display_name,email ) VALUES(
                :user_id,:display_name,:email 
            )";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id',$user_id);
            $stmt->bindParam(':display_name',$d_name);
            $stmt->bindParam(':email',$email);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function updateProfile($data){
            $d_name = $data['d_name'];
            $phone = $data['phone'];
            $avt = $data['imgPath'];
            $f_name = $data['firstname'];
            $l_name = $data['lastname'];
            $email = $data['email'];
            $address = $data['address'];
            $sql = "UPDATE ".self::TABLE." SET
                         display_name = :d_name,phone = :phone
                         ,avatar = :avt,firstname = :f_name
                         ,lastname= :l_name,email = :email
                         ,address = :address WHERE ".self::TABLE.".user_id = :user_id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':d_name',$d_name);
            $stmt->bindParam(':phone',$phone);
            $stmt->bindParam(':avt',$avt);
            $stmt->bindParam(':f_name',$f_name);
            $stmt->bindParam(':l_name',$l_name);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':address',$address);
            $stmt->bindParam(':user_id',$_SESSION['user']['inforUser']['user_id']);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function getAllInfor($user_id){
            $mainTable = self::TABLE;
            $refTable = 'users';
            $sql = "SELECT * 
                    FROM ${mainTable} 
                    INNER JOIN ${refTable} ON  ${mainTable}.user_id = ${refTable}.user_id
                    WHERE ${mainTable}.user_id = :user_id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id',$user_id);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if($stmt->execute()){
                return $stmt->fetch();
            }else{
                echo 'có lỗi';
            }
        }
    }
    
?>