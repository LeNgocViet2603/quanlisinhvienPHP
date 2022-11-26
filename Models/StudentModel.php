<?php 
    class StudentModel extends BaseModel
    {
        const TABLE = 'students';
        private $conn;
        public function __construct()
        {
            $this->conn = $this->connect();
        }
        public function getList(){
            $query = "SELECT * FROM students,class WHERE students.classID = class.classID";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();            
            return $stmt->fetchAll();
        }
        public function getStudentDeleted(){
            $query = "SELECT * FROM students,class WHERE students.classID = class.classID AND students.visible='0'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();            
            return $stmt->fetchAll();
        }
        public function addStudent($data){
            $str_columnName = implode(',',array_keys($data));  
            // thêm dấu : trả về mảng mới bằng việc thêm vào trước tên cột 
            // để phục vụ cho việc truyền tham số để chống injection sql
            $paramColumn = array_map(function($paramName){
                //return ":$paramName";
                if($paramName == 'birthdate'){
                    // format dd-mm-yyyy -> vd 04-10-2000
                    return "STR_TO_DATE(:birthdate,'%d-%m-%Y')";
                }else{
                    return ":".$paramName;
                }               
            },array_keys($data));

            $str_paramColumn = implode(',',$paramColumn);            
            $tablename = self::TABLE;
            $sql = " INSERT INTO ${tablename} (${str_columnName}) VALUES(
                ${str_paramColumn}
            )";
            $stmt = $this->conn->prepare($sql);  
            $stmt->bindParam(':name',$data['name']);
            $stmt->bindParam(':birthdate',$data['birthdate']); 
            $stmt->bindParam(':sex',$data['sex']);
            $stmt->bindParam(':classID',$data['classID']);
            $stmt->bindParam(':address',$data['address']);
            // foreach ($data as $key => $value) {                                             
            //     $stmt->bindParam("':$key'",$value);                              
            // }
            if($stmt->execute()){
                return true;
            }else{
                return false;
            } 
        }
        public function findByID($id){
            return $this->find($this->conn,self::TABLE,$id[0]);
        }
        public function save($data,$id){
            return $this->updateWithDate($this->conn,self::TABLE,$id,$data);
        }
        public function del($id){

            $sql = "UPDATE ".self::TABLE. " SET visible=0 WHERE st_id = $id";            
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute();
        }
        public function restore($id){
            $sql = "UPDATE ".self::TABLE." SET visible=1 WHERE st_id = $id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute();
        }        
    }
    
?>