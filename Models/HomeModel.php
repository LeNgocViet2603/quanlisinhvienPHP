<?php 
    class HomeModel extends BaseModel
    {
        public function getUser(){
            return $this->all('users');
        }
    }
    
?>