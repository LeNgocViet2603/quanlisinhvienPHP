  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm mới một sinh viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thêm mới sinh viên</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6 mb-5">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm mới</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="student/addStudent" method="post">
                <input type="hidden" name="act" value="addSt">
                <div class="form-group">
                  <label for="inputName">Họ Tên sinh viên</label>
                  <input type="text" id="inputName" name="stName" class="form-control">
                </div>
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                  <label for="fecha1">Ngày sinh</label>
                  <div class="datepicker date input-group">
                    <input type="text" placeholder="Choose Date" name="stBirth" class="form-control" id="fecha1">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Giới tính</label>
                  <select id="inputStatus" name="stGender" class="form-control custom-select">
                    <option selected disabled>--Chọn giới tính--</option>
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>                
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Lớp</label>
                  <select id="inputStatus" name="stClass" class="form-control custom-select">
                    <option selected disabled>--Chọn lớp--</option>
                    <?php foreach ($classroms as $key => $value) { ?>
                      <option value="<?php echo $value['classID'];  ?>"><?php echo $value['classCode']; ?></option>
                    <?php } ?>                                              
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Địa chỉ</label>
                  <select id="inputStatus" name="stAddress" class="form-control custom-select">
                    <option selected disabled>--Chọn Tỉnh--</option>
                    <option value="Quảng Nam">Quảng Nam</option>
                    <option value="Bến Tre">Bến Tre</option>    
                    <option value="Đà Nẵng">Đà Nẵng</option>             
                  </select>
                </div>                 
                        
            </div>
            <!-- /.card-body -->
          </div>
          <div class="col-12">
            <input type="submit" value="Thêm mới" class="btn btn-success float-left">
          </div>
          </form>
          <!-- /.card -->
        </div>        
      </div>      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->