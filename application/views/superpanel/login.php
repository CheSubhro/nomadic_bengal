
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title;?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/iconfonts/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url();?>images/nomadic-logo.png" />
</head>

<body id="bd">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper" >
      <div class="content-wrapper d-flex align-items-center auth register-full-bg" style="background: url(<?php echo base_url()?>images/nomadic_bengal_background.jpg);background-size: cover;">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
              
              <?php if($this->session->flashdata('loginerror')!=''){?>
              <div class="alert alert-fill-danger" style="background-color:#f9d2d5; padding:10px;text-align:center;">
                <button type="button" class="close" data-dismiss="alert">&#10006;</button>
                <strong style="color:#900;"><?php echo @$this->session->flashdata('loginerror');?></strong>
              </div>
              <?php }?>

              <?php if($this->session->flashdata('success')!=''){?>
                  <center>
                      <div class="alert alert-success" > <strong><?php echo @$this->session->flashdata('success');?></strong> </div>
                  </center>
              <?php }?>

            <div class="auth-form-light text-left p-5">
              <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/nomadic-logo.png" alt="logo" width="90px"/>
                </a>
              </div>
                <h3 class="text-center">Nomadic Bengal</h3>
                <h4 class="font-weight-light text-center">Login to the Admin Account</h4>

                <form class="pt-4" action="<?php echo base_url();?>superpanel/main/login_validation" method="POST">
                  
                  <div class="form-group">
                    <label for="Username"><b>Username</b></label>
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                    <i class="mdi mdi-account"></i>
                  </div>

                  <div class="form-group">
                    <label for="Password"><b>Password</b></label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <i class="mdi mdi-eye"></i>
                  </div>

                  <div class="mt-5">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium">Login</button>
                  </div>
                  
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url();?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>assets/js/misc.js"></script>
  <script src="<?php echo base_url();?>assets/js/settings.js"></script>
  <script src="<?php echo base_url();?>assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
