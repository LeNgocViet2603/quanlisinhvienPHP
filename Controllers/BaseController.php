<?php 
    class BaseController        
    {   
        const VIEW_FOLDER_NAME = 'Views';
        const MODEL_FOLDER_NAME = 'Models';
        // Hàm này để controller load và truyền dữ liệu ra view
        protected function view($path,array $data = []){
            // duyệt qua tất cả dữ liệu được truyền đến view và tạo các biến từ các key
            // những biến xuất hiện trước require thì sẽ xuất hiện được trong file view
            foreach ($data as $key => $value) {
                $$key = $value;
            }            
            $path = self::VIEW_FOLDER_NAME.'/'.str_replace('.','/',$path).'.php';
            return require ($path);
        }
        protected function loadModel($model){
            $model = self::MODEL_FOLDER_NAME.'/'.$model.'Model.php';
            return require_once ($model);
        }
    }
    
?>