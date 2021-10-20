            <div class="main-panel">
              <div class="content-wrapper">

              <div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-primary">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>superpanel/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Manage User</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>viewer</span></li>
                      </ol>
                    </nav>
                  </div>
                </div>
              </div>
                      
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">viewer</h4>
                     <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">
                                <th><b>Slno.</b></th>
                                <th><b>Viewer Full Name</b></th>
                                <th><b>Email ID</b></th>
                                <th><b>Phone No</b></th>
                                <th><b>Actions</b></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; foreach ($viewer as $c){?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $c->viewer_fullname;?></td>
                                <td><?php echo $c->email;?></td>
                                <td><?php echo $c->phone_no;?></td>
                                <td>
                                  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $i ;?>">View</button>
                                </td>
                            </tr>
                            <?php $i++; }?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!-- content-wrapper ends -->

              <!-- Modal starts -->
              <?php $i=1; foreach ($viewer as $c){?>
                  <div class="modal fade" id="exampleModal<?php echo $i ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>View viewer</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row center-block">
                              <div class="col-md-12">

                                  <div class="form-group row">

                                      <div class="col-sm-3">
                                        <label for="viewer First Name"><b>viewer Full Name:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->viewer_fullname ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="viewer Email Id"><b>viewer Email Id:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->email ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="viewer Password"><b>viewer Password:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->password ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="viewer Phone No"><b>viewer Phone No:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->phone_no ?>">
                                      </div>
                                      
                                  </div>
                              </div>

                              <div class="col-md-12">

                                  <div class="form-group row">

                                      <div class="col-sm-3">
                                        <label for="viewer Location"><b>viewer Gender:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->gender ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="viewer Location"><b>viewer Wine Interest:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->wine_interest ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="viewer Email Verification"><b>viewer Email Verification:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->email_verification ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="viewer Registration Date"><b>viewer Registration Date:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->reg_date ?>">
                                      </div>
    
                                  </div>
                              </div>

                             </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $i++; }?>
            