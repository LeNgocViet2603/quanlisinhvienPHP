
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid card">
            <div class="row">
                <div class="col-md-8">
                    <form action="user/updateProfile" class="row" enctype="multipart/form-data" method="post">
                        <div class="col-md-6">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="filename" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image:<?php echo "url(Uploads/avt/".$allInforUser['avatar'].");" ?>">
                                        </div>
                                    </div>                        
                                </div>
                                <div>                            
                                    <div><span class="font-weight-bold"><?php echo $allInforUser['display_name']; ?></span></div>
                                    <div><span class="text-black-50"><?php echo $allInforUser['email']; ?></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile Settings</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Họ đệm</label><input type="text" class="form-control" name="firstname" placeholder="first name" value=""></div>
                                    <div class="col-md-6"><label class="labels">Tên</label><input type="text" class="form-control" value="" name="lastname" placeholder="last name"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="text" name="phone" class="form-control" placeholder="enter phone number" value=""></div>
                                    <div class="col-md-12"><label class="labels">Tên hiển thị</label><input type="text" name="d_name" class="form-control" placeholder="enter address line 1" value=""></div>
                                    <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text" class="form-control" name="address" placeholder="enter address line 2" value=""></div>
                                    <div class="col-md-12"><label class="labels">Email liên hệ</label><input type="text" class="form-control" name="email" placeholder="enter address line 2" value=""></div>                           
                                </div>                        
                                <div class="mt-5 text-center"><input class="btn btn-primary profile-button" type="submit" name="btn_saveProfile" value="save profile"/></div>
                            </div>
                        </div>                    
                    </form>
                </div>
                <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center experience"><h4>Bảo mật</h4><div> <input class="border px-3 p-1 add-experience bg-info rounded" type="submit" value="Change"> </div></div><br>
                            <div class="col-md-12"><label class="labels">Mật khẩu cũ</label><input type="password" class="form-control" placeholder="password" value=""></div> <br>
                            <div class="col-md-12"><label class="labels">Mật khẩu mới</label><input type="password" class="form-control" placeholder="additional details" value=""></div> <br>
                            <div class="col-md-12"><label class="labels">Xác nhận mật khẩu</label><input type="password" class="form-control" placeholder="additional details" value=""></div>
                        </div>
                </div>
            </div>
        </div>
      <!-- /.container-fluid -->
    </section>
</div>