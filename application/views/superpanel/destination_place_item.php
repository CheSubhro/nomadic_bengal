<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
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
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style ="text-decoration: none">Home</a></li>
              				<li class="breadcrumb-item"><a href="javascript:void(0)" style ="text-decoration: none">Destination Place Item</a></li>
              				<li class="breadcrumb-item active" aria-current="page"><span>All Destination Place Item</span></li>
						</ol>
					</nav>
				</div>
				<a href="<?= base_url();?>superpanel/destination_place_item/add"><button type="button" class="btn btn-outline-success btn-sm" id="add_new">Add New</button></a>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Destination Place Item</h4>
				<div class="row">
					<div class="table-responsive">
						<table id="order-listing" class="table">
							<thead>
								<tr class="bg-primary text-white">
									<th><b>Sl No.</b></th>
					                <th><b>Category Name</b></th>
					                <th><b>Destination Name</b></th>
					                <th><b>Status</b></th>
					                <th><b>View</b></th>
					                <th><b>Action</b></th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($destination_place_item as $dpi){?>
								<tr>
									<td><?= $i;?></td>
					                <td><?php foreach($destination_category as $dc){?><?php if($dc->id == $dpi->destination_category_id){?><?= $dc->name;?><?php }?><?php }?></td>
					                <td><?= $dpi->name;?></td>
                    				<td><?php if($dpi->status==1){?><label class="badge badge-success">Active</label><?php }else if($dpi->status==0){?><label class="badge badge-danger">Deactive</label><?php }?></td> 
									<td><button class="btn btn-outline-primary" data-toggle="modal" data-target="#customerModal<?php echo $i ;?>">View</button></td>
									<td>
										<a href="<?= base_url();?>superpanel/destination_place_item/edit/<?= $dpi->id?>"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a>
										<a href="<?= base_url();?>superpanel/destination_place_item/delete/<?= $dpi->id?>" onclick="return confirm('Are you sure about this delete?');"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a>
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

<?php $i=1; foreach ($destination_place_item as $dpi){?>
	<div class="modal fade" id="customerModal<?php echo $i ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	 	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"><strong>View Destination Place</strong></h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        		<span aria-hidden="true">&times;</span>
			        	</button>
	      		</div>
	      		<div class="modal-body">
	        		<div class="row center-block">
	        			<?php if($dpi->front_image != ''){?>
	                    <div class="col-md-6">
	                        <div class="form-group row">
	                            <label class="col-sm-3 col-form-label"><b>Front Image: </b></label>
	                            <div class="col-sm-9">
	                                <img src="<?= $dpi->front_image ?>" class="img-circle" alt="" width="150" height="150">
	                            </div>
	                        </div>
	                    </div>
	                    <?php }?>
	               
	                    <?php if($dpi->thumb_image != ''){?>
	                    <div class="col-md-6">
	                        <div class="form-group row">
	                            <label class="col-sm-3 col-form-label"><b>Image Thumb: </b></label>
	                            <div class="col-sm-9">
	                                <img src="<?= $dpi->thumb_image ?>" class="img-circle" alt="" width="150" height="150">
	                            </div>
	                        </div>
	                    </div>
	                    <?php }?>
	          			<div class="col-md-12">
	            			<div class="form-group row">
	              				<div class="col-md-6">
	              					<label class="col-sm-3 col-form-label"><b>Title: </b></label>
		                            <div class="col-sm-9">
		                                <div class="form-control"><?= $dpi->title ?></div>
		                            </div>
		                            
	              				</div>
	              				<div class="col-md-6">
	              					<label class="col-sm-3 col-form-label"><b>Slug: </b></label>
		                            <div class="col-sm-9">
		                                <div class="form-control"><?= $dpi->slug?></div>
		                            </div>
	              				</div>
	              				<div class="col-md-6">
	              					<label class="col-sm-3 col-form-label"><b>Description: </b></label>
		                            <div class="col-sm-9">
		                                <div class="form-control"><?= $dpi->description ?></div>
		                            </div>
	              				</div>
	              				<div class="col-md-6">
	              					<label class="col-sm-3 col-form-label"><b>Meta keyword: </b></label>
		                            <div class="col-sm-9">
		                                <div class="form-control"><?= $dpi->meta_keyword ?></div>
		                            </div>
	              				</div>
	              				<div class="col-md-6">
	              					<label class="col-sm-3 col-form-label"><b>Meta Description: </b></label>
		                            <div class="col-sm-9">
		                                <div class="form-control"><?= $dpi->meta_description?></div>
		                            </div>
	              				</div>

	            			</div>
	          			</div>
	          			<div class="col-md-12">
	                        <div class="form-group row">
	                            <label class="col-sm-3 col-form-label"><b>Select Popular Place & Destination: </b></label>
		                            <?php $check=$dpi->popular_choice; 
		                                  $test = explode(",",$check);
		                            ?>
	                            <div class="col-sm-9">
	                               <input type="checkbox" name="popular_choice[]" id="popular_des[]" value="1" class="popular_choice" <?php if(in_array("1",$test)){echo"checked";}?>>POPULAR DESTINATION &nbsp;&nbsp;
	                               <input type="checkbox" name="popular_choice[]" id="popular_des[]" value="2" class="popular_choice" <?php if(in_array("2",$test)){echo"checked";}?>>POPULAR PLACE                  
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