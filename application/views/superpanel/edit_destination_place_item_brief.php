<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style ="text-decoration: none">Home</a></li>
            				<li class="breadcrumb-item"><a href="javascript:void(0)" style ="text-decoration: none">Destination Place Item Brief</a></li>
            				<li class="breadcrumb-item active" aria-current="page"><span>Edit Destination Place Item Brief</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Update Destination Place Item Brief</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/destination_place_item_brief/update/<?= $destination_place_item_brief[0]->id?>">
							<div class="form-group">
				            	<label for="exampleSelectSuccess"><b>Select Destination Category:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="destination_category_id">
					              <?php foreach($destination_category as $dc){?>
									<option value="<?=$dc->id;?>" <?php if($dc->id == $destination_place_item_brief[0]->destination_category_id){ echo "selected"; } ?>><?=$dc->name;?></option>					              <?php }?>
					            </select>
				          	</div>
				          	<div class="form-group">
				            	<label for="exampleSelectSuccess"><b>Select Destination Place Item:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="destination_place_item_id">
					              <?php foreach($destination_place_item as $dp){?>
									<option value="<?=$dp->id;?>" <?php if($dp->id == $destination_place_item_brief[0]->destination_place_item_id){ echo "selected"; } ?>><?=$dp->name;?></option>					              <?php }?>
					            </select>
				          	</div>
							<div class="form-group">
					            <label for="Page Name"><b>Description:</b></label>
                				<textarea id='tinyMceExample' name="description" ><?= $destination_place_item_brief[0]->description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="Page Title"><b>How To Reach:</b></label>
                				<input type="text" class="form-control" value="<?= $destination_place_item_brief[0]->how_to_reach?>" name="how_to_reach">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>At A Glance:</b></label>
                				<input type="text" class="form-control" value="<?= $destination_place_item_brief[0]->at_a_glance?>" name="at_a_glance">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Video:</b></label>
                				<input type="text" class="form-control" value="<?= $destination_place_item_brief[0]->video?>" name="video">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Google Map:</b></label>
                				<input type="text" class="form-control" value="<?= $destination_place_item_brief[0]->google_map?>" name="google_map">
					        </div>
				          	<div class="form-group">
					            <label for="Meta Keyword"><b>Meta Keyword:</b></label>
              					<input type="text" class="form-control" value="<?= $destination_place_item_brief[0]->meta_keyword?>" name="meta_keyword">
					        </div>
					        <div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
                				<textarea class="form-control" id="meta_description" rows="4" name="meta_description"><?= $destination_place_item_brief[0]->meta_description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%" id="description_category_status" name="status">
					              	<option value="1" <?php if($destination_place_item_brief[0]->status == 1){ echo 'selected';} ?>>Active</option>
                				 	<option value="0" <?php if($destination_place_item_brief[0]->status == 0){ echo 'selected';} ?>>Deactive</option>
					            </select>
					        </div>
							
					
							<button type="submit" class="btn btn-success mr-2">Update</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/destination_place_item_brief';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>