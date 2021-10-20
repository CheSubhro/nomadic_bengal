<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">Recent Trips Category</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Edit Recent Trips Category</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Update Recent Trips Category</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/trips_category/update/<?= $trips_category[0]->id;?>">
							<div class="form-group">
				            	<label for="Page Name"><b>Category Name:</b></label>
				            	<input type="text" class="form-control" value="<?= $trips_category[0]->name?>" name="name">
				          	</div>
							<div class="form-group">
					            <label for="Page Title"><b>Category Title:</b></label>
					            <input type="text" class="form-control" value="<?= $trips_category[0]->title?>" name="title">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Category Slug:</b></label>
					            <input type="text" class="form-control" id="category_slug" value="<?= $trips_category[0]->slug?>" readonly name="slug">
					        </div>
					        <div class="form-group">
					            <label for="tinyMceExample"><b>Category Description:</b></label>
					            <textarea id='tinyMceExample'  name="description" ><?= $trips_category[0]->description?></textarea>
					        </div>
					        <div class="form-group">
				            	<label for="Category Image"><b>Category Image:</b></label>
				            	<div class="row">
					              <div class="col-sm-6">
					                <img src="<?= $trips_category[0]->image?>"class="img-lg rounded" style="width:160px;height:150px;">
					              </div>
					              <div class="col-sm-6">
					                <input type="file" class="dropify" name="image" data-height="150" />
					              </div>
					            </div>
				            </div>
				            <div class="form-group">
				            	<label for="Meta Keyword"><b>Meta Keyword:</b></label>
				            	<input type="text" class="form-control" value="<?= $trips_category[0]->meta_keyword?>" name="meta_keyword">
				          	</div>
				          	<div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
					            <textarea class="form-control" id="meta_description" rows="4" name="meta_description"><?= $trips_category[0]->meta_description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="status">
					              <option value="1" <?php if($trips_category[0]->status == 1){ echo 'selected';} ?>>Active</option>
					              <option value="0" <?php if($trips_category[0]->status == 0){ echo 'selected';} ?>>Deactive</option>
					            </select>
					        </div>
							
					
							<button type="submit" class="btn btn-success mr-2">Submit</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/trips_category';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>