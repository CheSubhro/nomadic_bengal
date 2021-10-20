<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">Recent Trips</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Edit Recent Trips</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Update Recent Trips</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/trips_brief/update/<?= $trips_brief[0]->id;?>">
							<input type="hidden" name="id" value="<?= $trips_brief[0]->id;?>">
							<div class="form-group">
				            	<label for="exampleSelectSuccess"><b>Select Recent Trips Category:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="trips_cat_id">
					              <?php foreach ($trips_category as $tc) {?>
								  <option value="<?=$tc->id;?>" <?php if($tc->id == $trips_brief[0]->trips_cat_id){ echo "selected"; } ?>><?=$tc->name;?></option>
								  <?php }?>
					            </select>
				          	</div>
					        <div class="form-group">
					            <label for="trips_main_heading"><b>Trips Main Heading:</b></label>
              					<textarea class="form-control" rows="4" name="trips_main_heading"><?= $trips_brief[0]->trips_main_heading?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="trips_short_heading"><b>Trips Short Heading:</b></label>
              					<textarea class="form-control"  rows="4" name="trips_short_heading"><?= $trips_brief[0]->trips_short_heading?></textarea>
					        </div>
					        <div class="form-group">
				            	<label for="trips_place_name"><b>Trips Place Name:</b></label>
                				<input type="text" class="form-control" value="<?= $trips_brief[0]->trips_place_name?>" name="trips_place_name"> 
				            </div>
				            <div class="form-group">
				            	<label for="trips_place_title"><b>Trips Place Title:</b></label>
                				<input type="text" class="form-control" value="<?= $trips_brief[0]->trips_place_title?>" name="trips_place_title">
				            </div>
				            
				            <div class="form-group">
				            	<label for="slug"><b>Slug:</b></label>
                				<input type="text" class="form-control" id="category_slug" value="<?= $trips_brief[0]->slug?>" readonly name="slug">
				          	</div>
				          	<div class="form-group">
					            <label for="tinyMceExample"><b>Short Description:</b></label>
                				<textarea class="form-control" rows="15" name="short_description"><?= $trips_brief[0]->short_description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="tinyMceExample"><b>Main Description:</b></label>
                				<textarea id='tinyMceExample' name="main_description" rows="5"><?= $trips_brief[0]->main_description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="multiple_image"><b>Trips Multiple image:</b></label>
                				<div class="col-sm-5">
                					<input name="t_multi[]" class="file-upload-default" type="file" multiple id="fileupload" data-multiple-caption="{count} files selected">
                					<div class="input-group col-xs-12">
                						<input class="form-control file-upload-info" disabled="" placeholder="Upload Trips Images" type="text">
                						<div class="input-group-append">
                							<button class="file-upload-browse btn btn-info" type="button">Upload</button>
                						</div>	
                					</div>	
                				</div>	
					        </div>
					        <?php if($trips_brief_multi_img){ foreach ($trips_brief_multi_img as $mi){?>
			                  	<div class="col-sm-2">
				                    <div class="thumbnail">
				                      <div class="pull-right"><a href="<?= base_url()?>superpanel/trips_brief/delete_multi_image/<?= $mi->id ;?>/<?= $this->uri->segment(4) ;?>">Delete</a></div>
				                      <img src="<?= $mi->brief_images ;?>" alt="" class="img-thumbnail" style="width:100%"> 
				                  	</div>
			                  	</div>
			                <?php }}?>
					        <div class="form-group">
					            <label for="video"><b>Video:</b></label>
                				<textarea class="form-control" rows="5" name="video"><?= $trips_brief[0]->video?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="Google Map"><b>Google Map:</b></label>
                				<textarea class="form-control"  rows="5" name="g_map"><?= $trips_brief[0]->g_map?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="Meta Keyword"><b>Meta Keyword:</b></label>
                				<input type="text" class="form-control" value="<?= $trips_brief[0]->meta_keyword?>" name="meta_keyword">
					        </div>
					        <div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
                				<textarea class="form-control" rows="4" name="meta_description"><?= $trips_brief[0]->meta_description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="status">
					              <option value="1" <?php if($trips_brief[0]->status == 1){ echo 'selected';} ?>>Active</option>
					              <option value="0" <?php if($trips_brief[0]->status == 0){ echo 'selected';} ?>>Deactive</option>
					            </select>
					        </div>
							
			
							<button type="submit" class="btn btn-success mr-2">Submit</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/trips_brief';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>