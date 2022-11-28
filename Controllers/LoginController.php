<?php 
    class LoginController extends BaseController
    {
        private $userModel;
        public function __construct()
        {
            $this->loadModel('user');
            $this->userModel = new UserModel();             
        }
        public function index(){            
            return $this->view('backend.login');
        }
        public function auth(){
            if(isset($_POST['btn_login'])){
                $username = $_POST['user_name'];
                $pass = $_POST['password'];
                $data = ['username'=>$username,'password' => $pass];
                if($this->userModel->check($data)){
                    $_SESSION['user'] = $data;
                    header('Location:http://localhost:8080/mvcProject/');
                }
                else{
                    $err = "Sai tên đăng nhập hoặc mật khẩu!";
                    return $this->view('backend.login',[
                        'message' => $err
                    ]);                
                }           
            }
            
        }
    }
    
?>