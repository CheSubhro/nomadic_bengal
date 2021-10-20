<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">Global Settings</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Edit General Settings</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Update General Settings</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/general_settings/update/<?=$general_setting[0]->id?>">
							<div class="form-group">
				            	<label for="Email"><b>Email:</b></label>
            					<input type="text" class="form-control"  value="<?=$general_setting[0]->email?>" name="email">
				          	</div>
					        <div class="form-group">
					            <label for="Phone"><b>Phone No:</b></label>
            					<input type="text" class="form-control"  value="<?=$general_setting[0]->phone?>" name="phone">
					        </div>
					        <div class="form-group">
					            <label for="Address"><b>Address:</b></label>
            					<textarea class="form-control"  rows="4" name="address"><?=$general_setting[0]->address?></textarea>
					        </div>
					        <div class="form-group">
				            	<label for="Facebook"><b>Facebook:</b></label>
            					<input type="text" class="form-control"  value="<?=$general_setting[0]->facebook?>" name="facebook">
				            </div>
				            <div class="form-group">
				            	<label for="Instagram"><b>Instagram:</b></label>
            					<input type="text" class="form-control"  value="<?=$general_setting[0]->instagram?>" name="instagram">
				            </div>
				            <div class="form-group">
				            	<label for="Google Plus"><b>Google Plus:</b></label>
            					<input type="text" class="form-control"  value="<?=$general_setting[0]->googleplus?>" name="googleplus">
				            </div>
				            <div class="form-group">
				            	<label for="Twitter"><b>Twitter:</b></label>
            					<input type="text" class="form-control"  value="<?=$general_setting[0]->twitter?>" name="twitter">
				            </div>
				            <div class="form-group">
				            	<label for="Rss"><b>Rss:</b></label>
            					<input type="text" class="form-control"  value="<?=$general_setting[0]->rss?>" name="rss">
				            </div>
				           
			
							<button type="submit" class="btn btn-success mr-2">Submit</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/general_settings';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>