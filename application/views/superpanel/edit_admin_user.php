<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="template-demo">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Global Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Edit Admin User</span></li>
                        </ol>
                    </nav>
                </div>&nbsp;
                <h1 class="card-title alert alert-success text-center" align="center"><b>Update Admin User</b></h1>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="cmxform" id="signupForm" method="post" action="<?= base_url()?>/superpanel/admin_user/update/<?= $admin[0]->id;?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $admin[0]->id;?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Select User Role:</b></label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single" style="width:100%" name="user_role">
                                                <option value="1" <?php if($admin[0]->user_role == 1){ echo 'selected';} ?>>Admin</option>
                                                <option value="0" <?php if($admin[0]->user_role == 0){ echo 'selected';} ?>>Sub Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Name Of The User:</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" value="<?= $admin[0]->username?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Email:</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" class="form-control" value="<?= $admin[0]->email?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Image:</b></label>
                                        <div class="col-sm-5">
                                            <img src="<?= $admin[0]->image?>"class="img-lg rounded" style="width:160px;height:150px;">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" class="dropify" name="image" data-height="150" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Status:</b></label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single" style="width:100%"  name="status">
                                                <option value="1" <?php if($admin[0]->status == 1){ echo 'selected';} ?>>Active</option>
                                                <option value="0" <?php if($admin[0]->status == 0){ echo 'selected';} ?>>Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Menu Assign:</b></label>
                                        <div class="col-sm-10">
                                         
                                            <h5><b>Manage User</b></h5>
                                                    
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="viewer" class="form-check-input"  value="1" <?php if($admin_access[0]->viewer == 1){ echo 'checked';} ?>>
                                                    Viewer
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                         
                                            <h5><b>Menu</b></h5>
                                                    
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="menu" class="form-check-input"  value="1" <?php if($admin_access[0]->menu == 1){ echo 'checked';} ?>>
                                                    Menu
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                                                                       
                                            <h5><b>Slider</b></h5> 
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="slider" class="form-check-input"  value="1" <?php if($admin_access[0]->slider == 1){ echo 'checked';} ?>>
                                                    Slider
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>

                                            <h5><b>Manage Destination</b></h5> 
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="destination_category" class="form-check-input"  value="1" <?php if($admin_access[0]->destination_category == 1){ echo 'checked';} ?>>
                                                    Destination Category
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="destination_place_item" class="form-check-input"  value="1" <?php if($admin_access[0]->destination_place_item == 1){ echo 'checked';} ?>>
                                                    Place Item
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="destination_place_item_brief" class="form-check-input"  value="1" <?php if($admin_access[0]->destination_place_item_brief == 1){ echo 'checked';} ?>>
                                                    Place Item Brief
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="destination_gallary" class="form-check-input"  value="1" <?php if($admin_access[0]->destination_gallary == 1){ echo 'checked';} ?>>
                                                    Gallary
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            
                                            <h5><b>Manage Things To Do</b></h5>
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="things_to_do_category" class="form-check-input"  value="1" <?php if($admin_access[0]->things_to_do_category == 1){ echo 'checked';} ?>>
                                                    Category
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="things_to_do" class="form-check-input"  value="1" <?php if($admin_access[0]->things_to_do == 1){ echo 'checked';} ?>>
                                                    Things To Do
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            
                                            <h5><b>Manage Recent Trips</b></h5>
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="recent_trips_category" class="form-check-input"  value="1" <?php if($admin_access[0]->recent_trips_category == 1){ echo 'checked';} ?>>
                                                    Category
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="recent_trips" class="form-check-input"  value="1" <?php if($admin_access[0]->recent_trips == 1){ echo 'checked';} ?>>
                                                    Recent Trips
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>

                                            <h5><b>CMS</b></h5>
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="cms_pages" class="form-check-input"  value="1" <?php if($admin_access[0]->cms_pages == 1){ echo 'checked';} ?>>
                                                    CMS
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>

                                            <h5><b>Newsletter</b></h5>

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="newsletter" class="form-check-input"  value="1" <?php if($admin_access[0]->newsletter == 1){ echo 'checked';} ?>>
                                                    Newsletter
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>

                                            <h5><b>Manage Global Settings</b></h5>
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="general_settings" class="form-check-input"  value="1" <?php if($admin_access[0]->general_settings == 1){ echo 'checked';} ?>>
                                                    General Settings
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="logo" class="form-check-input"  value="1" <?php if($admin_access[0]->logo == 1){ echo 'checked';} ?>>
                                                    Logo
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="admin_users" class="form-check-input"  value="1" <?php if($admin_access[0]->admin_users == 1){ echo 'checked';} ?>>
                                                    Admin Users
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="change_password" class="form-check-input"  value="1" <?php if($admin_access[0]->change_password == 1){ echo 'checked';} ?>>
                                                    Change Password
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->