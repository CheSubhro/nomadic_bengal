<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas bg-white text-white" id="sidebar">
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url();?>superpanel/home">
				<i class="icon-layout menu-icon"></i>
        		<span class="menu-title">Dashboard</span>
			</a>
		</li>
		<li class="nav-item" >
			<a class="nav-link" data-toggle="collapse" href="#user_management" aria-expanded="false" aria-controls="page-layouts">
				<i class="fa fa-users menu-icon"></i>
        		<span class="menu-title">Manage User</span>
        		<span class="badge badge-pill badge-primary">1</span>
			</a>
			<div class="collapse" id="user_management">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url();?>superpanel/viewer">Viewer</a>
					</li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#menu_management" aria-expanded="false" aria-controls="page-layouts">
				<i class="icon-layout menu-icon"></i>
        		<span class="menu-title">Menu</span>
        		<span class="badge badge-pill badge-info">2</span>
			</a>
		</li>
		<div class="collapse" id="menu_management">
			<ul class="nav flex-column sub-menu">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url();?>superpanel/menu">Menu</a>
					<a class="nav-link" href="<?= base_url();?>superpanel/submenu">Submenu</a>
				</li>
			</ul>
		</div>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url();?>superpanel/slider">
				<i class="icon-layout menu-icon"></i>
        		<span class="menu-title">Slider</span>
        		<span class="badge badge-pill badge-danger">1</span>
			</a>
		</li>
		<li class="nav-item" >
			<a class="nav-link" data-toggle="collapse" href="#product_management" aria-expanded="false" aria-controls="page-layouts">
				<i class="fa fa-paper-plane-o menu-icon"></i>
        		<span class="menu-title">Manage Destination</span>
        		<span class="badge badge-pill badge-success">4</span>
			</a>
			<div class="collapse" id="product_management">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url();?>superpanel/destination_category">Category</a>
						<a class="nav-link" href="<?= base_url();?>superpanel/destination_place_item">Place Item</a>
						<a class="nav-link" href="<?= base_url();?>superpanel/destination_place_item_brief">Place Item Brief</a>
						<a class="nav-link" href="<?= base_url();?>superpanel/destination_gallary">Gallary</a>
					</li>
				</ul>
			</div>
		</li>
		<li class="nav-item" >
			<a class="nav-link" data-toggle="collapse" href="#things" aria-expanded="false" aria-controls="page-layouts">
				<i class="fa fa-tree menu-icon"></i>
        		<span class="menu-title">Manage Things To Do</span>
        		<span class="badge badge-pill badge-warning">2</span>
			</a>
			<div class="collapse" id="things">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url();?>superpanel/things_to_do_category">Category</a>
						<a class="nav-link" href="<?= base_url();?>superpanel/things_to_do">Things To Do</a>
					</li>
				</ul>
			</div>
		</li>
		<li class="nav-item" >
			<a class="nav-link" data-toggle="collapse" href="#trips" aria-expanded="false" aria-controls="page-layouts">
				<i class="icon-globe menu-icon"></i>
        		<span class="menu-title">Recent Trips</span>
        		<span class="badge badge-pill badge-primary">2</span>
			</a>
			<div class="collapse" id="trips">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url();?>superpanel/trips_category">Category</a>
						<a class="nav-link" href="<?= base_url();?>superpanel/trips_brief">Trips Brief</a>
					</li>
				</ul>
			</div>
		</li>
		</li><li class="nav-item">
			<a class="nav-link" href="<?= base_url();?>superpanel/cms">
				<i class="fa fa-vcard-o menu-icon"></i>
        		<span class="menu-title">CMS</span>
        		<span class="badge badge-pill badge-info">1</span>
			</a>
		</li>
		</li><li class="nav-item">
			<a class="nav-link" href="<?= base_url();?>superpanel/newsletter">
				<i class="icon-mail menu-icon"></i>
        		<span class="menu-title">Newsletter</span>
        		<span class="badge badge-pill badge-danger">1</span>
			</a>
		</li>
		<li class="nav-item" >
			<a class="nav-link" data-toggle="collapse" href="#global_settings" aria-expanded="false" aria-controls="page-layouts">
				<i class="fa fa-gears menu-icon"></i>
        		<span class="menu-title">Global Settings</span>
        		<span class="badge badge-pill badge-success">4</span>
			</a>
			<div class="collapse" id="global_settings">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url();?>superpanel/general_settings">General Settings</a>
						<a class="nav-link" href="<?= base_url();?>superpanel/logo">Logo</a>
						<a class="nav-link" href="<?= base_url();?>superpanel/admin_user">Admin User</a>
						<a class="nav-link" href="<?= base_url();?>superpanel/change_password">Change Password</a>
					</li>
				</ul>
			</div>
		</li>

	</ul>
</nav>