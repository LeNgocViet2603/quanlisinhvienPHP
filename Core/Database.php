<?php 
    class Database 
    {
        const HOST = 'localhost';
        const DB_NAME = 'quanlisinhvien';
        const USERNAME = 'root';
        const PASSWORD = '';
        private $connect;
        public function connect(){
            try {
                $this->connect = new PDO('mysql:host='.self::HOST.';dbname='.self::DB_NAME,self::USERNAME,self::PASSWORD);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $this->connect;
            } catch (PDOException $e) {
                echo $e;
            }
        }
    }
    
?>