<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">Global Settings</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Add Logo</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Add Logo</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/logo/insert">
							<div class="form-group">
				            	<label for="Logo Name"><b>Logo Name:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Name" name="name">
				          	</div>
				            <div class="form-group">
				            	<label for="Logo Image"><b>Image:</b></label>
            					<input type="file" class="dropify" data-height="300" / name="image">
				            </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%"  name="status">
					              <option value="">--Select--</option>
					              <option value="1">Active</option>
					              <option value="0">Deactive</option>
					            </select>
					        </div>
							
			
							<button type="submit" class="btn btn-success mr-2">Submit</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/logo';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>