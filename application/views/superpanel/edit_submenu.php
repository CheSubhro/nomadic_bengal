<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)">Submenu</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Edit Submenu</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Update Submenu</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/submenu/update/<?= $submenu[0]->id?>">
							<div class="form-group">
				            	<label for="Page Name"><b>Menu Name:</b></label>
            					<select class="js-example-basic-single"  style="width:100%" name="menu_id">
					              	<?php foreach($menu as $m){?>
					              	<option value="<?=$m->id?>" <?php if($m->id == $submenu[0]->menu_id){ echo "selected"; } ?>><?= $m->name;?></option>
					                <?php }?>
					            </select>
				          	</div>
				          	<div class="form-group">
					            <label for="Name"><b>Name:</b></label>
            					<input type="text" class="form-control"  value="<?= $submenu[0]->name?>" name="name">
					        </div>
					        <div class="form-group">
					            <label for="Title"><b>Title:</b></label>
            					<input type="text" class="form-control"  value="<?= $submenu[0]->title?>" name="title">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Slug:</b></label>
            					<input type="text" class="form-control" id="category_slug" value="<?= $submenu[0]->slug?>" readonly name="slug">
					        </div>
					        <div class="form-group">
				            	<label for="tinyMceExample"><b>Description:</b></label>
            					<textarea id='tinyMceExample'  name="description" ><?= $submenu[0]->description?></textarea>
				            </div>
				            
				            <div class="form-group">
				            	<label for="Meta Keyword"><b>Meta Keyword:</b></label>
				            	<input type="text" class="form-control" value="<?= $submenu[0]->meta_keyword?>" name="meta_keyword">
				          	</div>
				          	<div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
					            <textarea class="form-control"  rows="4" name="meta_description"><?= $submenu[0]->meta_description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%"  name="status">
					              	<option value="1" <?php if($submenu[0]->status == 1){ echo 'selected';} ?>>Active</option>
                				 	<option value="0" <?php if($submenu[0]->status == 0){ echo 'selected';} ?>>Deactive</option>
					            </select>
					        </div>
							
			
							<button type="submit" class="btn btn-success mr-2">Submit</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/submenu';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>