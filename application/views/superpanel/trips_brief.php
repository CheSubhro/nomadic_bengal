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
							<li class="breadcrumb-item"><a href="<?php echo base_url();?>superpanel/home">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">Recent Trips</a></li>
							<li class="breadcrumb-item active" aria-current="page"><span>All Recent Trips</span></li>
						</ol>
					</nav>
				</div>
				<a href="<?php echo base_url();?>superpanel/trips_brief/add"><button type="button" class="btn btn-outline-success btn-sm" id="add_new">Add New</button>
				</a>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Recent Trips Brief</h4>
				<div class="row">
					<div class="table-responsive">
						<table id="order-listing" class="table">
							<thead>
								<tr class="bg-primary text-white">
									<th><b>Sl No.</b></th>
									<th><b>Category</b></th>
									<th><b>Name</b></th>
									<th><b>Title</b></th>
									<th><b>Status</b></th>
									<th><b>View</b></th>
									<th><b>Action</b></th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($trips_brief as $tb){?>
								<tr>
									<td><?= $i;?></td>
									<td><?php foreach($trips_category as $tc){?><?php if($tc->id == $tb->trips_cat_id){?><?= $tc->name;?><?php }?><?php }?></td>
									<td><?= $tb->trips_place_name;?></td>
									<td><?= $tb->trips_place_title;?></td>
									<td><?php if($tb->status==1){?><label class="badge badge-success">Active</label><?php }else if($tb->status==0){?><label class="badge badge-danger">Deactive</label><?php }?></td> 
									<td><button class="btn btn-outline-primary" data-toggle="modal" data-target="#customerModal<?php echo $i ;?>">View</button></td>
									<td>
										<a href="<?= base_url();?>superpanel/trips_brief/edit/<?= $tb->id;?>"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a>
										<?php if($tb->flag == 1){?>
										<a href="<?php echo base_url();?>superpanel/trips_brief/block/<?= $tb->id?>" onclick="return confirm('Are you sure about this block?');">
											<button type="button" class="btn btn-outline-danger btn-sm">Block</button>
										</a>
										<?php }else{?>
										<a href="<?php echo base_url();?>superpanel/trips_brief/unblock/<?= $tb->id?>" onclick="return confirm('Are you sure about this unblock?');">
											<button type="button" class="btn btn-outline-primary btn-sm">Unblock</button>
									    </a>
										<?php }?>
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


<?php $i=1; foreach ($trips_brief as $tb){?>
<div class="modal fade" id="customerModal<?php echo $i ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
 	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"><strong>View Trips</strong></h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        		<span aria-hidden="true">&times;</span>
		        	</button>
      		</div>
      		<div class="modal-body">
        		<div class="row center-block">
          			<div class="col-md-12">
            			<div class="form-group row">
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Slug</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$tb->slug?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Main Heading</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$tb->trips_main_heading ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Short Heading</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$tb->trips_short_heading ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Short Description</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$tb->short_description ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Main Description</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$tb->main_description ?></div>
	                            </div>
              				</div>

              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Meta keyword</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$tb->meta_keyword ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Meta Description</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?= $tb->meta_description?></div>
	                            </div>
              				</div>
              				<div class="col-md-12">
              					<label class="col-sm-3 col-form-label"><b>Video</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$tb->video ?></div>
	                            </div>
              				</div>
              				<div class="col-md-12">
              					<label class="col-sm-3 col-form-label"><b>Google Map</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$tb->g_map ?></div>
	                            </div>
              				</div>
              				<div class="col-md-12">
              					<label class="col-sm-3 col-form-label"><b>Images</b></label>
	                            <div class="col-sm-9">
	                                <?php foreach($trips_brief_multi_img as $tbm){?><?php if($tbm->trips_brief_id == $tb->id){?><img src="<?= $tbm->brief_images;?>" class="img-circle" alt="" width="150" height="150"><?php }?><?php }?>
	                            </div>
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