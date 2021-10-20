<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/destination_Category" style="text-decoration: none">Things To Do</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Edit Things To Do</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Update Things To Do</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/things_to_do/update/<?= $things_to_do[0]->id?>">
							<div class="form-group">
				            	<label for="exampleSelectSuccess"><b>Select Category:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="things_to_do_category_id">
					              <option value="">--Select--</option>
					              <?php foreach($things_to_do_category as $c){?>
					                <option value="<?=$c->id;?>" <?php if($c->id == $things_to_do[0]->things_to_do_category_id){ echo "selected"; } ?>><?=$c->name;?></option>
					              <?php }?>
					            </select>
				          	</div>
							<div class="form-group">
					            <label for="Page Name"><b>Name:</b></label>
            					<input type="text" class="form-control"  value="<?= $things_to_do[0]->name?>" name="name">
					        </div>
					        <div class="form-group">
					            <label for="Page Title"><b>Title:</b></label>
            					<input type="text" class="form-control"  value="<?= $things_to_do[0]->title?>" name="title">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Slug:</b></label>
            					<input type="text" class="form-control" id="category_slug" value="<?= $things_to_do[0]->slug?>" name="slug">
					        </div>
					        <div class="form-group">
				            	<label for="Slug"><b>Short Description:</b></label>
            					<textarea name="short_description" class="form-control"><?= $things_to_do[0]->short_description?></textarea>
				            </div>
				            <div class="form-group">
				            	<label for="tinyMceExample"><b>Long Description:</b></label>
            					<textarea id='tinyMceExample'  name="long_description"><?= $things_to_do[0]->long_description?></textarea>
				            </div>
				            <div class="form-group">
				            	<label for="Category Image"><b>Image:</b></label>
				            	<div class="row">
					              <div class="col-sm-6">
					                <img src="<?= $things_to_do[0]->image?>"class="img-lg rounded" style="width:160px;height:150px;">
					              </div>
					              <div class="col-sm-6">
					                <input type="file" class="dropify" name="image" data-height="150" />
					              </div>
					            </div>
				            </div>
				            <div class="form-group">
				            	<label for="Meta Keyword"><b>Meta Keyword:</b></label>
				            	<input type="text" class="form-control" id="meta_keyword" value="<?= $things_to_do[0]->meta_keyword?>" name="meta_keyword">
				          	</div>
				          	<div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
					            <textarea class="form-control" id="meta_description" rows="4" name="meta_description"><?= $things_to_do[0]->meta_description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="status">
					              <option value="1" <?php if($things_to_do[0]->status == 1){ echo 'selected';} ?>>Active</option>
					              <option value="0" <?php if($things_to_do[0]->status == 0){ echo 'selected';} ?>>Deactive</option>
					            </select>
					        </div>
							
					
							<button type="submit" class="btn btn-success mr-2">Submit</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/things_to_do';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>