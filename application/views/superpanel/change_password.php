<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="template-demo">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">Global Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Change Password</span></li>
                        </ol>
                    </nav>
                </div>&nbsp;
                <?php if($this->session->flashdata('success')!=''){?>
                <center>
                <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong><?php echo @$this->session->flashdata('success');?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </center>
                <?php }?>
                <?php if($this->session->flashdata('error')!=''){?>
                <center>
                <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong><?php echo @$this->session->flashdata('error');?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </center>
                <?php }?>
                <h1 class="card-title alert alert-success text-center" align="center"><b>Change Password</b></h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url();?>superpanel/change_password/update" method="post">
                            <input type="hidden" name="old_password" value="<?=$change_pass[0]->password;?>">

                            <div class="form-group">
                                <label for="Page Title"><b>New Password:</b></label>
                                <input class="form-control"  name="password" id="password" type="password" placeholder="Type new password..">
                                <span id="er2" class="mandatory"></span>
                            </div>
                            <div class="form-group">
                                <label for="Slug"><b>Confirm Password:</b></label>
                                <input class="form-control"  name="con_pass" id="con_pass" type="password" placeholder="Type confirm password..">
                                <span id="er3" class="mandatory"></span>
                            </div>
                            
            
                            <input class="btn btn-primary" type="submit" value="Submit" onclick="return change_pass();">
                        </form>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>