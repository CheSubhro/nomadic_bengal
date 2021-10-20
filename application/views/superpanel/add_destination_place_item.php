<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style ="text-decoration: none">Home</a></li>
            				<li class="breadcrumb-item"><a href="javascript:void(0)" style ="text-decoration: none">Destination Place Item</a></li>
            				<li class="breadcrumb-item active" aria-current="page"><span>Add Destination Place Item</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Add Destination Place Item</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/destination_place_item/insert">
							<div class="form-group">
				            	<label for="exampleSelectSuccess"><b>Select Destination Category:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="destination_category_id">
					              <?php foreach($destination_category as $dc){?>
					              <option value="<?=$dc->id?>"><?= $dc->name;?></option>
					              <?php }?>
					            </select>
				          	</div>
							<div class="form-group">
					            <label for="Page Name"><b>Name:</b></label>
                				<input type="text" class="form-control" placeholder="Enter Place Item Name" name="name">
					        </div>
					        <div class="form-group">
					            <label for="Page Title"><b>Title:</b></label>
                				<input type="text" class="form-control" placeholder="Enter Place Item Title" name="title">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Slug:</b></label>
                				<input type="text" class="form-control" id="category_slug" placeholder="Enter Place Item Slug" name="slug">
					        </div>
					        <div class="form-group">
				            	<label for="tinyMceExample"><b>Description:</b></label>
                				<textarea id='tinyMceExample' name="description" ></textarea>
				            </div>
				            <div class="form-group">
				            	<label for="Category Image"><b>Front Image:</b></label>
                				<input type="file" class="dropify" data-height="300" / name="front_image">
				          	</div>
				          	<div class="form-group">
					            <label for="Category Image"><b>Image Thumb:</b></label>
                				<input type="file" class="dropify" data-height="300" / name='thumb_image'>
					        </div>
					        <div class="form-group">
				            	<label for="Popular Destination"><b>Select Popular Place & Destination : </b></label><br>
				                <div class="col-sm-12">
				                   <input type="checkbox" name="popular_choice[]" id="popular_choice[]" value="1" class="popular_choice">Popular Destination &nbsp;&nbsp;
				                   <input type="checkbox" name="popular_choice[]" id="popular_choice[]" value="2" class="popular_choice">Popular Place                  
				                </div>
				          	</div>
				          	<div class="form-group">
					            <label for="Meta Keyword"><b>Meta Keyword:</b></label>
              					<input type="text" class="form-control"  placeholder="Enter Meta Keyword" name="meta_keyword">
					        </div>
					        <div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
                				<textarea class="form-control" id="meta_description" rows="4" name="meta_description"></textarea>
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
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/destination_place_item';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>