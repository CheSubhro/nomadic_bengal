<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="template-demo">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Global Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Add Admin User</span></li>
                        </ol>
                    </nav>
                </div>&nbsp;
                <h1 class="card-title alert alert-success text-center" align="center"><b>Add Admin User</b></h1>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="cmxform" id="signupForm" method="post" action="<?= base_url()?>/superpanel/admin_user/insert" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Select User Role:</b></label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single" style="width:100%" name="user_role">
                                                <option>--Select--</option>
                                                <option value="1">Admin</option>
                                                <option value="0">Sub Admin</option>
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
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Password:</b></label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Re Type Password:</b></label>
                                        <div class="col-sm-10">
                                            <input type="password" name="repassword" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Email:</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Image:</b></label>
                                        <div class="col-sm-10">
                                            <input type="file" class="dropify" data-height="300" / name="image">
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
                                              <option value="">--Select--</option>
                                              <option value="1">Active</option>
                                              <option value="0">Deactive</option>
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
                                                    <input type="checkbox" name="viewer" class="form-check-input" checked value="1">
                                                    Viewer
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                         
                                            <h5><b>Menu</b></h5>
                                                    
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="menu" class="form-check-input" checked value="1">
                                                    Menu
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                                                                       
                                            <h5><b>Slider</b></h5> 
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="slider" class="form-check-input" checked value="1">
                                                    Slider
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>

                                            <h5><b>Manage Destination</b></h5> 
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="destination_category" class="form-check-input" checked value="1">
                                                    Destination Category
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="destination_place_item" class="form-check-input" checked value="1">
                                                    Place Item
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="destination_place_item_brief" class="form-check-input" checked value="1">
                                                    Place Item Brief
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="destination_gallary" class="form-check-input" checked value="1">
                                                    Gallary
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            
                                            <h5><b>Manage Things To Do</b></h5>
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="things_to_do_category" class="form-check-input" checked value="1">
                                                    Category
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="things_to_do" class="form-check-input" checked value="1">
                                                    Things To Do
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            
                                            <h5><b>Manage Recent Trips</b></h5>
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="recent_trips_category" class="form-check-input" checked value="1">
                                                    Category
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="recent_trips" class="form-check-input" checked value="1">
                                                    Recent Trips
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>

                                            <h5><b>CMS</b></h5>
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="cms_pages" class="form-check-input" checked value="1">
                                                    CMS
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>

                                            <h5><b>Newsletter</b></h5>

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="newsletter" class="form-check-input" checked value="1">
                                                    Newsletter
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>

                                            <h5><b>Manage Global Settings</b></h5>
                                            
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="general_settings" class="form-check-input" checked value="1">
                                                    General Settings
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="logo" class="form-check-input" checked value="1">
                                                    Logo
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="admin_users" class="form-check-input" checked value="1">
                                                    Admin Users
                                                    <i class="input-helper"></i>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="change_password" class="form-check-input" checked value="1">
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