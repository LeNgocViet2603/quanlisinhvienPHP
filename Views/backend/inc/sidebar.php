<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="public/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-wrap">Quản lí sinh viên</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="public/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php if(isset($_SESSION['user'])) echo substr($_SESSION['user']['username'],0,strpos($_SESSION['user']['username'],'@')) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">            
            <a href="#" class="nav-link" id="test">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lí sinh viên
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="student/index" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Xem Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="student/showAddStudent" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                  <p>Thêm Sinh viên</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href=".?act=users" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users                
              </p>
            </a>
          </li>
          <li class="nav-item">            
            <a href="#" class="nav-link" id="test">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Đăng xuất
              </p>
            </a>            
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>