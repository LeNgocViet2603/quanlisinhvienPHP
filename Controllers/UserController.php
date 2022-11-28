<?php 
    class UserController extends BaseController
    {
        private $userModel;
        public function __construct()
        {
            $this->loadModel('User');
            $this->userModel = new UserModel();
        }
        public function index(){
            $data = array('1','2','3');
            $title = 'test';
            $users = $this->userModel->getAll();            
            return $this->view('backend.users.index',[
                'userList' => $data, 'title' => $title,'user'=> $users
            ]);
        }
        public function show($params){
            echo 'this is show function with params is';
            var_dump($params);
        }  
        public function addUser(){
            // sau này trong project thực tế $data sẽ là thông tin nhận từ người dùng 
            // gửi lên thông qua form với các phương thức Post hoặc get
            $data = [
                'name' => 'test',
                'role' => 'admin'
            ];
            $this->userModel->create($data);
        }
        // public function saveChange(){
        //     // trong project thực tế $data và $id sẽ là dữ liệu nhận được từ người dùng gửi đến thông qua form
        //     // sử dụng các phương thức get hoặc post
        //     $data = [
        //         "key1" => "test1",
        //         "key2" => "test2"
        //     ];
        //     $id = $_GET['id'];
        //     $this->userModel->save($id,$data);
        // }     
        public function delete(){
            $id = $_GET['id'];
            $this->userModel->destroy($id);
        } 
    }
    
?>