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
            return $this->view('backend.layout.master_layout',[
                "page" => 'index',
                "controller" => 'Home'
            ]);
        }
        
        public function show(){
            return $this->view('backend.layout.master_layout',[
                "page" => 'show'
            ]);
        }        
    }
    
?>