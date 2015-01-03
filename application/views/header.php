<?php 
	$is_active = $session->userdata("is_active");
	$firstname = $session->userdata("firstname");
	$lastname = $session->userdata("lastname");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>NCare Version 2</title>
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/icons.css" />
		<script src="<?=base_url()?>js/jquery-1.11.1.js"></script>
		<script src="<?=base_url()?>js/jquery.autocomplete.js"></script>
		<script src="<?=base_url()?>js/jquery.autocomplete.min.js"></script>
		<script src="<?=base_url()?>js/ncare-functionalities.js"></script>
		<script src="<?=base_url()?>js/ncare-form-validation.js"></script>
	</head>
	<body>
		<div class="header-container">
			<header class="ribbon">
				<form id="search-box-form" method="post" action="">
					<input type="text" id="search-box" name="search-box" placeholder="Search Patient" maxlength="50" value="" class="search-box ic-position-3 pull-right" />
				</form>
				<a href="<?=base_url()?>" class="sys-title">N-Care:</a><br />
				<span class="sys-desc">Nursing Home Management System</span>
			</header>
			<nav class="header">
				<div id="dropdown-login" class="dropdown pull-right">
					<button>
						<span class="icon ic-user-g ic-small marg-right"></span>
						<label id="user"><?=$is_active ? ucwords($firstname)." ".ucwords($lastname) : "Login As"?></label>
						<span class="icon ic-arrow-down-1-g ic-small marg-left"></span>
					</button>
					<ul>
						<?php
							if($is_active) {
								echo "
									<li><span id='manage-profile'>Manage Profile</span></li>
									<li><span id='logout-user'>Log out</span></li>
								";
							}
							else {
								echo "
									<li><span id='login-type-patient'>Patient</span></li>
									<li><span id='login-type-nurse'>Nurse</span></li>
									<li><span id='login-type-doctor'>Doctor</span></li>
									<li><span id='login-type-admin'>Admin</span></li>
								";
							}
						?>
					</ul>
					<?php
						if(!$is_active) {
							echo "<form id='login-form' class='login-form' method='post' action='".base_url()."main/login_verification'>
									<input type='hidden' id='login-type' name='login-type' value='' />
									<span id='login-close' class='icon ic-close-w ic-default pull-right'></span>
									<label id='login-type'></label>
									<div>
										<input type='text' id='login-username' name='login-username' placeholder='Username' maxlength='50' class='txt txt-default icon ic-user-g ic-default ic-position-3' />
										<input type='password' id='login-password' name='login-password' placeholder='Password' maxlength='50' class='txt txt-default icon ic-key-g ic-default ic-position-3' />
										<input type='submit' id='login' value='Login' class='btn btn-primary' />
										<input type='reset' id='clear' value='Clear' class='btn btn-default' />
									</div>
								</form>
							";
						} 
					?>
				</div>
				<ul class="navigation">
					<li><a href="<?=base_url()?>main/home" id="nav-home" class="<?=$is_home_selected ? "active" : ""?>">Home</a></li>
					<li><a href="<?=base_url()?>main/about_us" id="nav-about-us" class="<?=$is_aboutus_selected ? "active" : ""?>">About Us</a></li>
					<li><a href="<?=base_url()?>main/contact" id="nav-contact" class="<?=$is_contact_selected ? "active" : ""?>">Contact</a></li>
					<?php 
						if($is_active) {
							echo "
								<li><a href='".base_url()."main/user_management' id='nav-controlpanel' class='".($is_controlpanel_selected ? "active" : "")."'>User Management</a></li>
							";
						}
					?>
				</ul>
			</nav>
		</div>
		
