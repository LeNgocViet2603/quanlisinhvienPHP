<?php 

    /**
     * file này dùng để xử lí url và định tuyến
     */
    $arr = [];  
    /**
     * Mặc định cho controller name và action name là HomeController và index
     */
    $controllerName = 'HomeController';
    $actName = 'index';
    $params = [];
    if(isset($_REQUEST['url'])){
        // biến $arr sẽ là nơi chứa url truyền lên thanh địa chỉ sau khi đã chuyển từ chuỗi url thành
        // mảng 
        /**
         * $arr[0] : tên của controller
         * $arr[1] : tên của action (tên phương thức trong class $arr[0]Controller)
         * Từ $arr[3]->hết mảng : là các param
         */
        $arr = explode('/',filter_var(trim($_REQUEST['url'],'/'))); 
        // check có tồn tại file $arr[0]Controller.php trong thư mục Controllers
        if(file_exists("./Controllers/".ucfirst($arr[0])."Controller.php")){            
            $controllerName = ucfirst(strtolower($arr[0])).'Controller';                        
            require_once "./Controllers/${controllerName}.php";
            // check người dùng có truyền lên action (tên phương thức)
            if(isset($arr[1])){
                if(method_exists($controllerName,$arr[1])){
                    $actName = strtolower($arr[1]);
                }else{
                    $backControl = $arr[0];
                    header("Location:http://localhost:8080/mvcProject/$backControl/");
                }
                /** unset để phục vụ cho việc lấy giá trị cho vào mảng params[] */
                unset($arr[0]);
                unset($arr[1]);
            } 
             
        }else{
            header('Location:http://localhost:8080/mvcProject/Home/');
        }
    }  
    $params = $arr?array_values($arr):[];      
    require_once "./Controllers/${controllerName}.php";
    // khởi tạo đối tượng của Controller được truyền lên tương ứng
    $objController = new $controllerName;
    // Thực thi phương thức
    $objController->$actName($params) ;
?>