<?php 
    class RegisterController extends BaseController
    {
        private $userModel;
        public function __construct()
        {
            $this->loadModel('user');
            $this->userModel = new UserModel(); 
        }
        public function index(){
            return $this->view('backend.register');
        }
        // thực hiện validate form và register
        public function valRegister(){
            if(isset($_POST['btn_register'])){
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                $confirm_pass = $_POST['confirm_password'];
                //tạo mảng để bắt các lỗi validate form
                $err = [];
                if(empty($user_name)){
                    $err['err_username']= 'Bạn chưa nhập user name *';
                }
                if(empty($password)){
                    $err['err_password'] = 'Vui lòng nhập mật khẩu *';
                }
                if($password != $confirm_pass){
                    $err['err_confirmpass'] = 'Mật khẩu không khớp với mật khẩu được nhập! *';
                }
                // nếu không có lỗi(đã validate)
                if(empty($err)){
                    // tạo mảng chứa thông tin cho việc đăng kí (username,password)
                    $infor = ['username' => $user_name,'password'=>$password];
                    // gọi đến method register trong class UserModel truyền tham số là 
                    // 1 mảng chứa thông tin phục vụ cho việc đăng kí
                    if($this->userModel->register($infor)){
                        header('location:http://localhost:8080/mvcProject/login');                    
                    }else{
                        echo 'có lỗi';
                    } 
                }else{
                    // nếu có lỗi thì truyền lỗi để hiển thị ra view 
                    return $this->view('backend.register',[
                        'err'=>$err
                    ]);
                }
                
            }
        }
    }
    
?>