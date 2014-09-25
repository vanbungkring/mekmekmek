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
					<h2 class="content-title col-md-12">Login</h2>
				</div>
				<div class="row">
					<h2 class="contact-title col-md-12">Login</h2>
				</div>
				 <?php $args = array(
				        'echo'           => true,
				        'redirect'       => home_url(), 
				        'form_id'        => 'loginform',
				        'label_username' => __( ' ' ),
				        'label_password' => __( ' ' ),
				        'label_remember' => __( 'Remember Me' ),
				        'label_log_in'   => __( 'Submit' ),
				        'id_username'    => 'user_login',
				        'id_password'    => 'user_pass',
				        'id_remember'    => 'rememberme',
				        'id_submit'      => 'wp-submit',
				        'remember'       => false,
				        'value_username' => NULL,
				        'value_remember' => false
				); ?> 
				<div class="row">
					<?php wp_login_form( $args ); ?>
				</div>
				<p class="link-forgot hidden">
					<a href="<?php echo wp_lostpassword_url(); ?>" title="Forget Password?">Forget Password?</a>
				</p>
				<p class="login-p">New to yourminingpartner.com?</p>
				<p class="login-p"><a href="<?php echo get_bloginfo('url').'/register'; ?>">Register here</a></p>
			</section>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>