
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách sinh viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card card-primary card-outline card-outline-tabs" id="table_student">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Tất cả <?php echo "($all)"; ?> </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-listDeleted" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Thùng rác <?php echo "($deleted)"; ?> </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <table id="table_all_student"  class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Họ Tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Lớp</th>
                                <th>Địa chỉ</th>
                                <th>Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listStudent as $key => $student) { ?>
                                    <?php if($student['visible']=='1'){?>
                                        <tr>
                                            <td><?php echo $student["name"]; ?></td>
                                            <td><?php echo date('d-m-Y',strtotime($student['birthdate'])); ?></td>
                                            <td>
                                            <?php 
                                                if($student['sex'] == 0){
                                                echo 'Nam';
                                                }else{
                                                echo 'Nữ';
                                                } 
                                            ?>
                                            </td>
                                            <td><?php echo $student['classCode']; ?></td>
                                            <td><?php echo $student['address']; ?></td>
                                            <td>
                                            <button class="btn btn-primary "><a href="student/showUpdate/<?php echo $student['st_id']; ?>" class="text-white"><i class="far fa-edit mr-1"></i>Sửa</a></button>
                                            <button class="btn btn-danger btn-del" value="<?php echo $student['st_id']; ?>"><i class="fas fa-trash mr-1"></i>Xóa</button>
                                            
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-listDeleted" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <table id="table_listDeleted" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Họ Tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Lớp</th>
                                <th>Địa chỉ</th>
                                <th>Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listDeleted as $key => $student) { ?>
                                        <tr>
                                            <td><?php echo $student["name"]; ?></td>
                                            <td><?php echo date('d-m-Y',strtotime($student['birthdate'])); ?></td>
                                            <td>
                                            <?php 
                                                if($student['sex'] == 0){
                                                echo 'Nam';
                                                }else{
                                                echo 'Nữ';
                                                } 
                                            ?>
                                            </td>
                                            <td><?php echo $student['classCode']; ?></td>
                                            <td><?php echo $student['address']; ?></td>
                                            <td>                                          
                                            <button class="btn btn-warning btn-restore" value="<?php echo $student['st_id']; ?>"><i class="fas fa-trash-restore mr-1"></i>Phục hồi</button>
                                            </td>
                                        </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                </div>
            </div>               
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
