<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style ="text-decoration: none">Home</a></li>
            				<li class="breadcrumb-item"><a href="javascript:void(0)" style ="text-decoration: none">Destination Place Item</a></li>
            				<li class="breadcrumb-item active" aria-current="page"><span>Edit Destination Place Item</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Update Destination Place Item</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/destination_place_item/update/<?= $destination_place_item[0]->id?>">
							<div class="form-group">
				            	<label for="exampleSelectSuccess"><b>Select Destination Category:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="destination_category_id">
					              <?php foreach($destination_category as $dc){?>
					              <option value="<?=$dc->id?>" <?php if($dc->id == $destination_place_item[0]->destination_category_id){ echo "selected"; } ?>><?= $dc->name;?></option>
					              <?php }?>
					            </select>
				          	</div>
							<div class="form-group">
					            <label for="Page Name"><b>Name:</b></label>
                				<input type="text" class="form-control" value="<?= $destination_place_item[0]->name?>" name="name">
					        </div>
					        <div class="form-group">
					            <label for="Page Title"><b>Title:</b></label>
                				<input type="text" class="form-control" value="<?= $destination_place_item[0]->title?>" name="title">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Slug:</b></label>
                				<input type="text" class="form-control" id="category_slug" value="<?= $destination_place_item[0]->slug?>" name="slug" readonly>
					        </div>
					        <div class="form-group">
				            	<label for="tinyMceExample"><b>Description:</b></label>
                				<textarea id='tinyMceExample' name="destination_place_description" ><?= $destination_place_item[0]->description?></textarea>
				            </div>
				            <div class="form-group">
				            	<label for="Category Image"><b>Front Image:</b></label>
				            	<div class="row">
					                <div class="col-sm-6">
					                  <img src="<?= $destination_place_item[0]->front_image?>"class="img-lg rounded" style="width:160px;height:150px;">
					                </div>
					                <div class="col-sm-6">
					                  <input type="file" class="dropify" name="front_image" data-height="150" />
					                </div>
					            </div>
				          	</div>
				          	<div class="form-group">
					            <label for="Category Image"><b>Image Thumb:</b></label>
					            <div class="row">
					                <div class="col-sm-6">
					                  <img src="<?= $destination_place_item[0]->thumb_image?>"class="img-lg rounded" style="width:160px;height:150px;">
					                </div>
					                <div class="col-sm-6">
					                  <input type="file" class="dropify" name="thumb_image" data-height="150" />
					                </div>
					            </div>
					        </div>
					        <div class="form-group">
				            	<label for="Popular Destination"><b>Select Popular Place & Destination : </b></label><br>
				            	<?php $check=$destination_place_item[0]->popular_choice; $test = explode(",",$check);?>
				                <div class="col-sm-12">
				                   <input type="checkbox" name="popular_choice[]" id="popular_choice[]" value="1" class="popular_choice" <?php if(in_array("1",$test)){echo"checked";}?>>POPULAR DESTINATION &nbsp;&nbsp;
				                   <input type="checkbox" name="popular_choice[]" id="popular_choice[]" value="2" class="popular_choice" <?php if(in_array("2",$test)){echo"checked";}?>>POPULAR PLACE                  
				                </div>
				          	</div>
				          	<div class="form-group">
					            <label for="Meta Keyword"><b>Meta Keyword:</b></label>
              					<input type="text" class="form-control" value="<?= $destination_place_item[0]->meta_keyword?>" name="meta_keyword">
					        </div>
					        <div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
                				<textarea class="form-control" id="meta_description" rows="4" name="meta_description"><?= $destination_place_item[0]->meta_description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%" id="description_category_status" name="status">
					              	<option value="1" <?php if($destination_place_item[0]->status == 1){ echo 'selected';} ?>>Active</option>
                				 	<option value="0" <?php if($destination_place_item[0]->status == 0){ echo 'selected';} ?>>Deactive</option>
					            </select>
					        </div>
							
					
							<button type="submit" class="btn btn-success mr-2">Update</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/destination_place_item';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>