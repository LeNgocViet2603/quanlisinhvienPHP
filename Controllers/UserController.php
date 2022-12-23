<?php 
    class UserController extends BaseController
    {
        private $userModel;
        private $detailUserModel;
        public function __construct()
        {
            $this->loadModel('User');
            $this->userModel = new UserModel();
            $this->loadModel('Userdetail');
            $this->detailUserModel = new UserdetailModel();
        }
        public function index(){
            // $data = array('1','2','3');
            // $title = 'test';
            // $users = $this->userModel->getAll();            
            // return $this->view('backend.users.index',[
            //     'userList' => $data, 'title' => $title,'user'=> $users
            // ]);
        }  
        public function delete(){
            $id = $_GET['id'];
            $this->userModel->destroy($id);
        }
        public function profile(){
            if($this->isLogged()){   
                $allInforUser = $this->detailUserModel->getAllInfor($_SESSION['user']['inforUser']['user_id']);
                //var_dump($allInforUser);             
                return $this->view('backend.layout.master_layout',[
                    'page' => 'profile',
                    'controller' => 'users',
                    'allInforUser' => $allInforUser              
                ]);
            }else{
                header('location:http://localhost:8080/mvcProject/login');
            }
        }
        public function updateProfile(){
           // var_dump($_FILES['filename']) ;
            if(isset($_POST['btn_saveProfile'])){
                $firstname = (isset($_POST['firstname']) && !empty($_POST['firstname'])) ? $_POST['firstname'] : 'NULL';
                $lastname = (isset($_POST['lastname']) && !empty($_POST['lastname'])) ? $_POST['lastname'] : 'NULL';
                $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $_POST['phone'] : 'NULL';
                $d_name = (isset($_POST['d_name']) && !empty($_POST['d_name'])) ? $_POST['d_name'] : 'NULL';
                $address = (isset($_POST['address']) && !empty($_POST['address'])) ? $_POST['address'] : 'NULL';
                $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : $_SESSION['user']['inforUser']['user_name'];
                $imgPath = $this->detailUserModel->getAllInfor($_SESSION['user']['inforUser']['user_id'])['avatar'];

                if(isset($_FILES['filename'])){                    
                    if(!empty($_FILES['filename'])){
                        $imgPath = $this->uploadFile();                                                                     
                    }
                }
                if(!$imgPath){                    
                    if(empty($imgPath)){
                        $imgPath = 'avatar-default.jpg';
                    }
                }  
                $data = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'phone' => $phone,
                    'd_name' => $d_name,
                    'address' => $address,
                    'email' => $email,
                    'imgPath' => $imgPath
                ];
                if($this->detailUserModel->updateProfile($data)){                    
                    header('location:http://localhost:8080/mvcProject/user/profile');
                }else{
                    die('Cập nhật không thành công');
                }
            }         
        }        
        public function logout(){
            if($this->isLogged()){
                unset($_SESSION['user']);
                header('location:http://localhost:8080/mvcProject/login');
            }
        } 
    }
    
?>