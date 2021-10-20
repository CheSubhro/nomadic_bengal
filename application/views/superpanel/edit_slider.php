<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)">Slider</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Edit Slider</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Update Slider</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/slider/update/<?= $slider[0]->id;?>">
							<div class="form-group">
					            <label for="Heading"><b>Heading:</b></label>
            					<input type="text" class="form-control"  value="<?=$slider[0]->heading?>" name="heading">
					        </div>
					        <div class="form-group">
					            <label for="Description"><b>Description:</b></label>
            					<textarea class="form-control"  rows="4" name="description"><?=$slider[0]->description?></textarea>
					        </div>
					        <div class="form-group">
				            	<label for="Category Image"><b>Image:</b></label>
				            	<div class="row">
					              <div class="col-sm-6">
					                <img src="<?= $slider[0]->img?>"class="img-lg rounded" style="width:160px;height:150px;">
					              </div>
					              <div class="col-sm-6">
					                <input type="file" class="dropify" name="img" data-height="150" />
					              </div>
					            </div>
				            </div>
					        <div class="form-group">
				            	<label for="tinyMceExample"><b>Slider Button Url:</b></label>
            					<input type="text" class="form-control" value="<?=$slider[0]->slider_button_url?>" name="slider_button_url">
				            </div>
				            <div class="form-group">
				            	<label for="tinyMceExample"><b>Slider Button Text:</b></label>
            					<input type="text" class="form-control"  value="<?=$slider[0]->slider_button_text?>" name="slider_button_text">
				            </div>
				            
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%" name="status">
					              <option value="1" <?php if($slider[0]->status == 1){ echo 'selected';} ?>>Active</option>
					              <option value="0" <?php if($slider[0]->status == 0){ echo 'selected';} ?>>Deactive</option>
					            </select>
					        </div>
							
			
							<button type="submit" class="btn btn-success mr-2">Submit</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/slider';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>