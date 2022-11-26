<?php 
    class UserModel extends BaseModel
    {    
        const TABLE = 'users';
        public function getAll(){
            return $this->all(self::TABLE);
        }
        public function create($data){
            $this->store(self::TABLE,$data);
        }
        public function save($id,$data = []){           
            $this->update(self::TABLE,$id,$data);
        }
        public function destroy($id){
            $this->delete(self::TABLE,$id);
        }
    }
    
?>