<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Add Menu</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Add Menu</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/menu/insert">
							<div class="form-group">
				            	<label for="Page Name"><b>Menu Type:</b></label>
            					<select class="js-example-basic-single"  style="width:100%" id="menu_type" name="menu_type">
					              	<option value="">--Select--</option>
					              	<option value="1">Header Menu</option>
					              	<option value="0">Footer Menu</option>
					            </select>
				          	</div>
				          	<div class="form-group">
					            <label for="Name"><b>Name:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Name" name="name">
					        </div>
					        <div class="form-group">
					            <label for="Title"><b>Title:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Title" name="title">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Slug:</b></label>
            					<input type="text" class="form-control" id="category_slug" placeholder="Enter Menu Slug" name="slug">
					        </div>
					        <div class="form-group">
				            	<label for="tinyMceExample"><b>Description:</b></label>
            					<textarea id='tinyMceExample'  name="description" ></textarea>
				            </div>
				            
				            <div class="form-group">
				            	<label for="Meta Keyword"><b>Meta Keyword:</b></label>
				            	<input type="text" class="form-control" placeholder="Enter Meta Keyword" name="meta_keyword">
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
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/menu';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>