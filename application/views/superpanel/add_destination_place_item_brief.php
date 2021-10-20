<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style ="text-decoration: none">Home</a></li>
            				<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/destination_Place_Item" style ="text-decoration: none">Place Item Brief</a></li>
            				<li class="breadcrumb-item active" aria-current="page"><span>Add Destination Place Item Brief</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Add Destination Place Item Brief</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/destination_place_item_brief/insert">
							<div class="form-group">
				            	<label for="exampleSelectSuccess"><b>Select Destination Category:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="destination_category_id" id="destination_category_id">
				                    <option>--Select--</option>
				                    <?php foreach($destination_category as $dc){?>
				                       <option value="<?=$dc->id?>"><?= $dc->name;?> 
				                    <?php }?>
			                    </select>
				          	</div>
				          	<div class="form-group">
				            	<label for="exampleSelectSuccess"><b>Select Destination Place Item:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="destination_place_item_id" id="destination_place_item"></select>
				          	</div>
							<div class="form-group">
					            <label for="Page Name"><b>Description:</b></label>
                				<textarea id='tinyMceExample' name="description" ></textarea>
					        </div>
					        <div class="form-group">
					            <label for="Page Title"><b>How To Reach:</b></label>
                				<input type="text" class="form-control"  placeholder="Enter How To Reach" name="how_to_reach">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>At A Glance:</b></label>
                				<input type="text" class="form-control"  placeholder="Enter At A Glance" name="at_a_glance">
					        </div>
					        <div class="form-group">
				            	<label for="tinyMceExample"><b>Video:</b></label>
                				<input type="text" class="form-control"  placeholder="Enter Video" name="video">
				            </div>
				            <div class="form-group">
				            	<label for="tinyMceExample"><b>Google Map:</b></label>
                				<input type="text" class="form-control"  placeholder="Enter Google Map" name="google_map">
				            </div>
				          	<div class="form-group">
					            <label for="Meta Keyword"><b>Meta Keyword:</b></label>
              					<input type="text" class="form-control"  placeholder="Enter Meta Keyword" name="meta_keyword">
					        </div>
					        <div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
                				<textarea class="form-control"  rows="4" name="meta_description"></textarea>
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
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/destination_place_item_brief';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>