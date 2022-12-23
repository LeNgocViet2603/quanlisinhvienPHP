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
        protected function isLogged(){
            if(isset($_SESSION['user'])){
                return true;
            }else{
                return false;
            }
        }
        protected function uploadFile(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $userUpload = substr($_SESSION['user']['inforUser']['user_name'],0,strpos($_SESSION['user']['inforUser']['user_name'],'@'));
                $allow_ext = ['png','jpg','jpeg'];
                // giới hạn kích thước file
                $max_size = 10;
                $file = $_FILES['filename'];
                // đổi tên trước khi upload
                $file_name = $file['name'];
                $file_name = explode('.',$file_name);
                // lấy phần mở rộng của file -> dùng hàm end lấy phần tử cuối cùng trong array file_name
                $ext = end($file_name);
                // gán tên mới cho file
                $new_file = $userUpload.'_'.md5(uniqid()).'.'.$ext;                
                if(in_array($ext,$allow_ext)){
                    // convert byte to MB
                    //$size = $file['size']/1024/1024;
                    // if($size > $max_size){
                    //     echo 'lỗi';
                    // }else{
                        #code
                    //}              
                    $upload = move_uploaded_file($file['tmp_name'],'Uploads\avt\\'.$new_file);
                    if($upload){      
                        $imgPath = $new_file;        
                        return $imgPath;
                    }
                }
            }
            return false;
        }        
    }
    
?>