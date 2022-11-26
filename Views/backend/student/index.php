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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách sinh viên</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
                          <button class="btn btn-primary "><a href="student/showUpdate/<?php echo $student['st_id']; ?>" class="text-white"><i class="pr-2 fa fa-pen-nib"></i>Chỉnh sửa</a></button>
                          <button class="btn btn-danger "><a href="student/del/<?php echo $student['st_id']; ?>" class="text-white"><i class="pr-2 fa fa-trash"></i>Xóa</a></button>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
