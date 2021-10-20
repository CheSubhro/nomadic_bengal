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
							<li class="breadcrumb-item"><a href="<?php echo base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">General Settings</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Logo</span></li>
						</ol>
					</nav>
				</div>
				<a href="<?= base_url();?>superpanel/logo/add"><button type="button" class="btn btn-outline-success btn-sm" id="add_new">Add New</button></a>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Logo</h4>
				<div class="row">
					<div class="table-responsive">
						<table id="order-listing" class="table">
							<thead>
								<tr class="bg-primary text-white">
									<th><b>Sl No.</b></th>
					                <th><b>Name</b></th>
					                <th><b>Image</b></th>
					                <th><b>Status</b></th>
					                <th><b>Action</b></th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($logo as $l){?>
								<tr>
									<td><?= $i;?></td>
                    				<td><?= $l->name;?></td>
                    				<td><img src="<?= $l->image;?>"alt="<?= $l->image;?>" class="img-lg rounded" style="width:160px;height:100px;"></td>
                    				<td><?php if($l->status==1){?><label class="badge badge-success">Active</label><?php }else if($l->status==0){?><label class="badge badge-danger">Deactive</label><?php }?></td> 
									<td>
										<a href="<?= base_url();?>superpanel/logo/edit/<?=$l->id;?>"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a>
										<a href="<?= base_url();?>superpanel/logo/delete/<?= $l->id;?>" onclick="return confirm('Are you sure about this delete?');"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a>

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
