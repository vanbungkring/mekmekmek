<?php if ( is_user_logged_in() ) { wp_redirect( home_url() ); exit; } ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>	<?php wp_title( '|', true, 'right' ); bloginfo( 'name' );?> </title>
	
	<?php wp_head();?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php get_header(); ?>
	<div class="content container">
		<div class="row">
			<section class="featured-news category-video col-md-12">
				<div class="row">
					<h2 class="content-title col-md-12">Register</h2>
				</div>
				<div class="row">
					<h2 class="contact-title col-md-12">Register</h2>
				</div>
				<div class="row">
					<div class="form-wrapper col-md-12">
						<div class="row">
							<div id="error-message" class="col-md-12"></div>
						</div> 
						<div class="row">
							<form method="post" name="st-register-form" id="registerform" class="col-md-12">
								<p class="form-fullname">
									<input type="text" autocomplete="off" name="fullname" id="st-fullname" placeholder="<?php _e( 'Full Name', 'debate' ); ?>"/>
								</p>
								<p class="form-username">
									<input type="text" autocomplete="off" name="username" id="st-username" placeholder="<?php _e( 'Username', 'debate' ); ?>"/>
								</p>
								<p class="form-email">
									<input type="text" autocomplete="off" name="mail" id="st-email" placeholder="<?php _e( 'Email', 'debate' ); ?>"/>
								</p>
								<p class="form-company">
									<input type="text" autocomplete="off" name="company" id="st-company" placeholder="<?php _e( 'Company', 'debate' ); ?>"/>
								</p>
								<p class="form-province">
									<select name="province" id="st-province">
										<option value="Aceh">Aceh</option>
										<option value="Sumatera Utara">Sumatera Utara</option>
										<option value="Sumatera Barat">Sumatera Barat</option>
										<option value="Riau">Riau</option>
										<option value="Jambi">Jambi</option>
										<option value="Sumatera Selatan">Sumatera Selatan</option>
										<option value="Bengkulu,Bengkulu">Bengkulu,Bengkulu</option>
										<option value="Lampung,Lampung">Lampung,Lampung</option>
										<option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
										<option value="Kepulauan Riau">Kepulauan Riau</option>
										<option value="Daerah Khusus Ibukota Jakarta">Daerah Khusus Ibukota Jakarta</option>
										<option value="Jawa Barat">Jawa Barat</option>
										<option value="Jawa Tengah">Jawa Tengah</option>
										<option value="Daerah Isimewa Yogyakarta">Daerah Isimewa Yogyakarta</option>
										<option value="Jawa Timur">Jawa Timur</option>
										<option value="Banten">Banten</option>
										<option value="Bali">Bali</option>
										<option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
										<option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
										<option value="Kalimantan Barat">Kalimantan Barat</option>
										<option value="Kalimantan Tengah">Kalimantan Tengah</option>
										<option value="Kalimantan Selatan">Kalimantan Selatan</option>
										<option value="Kalimantan Timur">Kalimantan Timur</option>
										<option value="Kalimantan Utara">Kalimantan Utara</option>
										<option value="Sulawesi Utara">Sulawesi Utara</option>
										<option value="Sulawesi Tengah">Sulawesi Tengah</option>
										<option value="Sulawesi Selatan">Sulawesi Selatan</option>
										<option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
										<option value="Gorontalo">Gorontalo</option>
										<option value="Sulawesi Barat">Sulawesi Barat</option>
										<option value="Maluku">Maluku</option>
										<option value="Maluku Utara">Maluku Utara</option>
										<option value="Papua">Papua</option>
										<option value="Papua Barat">Papua Barat</option>
									</select>
								</p>
								<p class="form-department">
									<select name="department" id="st-department">
										<option value="Purchasing & Supply Chain">Purchasing & Supply Chain</option>
										<option value="Health & Safety Environtment">Health & Safety Environtment</option>
										<option value="Electrical">Electrical</option>
										<option value="Workshop Maintenance">Workshop Maintenance</option>
										<option value="Mechanical repair">Mechanical repair</option>
										<option value="Production">Production</option>
										<option value="Infrastructure & Traffic Safety">Infrastructure & Traffic Safety</option>
										<option value="Management">Management</option>
										<option value="Others">Others</option>
									</select>
								</p>
								<p class="form-psw">
									<input type="password" autocomplete="off" name="password" id="st-psw" placeholder="<?php _e( 'Password', 'debate' ); ?>"/>
									<input type="password" autocomplete="off" name="re-password" id="st-repsw" placeholder="<?php _e( 're-type Password', 'debate' ); ?>"/>
								</p>
								<p class="login-submit">
									<input type="submit" name="wp-submit" id="register-me" class="button-primary" value="Register">
								</p>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>