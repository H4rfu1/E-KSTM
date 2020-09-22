  <div class="container">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


      <!-- Logo -->
      <a class="top-brand d-flex align-items-center justify-content-center" href="<?= base_url('') ?>">
        <div class="top-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="top-brand-text mx-3">E-KSTM</div>
      </a>



      <!-- Topbar Navbar -->
      <?php if (is_logged_in("home")) {
        echo '
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="btn btn-primary" href="'. base_url("auth/registration") .'" role="button">Daftar</a>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="btn btn-primary" href="'. base_url("auth") .'" role="button">Masuk</a>
            </li>
          </ul>
        ';
      } else {
        echo '
        <ul class="navbar-nav ml-auto">

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">'. $user['name'] .'</span>
              <img class="img-profile rounded-circle" src="'. base_url('assets/img/profile/'). $user['image'] .'">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="'.base_url('auth/logout') .'" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>
      ';
      }?>

    </nav>
    <!-- End of Topbar -->
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?php echo base_url('auth/registration/'); ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="fullname" name="fullname" placeholder="Full Name" value="<?= set_value('fullname'); ?>">
                  <?= form_error('fullname','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                  <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="Password1" name="password1" placeholder="Password">
                    <?= form_error('password1','<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="Password2" name="password2" placeholder="Repeat Password">

                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>

              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?php echo base_url("auth"); ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
