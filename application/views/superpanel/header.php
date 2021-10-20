<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>
<?=@$title;?>
</title>
<!-- plugins:css -->
<link rel="stylesheet" href="<?= base_url();?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendors/iconfonts/puse-icons-feather/feather.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendors/css/vendor.bundle.addons.css">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="<?= base_url();?>assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?= base_url();?>assets/vendors/lightgallery/css/lightgallery.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">
<link rel="stylesheet" href="<?= base_url();?>assets/css/mystyle.css">
<!-- endinject -->
<link rel="shortcut icon" href="<?=base_url();?>images/nomadic-logo.png" />


<!--------------------- Text Editor plugin css -------------------------------------->
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-success">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="<?= base_url();?>superpanel/home"><img src="<?= base_url();?>images/nomadic-logo.png" alt="logo"/ style="max-width: 250%;height: 58px;"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">   
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-profile" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img src="https://placehold.it/100x100" alt="image">
              <span class="d-none d-lg-inline">Welcome <?= $this->session->userdata('username')?></span>
            </a>
            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url()?>superpanel/home/logout">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
            </div>
          </li>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
    
    <?php $this->load->view('superpanel/leftbar');?>
 
  

