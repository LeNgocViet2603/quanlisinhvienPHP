<?php 
    class StudentController extends BaseController
    {
        private $studentModel;
        private $modelClass;
        public function __construct()
        {
            $this->loadModel('student');
            $this->studentModel = new StudentModel();  
            $this->loadModel("class");
            $this->modelClass = new ClassModel();
        }
        public function index2(){
            $listSt = $this->studentModel->getList();
            $this->view('backend.layout.master_layout',[
                'page' => 'index',
                'controller' => 'student',
                'listStudent' => $listSt,
                
            ]);
        }
        public function index(){
            if($this->isLogged()){
                $listSt = $this->studentModel->getList();
                $listDeleted = $this->studentModel->getStudentDeleted();
                $all = count($listSt);
                $deleted = count($this->studentModel->getStudentDeleted());
                return $this->view('backend.layout.master_layout',[
                    'page' => 'index2',
                    'controller' => 'student',
                    'listStudent' => $listSt,
                    'listDeleted' => $listDeleted,
                    'all' => $all,
                    'deleted' => $deleted                 
                ]);
            }else{
                header('location:http://localhost:8080/mvcProject/login');
            }

        }
        public function showAddStudent(){
            $allClass = $this->modelClass->getAllClass();
            return $this->view('backend.layout.master_layout',[
                'page' => 'showAddStudent',
                'controller' => 'student',
                'classroms' => $allClass
            ]);
        }
        public function addStudent(){
            // nhận dữ liệu được gửi thông qua form
            $stName = $_REQUEST['stName'];
            $stBirth = $_REQUEST['stBirth'];
            $stGender = $_REQUEST['stGender'];
            $stClass = $_REQUEST['stClass'];
            $stAddress = $_REQUEST['stAddress'];
            $isSuccess = false;
            $data = [
                'name' =>$stName,
                'birthdate' => $stBirth,
                'sex' => $stGender,
                'classID' => $stClass,
                'address' => $stAddress
            ];        
            if($this->studentModel->addStudent($data)){
                $isSuccess = true;
            }
            
            return $this->view('backend.layout.master_layout',[
                'page' => 'index',
                'controller' => 'student',
                'isSuccess' => $isSuccess,                    
                'listStudent' => $this->studentModel->getList()
            ]);           
        }
        public function showUpdate($id){
            $inforStudent = $this->studentModel->findByID($id);
            if(empty($id) || empty($inforStudent)){
                $poup = "<script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Không tồn tại sinh viên này'
                    }).then(okay => {
                        if (okay) {
                         window.location.href = \"http://localhost:8080/mvcProject/student/\";
                       }});
                </script>";
                return $this->view('backend.layout.showAlert',[
                    'poup' => $poup
                ]);
                
            }else{
                $allClass = $this->modelClass->getAllClass();
                return $this->view('backend.layout.master_layout',[                
                    'page' => 'showUpdate',
                    'controller' => 'student',
                    'inforStudent' => $inforStudent,
                    'classroms' => $allClass
                ]);
            }
            
            
        }
        public function updateStudent($id){
            $stName = $_REQUEST['stName'];
            $stBirth = $_REQUEST['stBirth'];
            $stGender = $_REQUEST['optSex'];
            $stClass = $_REQUEST['stClass'];
            $stAddress = $_REQUEST['stAddress'];
            $data = [
                'name' =>$stName,
                'birthdate' => $stBirth,
                'sex' => $stGender,
                'classID' => $stClass,
                'address' => $stAddress
            ];    
            $poup='';
            if($this->studentModel->save($data,$id[0])){                
                $poup = "<script>
                Swal.fire({
                icon: 'success',
                title: 'Cập nhật thành công',
                }).then(okay => {
                    if (okay) {
                     window.location.href = \"http://localhost:8080/mvcProject/student/\";
                   }});
            </script>";
            }else{
                $poup = "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Không thể cập nhật sinh viên này'
                }).then(okay => {
                    if (okay) {
                     window.location.href = \"http://localhost:8080/mvcProject/student/\";
                   }});
            </script>";
            }
           return $this->view('backend.layout.showAlert',[
                'poup' => $poup
           ]); 
        }
        public function delStudent($id){
            if($this->studentModel->del($id[0])){
                echo 200;
            }else{
                echo 500;
            }
        }
        public function restore($id){
            if($this->studentModel->restore($id[0])){
                echo 200;
            }else{
                echo 500;
            }
        }
    }
    
?>