<?php 
    class BaseModel extends Database
    {
        private $conn;
        public function __construct()
        {
            $this->conn = $this->connect();
        }
        /**
         * get all data
         */
        public function all($table){
            $sql = "SELECT * FROM ${table}";
            $stmt = $this->conn->prepare($sql); 
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            return $stmt->fetch();
        }

        public function find($conn,$table,$id){
            $sql = "SELECT * FROM ${table} WHERE st_id= ${id} LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        /**
         * add data to a table
         * $data nhận được từ controller truyền sang
         */
        public function store($conn,$table,$data = []){
            // chuyển đổi các tên cột được truyền vào qua dưới dạng key của mảng
            // trở thành một chuỗi ngăn cách bởi dấu ',' để phục vụ cho việc đưa vào câu
            // lệnh sql ở dưới
            $str_columnName = implode(',',array_keys($data));  

            // thêm dấu : trả về mảng mới bằng việc thêm vào trước tên cột 
            // để phục vụ cho việc truyền tham số để chống injection sql
            $paramColumn = array_map(function($paramName){
                return ":".$paramName;
            },array_keys($data));

            $str_paramColumn = implode(',',$paramColumn);

            $sql = "INSERT INTO ${table}(${str_columnName}) VALUES(${str_paramColumn})";
            $stmt = $conn->prepare($sql);  

            foreach ($data as $key => $value) {                
                $stmt->bindParam($key,$value);              
            } 

            $stmt->execute();

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function delete($table,$id){
            $sql = "DELETE FROM ${table} WHERE ${table}.id = ${id}";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute();            
        }

        public function updateWithDate($conn,$table,$id,$data){
            $handleData = [];
            foreach ($data as $key => $value) {
                if($key == 'birthdate'){
                    $handleData [] =  "$key = STR_TO_DATE('$value','%d-%m-%Y')";
                }else{
                    $handleData [] =  "$key = '$value'";
                }
               
            }
            $str_handelData = implode(',',$handleData);            
            $sql = "UPDATE ${table} SET ${str_handelData} WHERE ${table}.st_id = ${id}";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
  
    }
    
?>