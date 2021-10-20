<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<?php if($this->session->flashdata('success')!=''){?>
				<center>
				<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong><?= @$this->session->flashdata('success');?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				</center>
				<?php }?>
				<?php if($this->session->flashdata('error')!=''){?>
				<center>
				<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong><?= @$this->session->flashdata('error');?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				</center>
				<?php }?>
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">Things To Do</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>All Things To Do</span></li>
						</ol>
					</nav>
				</div>
				<a href="<?= base_url();?>superpanel/things_to_do/add"><button type="button" class="btn btn-outline-success btn-sm" id="add_new">Add New</button></a>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Things To Do</h4>
				<div class="row">
					<div class="table-responsive">
						<table id="order-listing" class="table">
							<thead>
								<tr class="bg-primary text-white">
									<th><b>Sl No.</b></th>
					                <th><b>Name</b></th>
					                <th><b>Title</b></th>
					                <th><b>Image</b></th>
					                <th><b>Status</b></th>
					                <th><b>View</b></th>
					                <th><b>Action</b></th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($things_to_do as $dc){?>
								<tr>
									<td><?= $i;?></td>
                    				<td><?= $dc->name;?></td>
                    				<td><?= $dc->title;?></td>
                    				<td><img src="<?= $dc->image;?>"alt="<?= $dc->image;?>" class="img-lg rounded" style="width:160px;height:100px;"></td>
                    				<td><?php if($dc->status==1){?><label class="badge badge-success">Active</label><?php }else if($dc->status==0){?><label class="badge badge-danger">Deactive</label><?php }?></td> 
									<td><button class="btn btn-outline-primary" data-toggle="modal" data-target="#customerModal<?php echo $i ;?>">View</button></td>
									<td>
										<a href="<?= base_url();?>superpanel/things_to_do/edit/<?= $dc->id;?>"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a>
									    <a href="<?= base_url();?>superpanel/things_to_do/delete/<?= $dc->id;?>" onclick="return confirm('Are you sure about this delete?');"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a>
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


<?php $i=1; foreach ($things_to_do as $dc){?>
<div class="modal fade" id="customerModal<?php echo $i ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
 	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"><strong>View Things To Do</strong></h5>
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
	                                <div class="form-control"><?=$dc->slug?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Short Description</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$dc->short_description ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Long Description</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$dc->long_description ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Meta keyword</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$dc->meta_keyword ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Meta Description</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?= $dc->meta_description?></div>
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


