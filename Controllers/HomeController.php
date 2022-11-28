<?php 
    class HomeController extends BaseController
    {
        private $homeModel;
        public function __construct()
        {
            $this->loadModel('Home');
            $this->homeModel = new HomeModel();
        }
        public function index(){
            // trả ra view,xác định tên giao diện hiển thị là index (trong thư mục view)
            if($this->isLogged()){
                return $this->view('backend.layout.master_layout',[
                    "page" => 'index',
                    "controller" => 'Home'
                ]);
            }else{
                header('location:http://localhost:8080/mvcProject/login');
            }
            
        }
        
        public function show(){
            return $this->view('backend.layout.master_layout',[
                "page" => 'show'
            ]);
        }        
    }
    
?>