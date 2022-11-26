
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật sinh viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Cập nhật sinh viên</li>
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
              <h3 class="card-title">Cập nhật</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="student/updateStudent/<?php echo $inforStudent['st_id']; ?>" method="post">
                <div class="form-group">
                  <label for="inputName">Họ Tên sinh viên</label>
                  <input type="text" id="inputName" name="stName" value="<?php echo $inforStudent['name']; ?>" class="form-control">
                </div>
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                  <label for="fecha1">Ngày sinh</label>
                  <div class="datepicker date input-group">
                    <input type="text" placeholder="Choose Date" value="<?php echo date('d-m-Y',strtotime($inforStudent['birthdate'])); ?>" name="stBirth" class="form-control" id="fecha1">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Giới tính</label>
                  <br>
                    <?php if($inforStudent['sex'] == '0'){ ?>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="0" checked name="optSex">Nam
                        </label>
                      </div> 
                      <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="1" name="optSex">Nữ
                          </label>
                      </div>     
                      <?php }else{ ?>
                        <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input"  name="optSex">Nam
                        </label>
                      </div> 
                      <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" checked name="optSex">Nữ
                          </label>
                      </div>    
                  <?php } ?>                 
                </div>
                <div class="form-group">
                  <label for="inputStatus">Lớp</label>
                  <select id="inputStatus" name="stClass" class="form-control custom-select">
                    <option disabled>--Chọn lớp--</option>
                    <!--Bắt đầu chỉnh sửa chỗ này!-->
                    <?php foreach ($classroms as $key => $value) { ?>
                      <?php if($value['classID'] == $inforStudent['classID']){ ?>                            
                        <option value="<?php echo $value['classID'];  ?>" selected><?php echo $value['classCode']; ?></option>                     
                      <?php }else{ ?>
                        <option value="<?php echo $value['classID'];  ?>"><?php echo $value['classCode']; ?></option>                     
                      <?php } ?>
                    <?php } ?>                                                                  
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Địa chỉ</label>
                  <select id="inputStatus" name="stAddress" class="form-control custom-select">
                    <option disabled>--Chọn Tỉnh--</option>
                    <?php
                      $listProvince = array('Quảng Nam','Đà Nẵng','Bến Tre','Quảng Ngãi');
                      foreach ($listProvince as $key => $value) {
                          if($inforStudent['address']==$value){?>
                              <option value="<?php echo $inforStudent['address']; ?>" selected><?php echo $inforStudent['address']; ?></option>                    
                      <?php }else{ ?>
                              <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                      <?php }} ?>           
                  </select>
                </div>                 
                        
            </div>
            <!-- /.card-body -->
          </div>
          <div class="col-12">
            <input type="submit" value="Lưu" class="btn btn-success float-left">
          </div>
          </form>
          <!-- /.card -->
        </div>        
      </div>      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->