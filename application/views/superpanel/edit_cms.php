<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)">CMS</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Edit CMS</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Update CMS</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/cms/update/<?= $cms[0]->id;?>">
							<div class="form-group">
				            	<label for="Page Name"><b>Page Name:</b></label>
            					<input type="text" class="form-control" value="<?= $cms[0]->page_name?>" name="page_name">
				          	</div>
					        <div class="form-group">
					            <label for="Page Title"><b>Page Title:</b></label>
            					<input type="text" class="form-control" value="<?= $cms[0]->page_title?>" name="page_title">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Slug:</b></label>
            					<input type="text" class="form-control" id="category_slug" value="<?= $cms[0]->slug?>" name="slug" readonly>
					        </div>
					        <div class="form-group">
				            	<label for="tinyMceExample"><b>Description:</b></label>
            					<textarea id='tinyMceExample'  name="description" ><?= $cms[0]->description?></textarea>
				            </div>
				            <div class="form-group">
				            	<label for="Category Image"><b>Image:</b></label>
				            	<div class="row">
					              <div class="col-sm-6">
					                <img src="<?= $cms[0]->image?>"class="img-lg rounded" style="width:160px;height:150px;">
					              </div>
					              <div class="col-sm-6">
					                <input type="file" class="dropify" name="image" data-height="150" />
					              </div>
					            </div>
				            </div>
				            
				            <div class="form-group">
				            	<label for="Meta Keyword"><b>Meta Keyword:</b></label>
				            	<input type="text" class="form-control" value="<?= $cms[0]->meta_keyword?>" name="meta_keyword">
				          	</div>
				          	<div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
					            <textarea class="form-control"  rows="4" name="meta_description"><?= $cms[0]->meta_description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="status">
					              <option value="1" <?php if($cms[0]->status == 1){ echo 'selected';} ?>>Active</option>
					              <option value="0" <?php if($cms[0]->status == 0){ echo 'selected';} ?>>Deactive</option>
					            </select>
					        </div>
							
			
							<button type="submit" class="btn btn-success mr-2">Submit</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/cms';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>