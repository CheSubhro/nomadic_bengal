<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="template-demo">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
                          <li class="breadcrumb-item"><a href="<?php echo base_url();?>superpanel/home">Home</a></li>
                          <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Destination</a></li>
                          <li class="breadcrumb-item active" aria-current="page"><span>Galary</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>    
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Galary</h4>
                    <div class="row">
                        <div class="col-md-12">
                          <div id="lightgallery" class="row lightGallery">
                            <?php $i=1; foreach ($destination_category as $dpi){?>
                              <a href="<?= $dpi->destination_category_image;?>" class="image-tile"><img src="<?= $dpi->destination_category_image;?>" alt="<?= $dpi->destination_category_image;?>"></a>
                            <?php $i++; }?>
                          </div>
                        </div>  
                    </div>
            </div>
        </div>
    </div>
</div>