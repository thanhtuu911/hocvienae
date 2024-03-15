<!-- Video -->
<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <!-- <source src="video/ae.mp4"> -->
            <source src="../video/ae2.mp4">
        </video>
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
        <h1 class="my-content">Welcome to America English</h1>
        <small class="my-content"> </small> <br>
        <!-- Button trigger modal -->
        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Started</a>
    </div>
</div>
<!-- end video -->

<!-- Start student registration modal - Hình thức đăng ký học sinh -->
<!-- Modal -->
<div class="modal fade" id="stuRegterModalCenter" tabindex="-1" aria-labelledby="stuRegterModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="stuRegterModalCenterLabel">Đăng ký học viên</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- body form -->
        <form>
          <div class="form-group">
          <i class="fa-solid fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label><input type="text" class="form-control" placeholder="Nhap Ten" name="stuname" id="stuname">
          </div>

          <div class="form-group">
            <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Nhap Email" name="stuemail" id="stuemail">
            <small class="form-text">Chung toi hong bao gio chia se email cho nguoi khac</small>  
          </div>

          <div class="form-group">
            <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label><input type="password" class="form-control" placeholder="Nhap mat khau" name="stupass" id="stupass">
          </div>
        </form>
<!-- end body form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Sign up</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End student registration modal - Hình thức đăng ký học sinh -->

<!-- Start student login - Hình thức đăng nhập học sinh -->
<!-- Modal -->
<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="stuLoginModalLabel">Dang nhap</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- body form -->
        <form id="stuLoginForm">
          <div class="form-group">
            <i class="fas fa-envelope"></i><label for="stuLogemail" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Nhap Email" name="stuLogemail" id="stuLogemail">
          </div>

          <div class="form-group">
            <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control" placeholder="Nhap mat khau" name="stuLogpass" id="stuLogpass">
          </div>
        </form>
<!-- end body form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="stuLoginBtn">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel/button>
      </div>
    </div>
  </div>
</div>
<!-- End student login modal - Hình thức đăng nhap học sinh -->


<!-- Start Admin login - Hình thức đăng nhập admin -->
<!-- Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="adminLoginModalCenterLabel">Đăng nhập Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- body form -->
        <form id="adminLoginForm">
          <div class="form-group">
            <i class="fas fa-envelope"></i><label for="adminLogemail" class="pl-2 font-weight-bold">Email</label><input type="email" class="form-control" placeholder="Nhap Email" name="adminLogemail" id="adminLogemail">
          </div>

          <div class="form-group">
            <i class="fas fa-key"></i><label for="adminLogpass" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control" placeholder="Nhap mat khau" name="adminLogpass" id="adminLogpass">
          </div>
        </form>
<!-- end body form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="adminLoginBtn">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel/button>
      </div>
    </div>
  </div>
</div>
<!-- End Admin login modal - Hình thức đăng nhap Admin -->